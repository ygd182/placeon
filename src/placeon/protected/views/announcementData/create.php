<?php
/* @var $this AnnouncementDataController */
/* @var $model AnnouncementData */

$this->breadcrumbs=array(
	'Announcement Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnnouncementData', 'url'=>array('index')),
	array('label'=>'Manage AnnouncementData', 'url'=>array('admin')),
);
?>

<h1>Create AnnouncementData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'position'=>$position)); ?>