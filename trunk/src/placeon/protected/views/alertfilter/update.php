<?php
/* @var $this AlertfilterController */
/* @var $model Alertfilter */

$this->breadcrumbs=array(
	'Alertfilters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alertfilter', 'url'=>array('index')),
	array('label'=>'Create Alertfilter', 'url'=>array('create')),
	array('label'=>'View Alertfilter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alertfilter', 'url'=>array('admin')),
);
?>

<h1>Update Alertfilter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>