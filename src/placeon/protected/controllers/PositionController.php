<?php
class PositionController extends Controller
{
  
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout = '//layouts/column2';
  
  /**
   * @return array action filters
   */
  public function filters() {
    return array('accessControl',
     // perform access control for CRUD operations
    'postOnly + delete',
     // we only allow deletion via POST request
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
    'actions' => array('index', 'view'), 'users' => array('*'),), array('allow',
     // allow authenticated user to perform 'create' and 'update' actions
    'actions' => array('create', 'update', 'GetAll', 'GetAllFriends', 'GetFriend', 'SaveAllPositions'), 'users' => array('@'),), array('allow',
     // allow admin user to perform 'admin' and 'delete' actions
    'actions' => array('admin', 'delete'), 'users' => array('admin'),), array('deny',
     // deny all users
    'users' => array('*'),),);
  }
  
  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $this->layout = 'multipage-template-map-positionView';
    $this->render('view', array('model' => $this->loadModel($id),));
  }
  
  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new Position;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if (isset($_POST['Position'])) {
      $model->attributes = $_POST['Position'];
      if ($model->save()) $this->redirect(array('view', 'id' => $model->id));
    }
    
    $this->render('create', array('model' => $model,));
  }
  
  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if (isset($_POST['Position'])) {
      $model->attributes = $_POST['Position'];
      if ($model->save()) $this->redirect(array('view', 'id' => $model->id));
    }
    
    $this->render('update', array('model' => $model,));
  }
  
  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id) {
    $this->loadModel($id)->delete();
    
    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax'])) $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }
  
  /**
   * Lists all models.
   */
  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('Position');
    $this->render('index', array('dataProvider' => $dataProvider,));
  }
  
  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Position('search');
    $model->unsetAttributes();
     // clear any default values
    if (isset($_GET['Position'])) $model->attributes = $_GET['Position'];
    
    $this->render('admin', array('model' => $model,));
  }
  
  public function actionGetAll() {
    $userId = Yii::app()->user->id;
    $userPositionData = UserPositionRelation::model()->findAllByAttributes(array('id_user' => $userId));
    $placePositions = [];
    foreach ($userPositionData as $key => $userPosition) {
      $position = Position::model()->findByPk($userPosition->id_position);
      array_push($placePositions, $position);
    }
    
    echo CJSON::encode($placePositions);
  }
  
  public function actionGetAllFriends() {
    $userId = Yii::app()->user->id;
    $friendModel = new Friend;
    $userPosModel = new UserPositionRelation;
    $posData = $userPosModel->findAllByAttributes(array('id_user' => $userId));
    $firephp = FirePHP::getInstance(true);
    $current_friends = $friendModel->findAllByAttributes(array('id_user1' => $userId)
     /*,array('order'=>'id_user1 DESC')*/
    );
    $friends = [];
    foreach ($current_friends as $friendKey => $friendVal) {
      $state = new State;
      $current_states = $state->findAllByAttributes(array('id_user' => $friendVal->id_user2));
      foreach ($current_states as $stateKey => $stateVal) {
        $position = new Position;
        $current_position = $position->findByPK($stateVal->id);
        $friend_user = Yii::app()->user->um->loadUserById($friendVal->id_user2);
        
        //$firephp->log($friend_user, 'friend_user');
        $user['name'] = $friend_user->username;
        $user['positions'] = $current_position;
        if ($user['positions'] != null) array_push($friends, $user);
      }
    }
    echo CJSON::encode($friends);
  }
  
  public function actionGetFriend($id) {
    $friendModel = new Friend;
    $userId = Yii::app()->user->id;
    $friends = [];
    $usuario = Yii::app()->user->um->loadUserById($id
     /*, true (para que cargue sus campos)*/
    );
    $userPosRel = UserPositionRelation::model()->findAllByAttributes(array('id_user' => $id));
    foreach ($userPosRel as $key => $userPosition) {
      $position = Position::model()->findByPk($userPosition->id_position);
      $usuario1['name'] = $usuario->username;
      $usuario1['positions'] = $position;
      array_push($friends, $usuario1);
    }
    echo CJSON::encode($friends);
  }
  
  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionSavePosition() {
    $model = new Position;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $date = date('d/m/Y h:i:s a', time());
    $_POST['date'] = $date;
    $model->attributes = $_POST;
    
    //$firephp = FirePHP::getInstance(true);
    //$firephp->log($_POST, 'Datos');
    if ($model->save()) return 1;
    else return 0;
  }
  
  /*hace update o save segun corresponda*/
  public function actionSaveAllPositions() {
    $data = $_POST['data'];
    $firephp = FirePHP::getInstance(true);
    $firephp->log($data, 'datA post');
    foreach ($data as $key => $value) {
      $id = $value['id'];
      if (!$id == 'null') {
        $firephp = FirePHP::getInstance(true);
        $firephp->log(' no es null', 'datA post');
        $model = $this->loadModel($id);
      } else $model = new Position;
      date_default_timezone_set('America/Argentina/Buenos_Aires');
      $userId = Yii::app()->user->id;
      $date = date('d/m/Y h:i:s a', time());
      $value['date'] = $date;
      $model->attributes = $value;
      $model->save();
      if (($id == 'null')) {
        $userPosition = new UserPositionRelation;
        $userPosition['id_user'] = $userId;
        $userPosition['id_position'] = $model->id;
        $userPosition->save();
      }
    }
  }
  
  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDeletePosition($id) {
    $this->loadModel($id)->delete();
  }
  
  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return Position the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Position::model()->findByPk($id);
    if ($model === null) throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }
  
  /**
   * Performs the AJAX validation.
   * @param Position $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'position-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}

