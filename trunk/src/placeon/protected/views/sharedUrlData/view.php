<?php
/* @var $this SharedUrlDataController */
/* @var $model SharedUrlData */

$this->breadcrumbs=array(
	'Shared Url Datas'=>array('index'),
	$model->id_state,
);

$this->menu=array(
	array('label'=>'List SharedUrlData', 'url'=>array('index')),
	array('label'=>'Create SharedUrlData', 'url'=>array('create')),
	array('label'=>'Update SharedUrlData', 'url'=>array('update', 'id'=>$model->id_state)),
	array('label'=>'Delete SharedUrlData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_state),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SharedUrlData', 'url'=>array('admin')),
);
?>

<h1>View SharedUrlData #<?php echo $model->id_state; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_state',
		'url',
	),
)); ?>
