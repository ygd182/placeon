<?php
/* @var $this AnnouncementDataController */
/* @var $model AnnouncementData */

$this->breadcrumbs=array(
	'Announcement Datas'=>array('index'),
	$model->id_state=>array('view','id'=>$model->id_state),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncementData', 'url'=>array('index')),
	array('label'=>'Create AnnouncementData', 'url'=>array('create')),
	array('label'=>'View AnnouncementData', 'url'=>array('view', 'id'=>$model->id_state)),
	array('label'=>'Manage AnnouncementData', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncementData <?php echo $model->id_state; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>