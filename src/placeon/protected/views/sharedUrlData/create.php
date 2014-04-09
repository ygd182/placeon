<?php
/* @var $this SharedUrlDataController */
/* @var $model SharedUrlData */

$this->breadcrumbs=array(
	'Shared Url Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SharedUrlData', 'url'=>array('index')),
	array('label'=>'Manage SharedUrlData', 'url'=>array('admin')),
);
?>

<h1>Create SharedUrlData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'position'=>$position)); ?>