<?php
class StateDataController extends Controller
{
  public function filters() {
    return array('accessControl',);
  }
  
  public function accessRules() {
    return array(array('allow', 'actions' => array(''), 'users' => array('*'),), array('allow',
     // allow authenticated user to perform 'create' and 'update' actions
    'actions' => array('view'), 'users' => array('@'),),);
  }
  
  public function actionView($id) {
    $this->redirect(array("state/view?id=" . $id));
  }
  
}
