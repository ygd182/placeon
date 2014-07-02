<?php
class CrugeUserController extends Controller
{
  public function filters() {
    return array('accessControl',
     // perform access control for CRUD operations
    );
  }
  
  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules() {
    return array(array('allow',
     // allow all users to perform 'index' and 'view' actions
    'actions' => array(''), 'users' => array('*'),), array('allow',
     // allow authenticated user to perform 'create' and 'update' actions
    'actions' => array('getAll', 'get', 'view', 'delete', 'save', 'getFriendsNotifications','SetLastUpdate'), 'users' => array('@'),),
    );
  }
  
  /**
   * return Users in Json.
   */
  public function actiongetAll() {
    $data = Yii::app()->user->um->listUsers();
    echo CJSON::encode($data);
  }
  
  /**
   * return Users in Json.
   */
  public function actionget($id) {
    $usuario = Yii::app()->user->um->loadUserById($id
     /*, true (para que cargue sus campos)*/
    );
    echo CJSON::encode($usuario);
  }
  public function actionSave() {
    $userId = Yii::app()->user->id;
    $currentUser = Yii::app()->user->um->loadUserById($userId, true);
    $userPic = UserPicRelation::model()->findByPK($userId);
   
    if (isset($_POST['username'])) {
      $currentUser->username = $_POST['username'];
    }
    if (isset($_POST['email'])) {
      $currentUser->email = $_POST['email'];
    }
    //$firephp = FirePHP::getInstance(true);
    //$firephp->log($userPic, "userPic");
    if (isset($_POST['UserPicRelation']['image'])) {
      if (is_null($userPic)) {
        $userPic = new UserPicRelation;
      }
      $userPic->id_user = $userId;
      $userPic->image = $_POST['UserPicRelation']['image'];
      $userPic->image=CUploadedFile::getInstance($userPic,'image');
      if ($userPic->save()) {
        $userPic->image->saveAs($userPic->id_user . $userPic->image);
      }
    }
    $currentUser->save();
    $states = $this->getNotifications($userId);
    $this->layout = 'multipage-template-viewFriend-Place';
    $this->render('viewOwn', array('data' => $currentUser, 'states' => $states, 'profile_pic' => $userPic));
  }
  //return friend Notifications
  protected function getNotifications($id) {
    $allNotificationsQuery = 'select * from state where id_user=' . $id . '           
                                    order by date desc';
    $allNotifications = State::model()->findAllBySql($allNotificationsQuery);
    return $allNotifications;
  }
  
  protected function filterStates($allNotifications, $currentLat, $currentLon) {
    $currentUserId = Yii::app()->user->id;
    foreach ($allNotifications AS $key => $notification) {
      $id = $notification->id_user;
      if ($id != $currentUserId) {
         //no filtro mis estados
        $filter = Alertfilter::model()->findAllBySql('select * from alertfilter where user_1=' . $currentUserId . ' and user_2=' . $id);
        $filterDistance = ((float)$filter[0]->value) * 0.001;
         //Make meters be kilometers for calculus
        if ($filter[0]->id_position != null) {
          $reference = Position::model()->findByPK($filter[0]->id_position);
          $currentLat = $reference->latitude;
          $currentLon = $reference->longitude;
        }
        $posId = $notification->id_position;
        $pos = Position::model()->findByPK($posId);
        $posLat = $pos->latitude;
        $posLon = $pos->longitude;
        $distance = $this->calculateDistance($currentLat, $currentLon, $posLat, $posLon);
        if ($distance > $filterDistance) unset($allNotifications[$key]);
        $firephp = FirePHP::getInstance(true);
        $firephp->log($distance, "distance");
        $firephp->log($filterDistance, "filterDistance");
      }
    }
    return $allNotifications;
  }
  
  public function actiongetFriendsNotifications($currentLat, $currentLon) {
    $currentUserId = Yii::app()->user->id;
    $usuario = $usuario = Yii::app()->user->um->loadUserById($currentUserId
     /*, true (para que cargue sus campos)*/
    );
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('y/m/d h:i:s a', time());
    $lastUpdateDate = Yii::app()->user->um->getFieldValueInstance($usuario, 'lastUpdateDate');
    if (!$lastUpdateDate->value) $lastUpdateDate->value = date('y/m/d h:i:s a', mktime(0, 0, 0, 1, 1, 98));
    $allNotificationsQuery = 'select * from state where date > "' . $lastUpdateDate->value . '" and id_user in (select id_user2 from friend where id_user1=' . $currentUserId . ') order by date desc';
    $oldNotificationsQuery = 'select * from state where date <= "' . $lastUpdateDate->value . '" and id_user in (select id_user2 from friend where id_user1=' . $currentUserId . ') order by date desc limit 4';
    
    $allNotifications = State::model()->with('position')->findAllBySql($allNotificationsQuery);
    $allNotifications = $this->filterStates($allNotifications, $currentLat, $currentLon);
    $oldNotifications = State::model()->with('position')->findAllBySql($oldNotificationsQuery);
    $oldNotifications = $this->filterStates($oldNotifications, $currentLat, $currentLon);
    return $this->renderPartial('../common/notificationList', array('allNotifications' => $allNotifications, 'oldNotifications' => $oldNotifications));
  }
  
  public function actionSetLastUpdate() {
    $currentUserId = Yii::app()->user->id;
    $usuario = Yii::app()->user->um->loadUserById($currentUserId);
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $lastUpdateDate = Yii::app()->user->um->getFieldValueInstance($usuario, 'lastUpdateDate');
    $lastUpdateDate->value = date('y/m/d h:i:s a', time());
    $lastUpdateDate->save();
    return 1;
  }
  
  public function actionView($id) {
    
    $currentFriend = Yii::app()->user->um->loadUserById($id);
    $currentUserId = Yii::app()->user->id;
    $isPlace = Yii::app()->user->um->getFieldValue($id, 'isPlace');
    
    /*
    $placeStates = 'select * from state where id_user='.$id.' order by date desc';
    $states = State::model()->findAllBySql($placeStates);*/
    
    $isFriend = Friend::isFriend(Yii::app()->user->id, $id);
    
    $this->layout = 'multipage-template-viewFriend-Place';
    $pic = UserPicRelation::model()->findByPK($id);
    if (is_null($pic)) {
      $pic = new UserPicRelation;
      $pic->id_user = $id;
      $pic->image = null;
    }
    if ($currentUserId == $id) {
      $states = $this->getNotifications($id);
      $this->render('viewOwn', array('data' => $currentFriend, 'states' => $states, 'profile_pic' => $pic));
    } else {
      if (!$isFriend) $this->render('viewNoFriend', array('data' => $currentFriend, 'profile_pic' => $pic));
      else {
        $states = $this->getNotifications($id);
        $this->render('view', array('data' => $currentFriend, 'states' => $states, 'profile_pic' => $pic));
      }
    }
  }
  
  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionDelete($id) {
    $this->loadModel($id)->delete();
    return 1;
  }
  
  public function actionViewAll() {
    $this->layout = 'multipage-template-search';
    $usuarios = Yii::app()->user->um->listUsers();
    $currentUser = Yii::app()->user->um->loadUserById(Yii::app()->user->id);
    $key = array_search($currentUser, $usuarios);
    unset($usuarios[$key]);
    $this->render('viewAll', array('content' => $usuarios));
  }
  public function calculateDistance($lat1, $lng1, $lat2, $lng2) {
    $theta = $lng1 - $lng2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $km = $dist * 60 * 1.1515 * 1.609344;
    return ($km);
  }
}
