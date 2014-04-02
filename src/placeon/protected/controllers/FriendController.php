<?php
class FriendController extends Controller
{
  public function actionIndex() {
    $this->layout = 'multipage-template-friends';
    $model = new Friend;
    $userId = Yii::app()->user->id;
    $data = $model->findAllByAttributes(array('id_user1' => $userId));
    $friends = array();
    foreach ($data as $key => $value) {
      $usuario = Yii::app()->user->um->loadUserById($value->id_user2);
      array_push($friends, $usuario);
    }
    $this->render('friendList', array('content' => $friends));
  }
  
  public function filters() {
    return array('accessControl');
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
    'actions' => array('index', 'getAll', 'delete', 'SaveFriend', 'view'), 'users' => array('@'),), array('allow',
     // allow admin user to perform 'admin' and 'delete' actions
    'actions' => array('create', 'update', 'index', 'view', 'admin', 'delete'), 'users' => array('admin'),), array('deny',
     // deny all users
    'users' => array('*'),),);
  }
  
  public function actionGetAll() {
    $model = new Friend;
    $userId = Yii::app()->user->id;
    $data = $model->findAllByAttributes(array('id_user1' => $userId));
    sort($data);
    echo CJSON::encode($data);
  }
  
  public function getFriends() {
    $model = new Friend;
    $userId = Yii::app()->user->id;
    $data = $model->findAllByAttributes(array('id_user1' => $userId));
    sort($data);
    return ($data);
  }
  
  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id) {
    $userId = Yii::app()->user->id;
    $model = Friend::model()->findByAttributes(array('id_user1' => $userId, 'id_user2' => $id));
    $model->delete();
     //Delete friendship from table
    $model = Alertfilter::model()->findByAttributes(array('user_1' => $userId, 'user_2' => $id));
    $model->delete();
     //Delete filter for the deleted friend
    
  }
  
  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionSaveFriend() {
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $userId = Yii::app()->user->id;
    $date = date('y/m/d h:i:s', time());
    $_POST['id_user1'] = $userId;
    $_POST['date'] = $date;
    $firephp = FirePHP::getInstance(true);
    $firephp->log($_POST, 'Datos');
    $model = new Friend;
    if (isset($_POST)) {
      $model->attributes = $_POST;
      if ($model->save()) {
         //friend added
        $this->creatDefaultAlertFilter($model->id_user2);
        return 1;
      } else {
        echo $_POST;
      }
    }
  }
  
  protected function creatDefaultAlertFilter($user2) {
    $model = new Alertfilter;
    $currentUserId = Yii::app()->user->id;
    $model->user_1 = $currentUserId;
    $model->user_2 = $user2;
    $model->id_position = null;
     //Always meassure from current location by default
    $model->value = 999;
     //Distance in meters to filter states
    $model->save();
  }
  
  public function actionView($id) {
  }
  
  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id1, $id2) {
    $model = Friend::model()->findByPk($id1, $id2);
    if ($model === null) {
      throw new CHttpException(404, 'The requested page does not exist.');
    }
    return $model;
  }
}
