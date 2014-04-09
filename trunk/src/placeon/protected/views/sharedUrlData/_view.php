<?php
/* @var $this SharedUrlDataController */
/* @var $data SharedUrlData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_state')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_state), array('view', 'id'=>$data->id_state)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />


</div>