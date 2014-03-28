<?php
/* @var $this AnnouncementDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announcement Datas',
);

$this->menu=array(
	array('label'=>'Create AnnouncementData', 'url'=>array('create')),
	array('label'=>'Manage AnnouncementData', 'url'=>array('admin')),
);
?>

<h1>Announcement Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
