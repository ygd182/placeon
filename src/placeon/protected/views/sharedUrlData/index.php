<?php
/* @var $this SharedUrlDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shared Url Datas',
);

$this->menu=array(
	array('label'=>'Create SharedUrlData', 'url'=>array('create')),
	array('label'=>'Manage SharedUrlData', 'url'=>array('admin')),
);
?>

<h1>Shared Url Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
