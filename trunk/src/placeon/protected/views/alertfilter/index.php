<?php
/* @var $this AlertfilterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alertfilters',
);

$this->menu=array(
	array('label'=>'Create Alertfilter', 'url'=>array('create')),
	array('label'=>'Manage Alertfilter', 'url'=>array('admin')),
);
?>

<h1>Alertfilters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
