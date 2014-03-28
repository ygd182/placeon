<?php
/* @var $this AlertfilterController */
/* @var $model Alertfilter */

$this->breadcrumbs=array(
	'Alertfilters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alertfilter', 'url'=>array('index')),
	array('label'=>'Create Alertfilter', 'url'=>array('create')),
	array('label'=>'Update Alertfilter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alertfilter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alertfilter', 'url'=>array('admin')),
);
?>

<h1>View Alertfilter #<?php echo $model->id; ?></h1>

<?php
/* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_1',
		'user_2',
		'value',
	),
));*/
  $this->renderPartial("_view",array('data'=>$model));
  ?>
