<?php
class SiteController extends Controller
{
  
  /**
   * Declares class-based actions.
   */
  public function actions() {
    return array(
    
    // captcha action renders the CAPTCHA image displayed on the contact page
    'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF,),
    
    // page action renders "static" pages stored under 'protected/views/site/pages'
    // They can be accessed via: index.php?r=site/page&view=FileName
    'page' => array('class' => 'CViewAction',),);
  }
  
  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionIndex() {
    
    // renders the view file 'protected/views/site/index.php'
    // using the default layout 'protected/views/layouts/main.php'
    /*$this->layout='main';
     $this->render('index');*/
    $this->redirect(array("site/loginMobile"));
  }
  
  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionAppIndex() {
    if (Yii::app()->user->name == "admin")
    
    // $this->redirect(Yii::app()->user->returnUrl); //url para el admin que maneja los usuarios
    $this->redirect(array('/cruge/ui/usermanagementadmin'));
    else {
      $this->redirect(array('/site/map'));
    }
  }
  
  public function actionLoginMobile() {
    $this->layout = 'multipage-template-offline';
    $this->redirect(array("cruge/ui/login"));
  }
  
  public function actionMap() {
    $currentUserId = Yii::app()->user->id;
    $allFriendsNotifications = 'select * from state where id_user in 
																(select id_user2 from friend where id_user1=' . $currentUserId . ')
																	order by date desc';
    $notifications = State::model()->findAllBySql($allFriendsNotifications);
    
    //$firephp = FirePHP::getInstance(true);
    //$firephp->log($reviews, 'Datos');
    $isPlace = Yii::app()->user->um->getFieldValue($currentUserId, 'isPlace');
    if ($isPlace) {
      $this->layout = 'multipage-template-map-place';
      $this->render('mapPlace');
    } else {
      $this->layout = 'multipage-template-map';
      $this->render('map');
    }
  }
  
  /*
  unificado en actionMap
  public function actionMapPlace()
  {
  
  $this->layout='multipage-template-map-place';
  $this->render('mapPlace');
  }
  */
  
  /**
   * This is the action to handle external exceptions.
   */
  public function actionError() {
    if ($error = Yii::app()->errorHandler->error) {
      if (Yii::app()->request->isAjaxRequest) echo $error['message'];
      else $this->render('error', $error);
    }
  }
  
  /**
   * Displays the contact page
   */
  public function actionContact() {
    $model = new ContactForm;
    if (isset($_POST['ContactForm'])) {
      $model->attributes = $_POST['ContactForm'];
      if ($model->validate()) {
        $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
        $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
        $headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-type: text/plain; charset=UTF-8";
        
        mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
        Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
        $this->refresh();
      }
    }
    $this->render('contact', array('model' => $model));
  }
  
  /**
   * Displays the login page
   */
  public function actionLogin() {
    
    /*	$model=new LoginForm;
    
    // if it is ajax validation request
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
    {
    echo CActiveForm::validate($model);
    Yii::app()->end();
    }
    
    // collect user input data
    if(isset($_POST['LoginForm']))
    {
    $model->attributes=$_POST['LoginForm'];
    // validate user input and redirect to the previous page if valid
    if($model->validate() && $model->login())
    $this->redirect(Yii::app()->user->returnUrl);
    }
    // display the login form
    //	$this->layout='multipage-template';
    $this->render('login',array('model'=>$model));*/
    
    //	$this->redirect('/tesis/index.php/cruge/ui/login');
    $this->redirect(array("site/loginMobile"));
  }
  
  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    Yii::app()->user->logout();
    $this->layout = 'multipage-template-offline';
    $this->redirect(Yii::app()->homeUrl);
  }
}
