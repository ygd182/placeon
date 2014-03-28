<?php
/* @var $this AnnouncementDataController */
/* @var $data AnnouncementData */
?>

<div class="view">



	<b><?php echo CHtml::encode($data->data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->data->message); ?>
	<br />
  
  <?php 
  echo CHtml::image('../../'.$data->data->id_state. $data->data->image, $data->data->image, array(
       'width'=>100, 
       'height'=>100) ); ?>


</div>