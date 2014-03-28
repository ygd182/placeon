<?php
class SearchController extends Controller
{
  
  public function filters() {
    return array('accessControl',);
  }
  
  public function accessRules() {
    return array(array('allow', 'actions' => array(''), 'users' => array('*'),), array('allow',
     // allow authenticated user to perform 'create' and 'update' actions
    'actions' => array('index', 'search', 'view'), 'users' => array('@'),),);
  }
  
  public function actionIndex() {
    $this->layout = 'multipage-template-search';
    $usuarios = Yii::app()->user->um->listUsers();
    $currentUser = Yii::app()->user->um->loadUserById(Yii::app()->user->id);
    $key = array_search($currentUser, $usuarios);
    unset($usuarios[$key]);
    $this->render('search', array('content' => $usuarios));
  }
  
  public function actionSearch($username) {
    $this->layout = 'multipage-template-search';
    $usuarios = Yii::app()->user->um->listUsers();
    $this->renderPartial('search', array('content' => $usuarios));
  }
  
  public function actionView($id) {
  }
}
