<?php
class AnnouncementDataController extends Controller
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
    'actions' => array(''), 'users' => array('*'),), array('allow',
     // allow authenticated user to perform 'create' and 'update' actions
    'actions' => array('index', 'view', 'create', 'update'), 'users' => array('@'),), array('allow',
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
    $model = $this->loadModel($id);
    
    // $image=Image::model()->findByPk($model->id_image);
    $state = State::model()->with('position')->findByPk($id);
    $this->render('view', array('model' => $model, 'state' => $state
    
    //  'image'=>$image
    ));
  }
  
  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $this->layout = 'multipage-template-createState';
    $model = new Announcement;
    $model->id_user = Yii::app()->user->id;
    $model->data = new AnnouncementData;
    
    $position = new Position;
    
    $model->id_user = Yii::app()->user->id;
     //se define el id del usuario logueado antes de mostrar el form
    
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $date = date('y/m/d h:i:s', time());
    $model->date = $date;
    $position->date = $date;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if (isset($_POST['AnnouncementData']) && (isset($_POST['Position']))) {
      $model->attributes = $_POST['Announcement'];
      $model->data->attributes = $_POST['AnnouncementData'];
      $position->attributes = $_POST['Position'];
      if ($position->save()) {
        $model->id_position = $position->id;
        
        if ($model->save()) {
          $model->data->image = CUploadedFile::getInstance($model->data, 'image');
          $firephp = FirePHP::getInstance(true);
          $firephp->log($model->data->image, 'Datos');
          $model->data->id_state = $model->id;
          if ($model->data->save()) {
            
            $model->data->image->saveAs($model->data->id_state . $model->data->image);
            $this->redirect(array('view', 'id' => $model->id));
          }
        }
      }
    }
    
    $this->render('create', array('model' => $model, 'position' => $position));
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
    
    if (isset($_POST['AnnouncementData'])) {
      $model->attributes = $_POST['AnnouncementData'];
      if ($model->save()) $this->redirect(array('view', 'id' => $model->id_state));
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
    $dataProvider = new CActiveDataProvider('AnnouncementData');
    $this->render('index', array('dataProvider' => $dataProvider,));
  }
  
  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new AnnouncementData('search');
    $model->unsetAttributes();
     // clear any default values
    if (isset($_GET['AnnouncementData'])) $model->attributes = $_GET['AnnouncementData'];
    
    $this->render('admin', array('model' => $model,));
  }
  
  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return AnnouncementData the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = AnnouncementData::model()->findByPk($id);
    $model = Announcement::model()->findByPk($id);
    if ($model === null) throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }
  
  /**
   * Performs the AJAX validation.
   * @param AnnouncementData $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'announcement-data-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}
