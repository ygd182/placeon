<?php
/* @var $this AnnouncementDataController */
/* @var $model AnnouncementData */

$this->breadcrumbs=array(
	'Announcement Datas'=>array('index'),
	$model->data->id_state,
);

$this->menu=array(
	array('label'=>'List AnnouncementData', 'url'=>array('index')),
	array('label'=>'Create AnnouncementData', 'url'=>array('create')),
	array('label'=>'Update AnnouncementData', 'url'=>array('update', 'id'=>$model->data->id_state)),
	array('label'=>'Delete AnnouncementData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->data->id_state),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnnouncementData', 'url'=>array('admin')),
);
?>


<h1>View AnnouncementData #<?php echo $model->data->id_state; ?></h1>
<div class="announcementContainer"> 
<?php 
$this->renderPartial('../state/view', array('model'=>$state));
$this->renderPartial('_view', array('data'=>$model));
//$this->renderPartial('../image/_view', array('data'=>$image));
/*
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_state',
		'message',
	),
));*/ ?>

</div>