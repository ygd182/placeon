<?php
/* @var $this SharedUrlDataController */
/* @var $model SharedUrlData */

$this->breadcrumbs=array(
	'Shared Url Datas'=>array('index'),
	$model->id_state=>array('view','id'=>$model->id_state),
	'Update',
);

$this->menu=array(
	array('label'=>'List SharedUrlData', 'url'=>array('index')),
	array('label'=>'Create SharedUrlData', 'url'=>array('create')),
	array('label'=>'View SharedUrlData', 'url'=>array('view', 'id'=>$model->id_state)),
	array('label'=>'Manage SharedUrlData', 'url'=>array('admin')),
);
?>

<h1>Update SharedUrlData <?php echo $model->id_state; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>