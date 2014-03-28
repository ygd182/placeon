<?php
/* @var $this AlertfilterController */
/* @var $data Alertfilter */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_1')); ?>:</b>
	<?php echo CHtml::encode($data->user_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_2')); ?>:</b>
	<?php echo CHtml::encode($data->user_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>