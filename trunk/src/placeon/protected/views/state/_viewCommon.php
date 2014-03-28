<?php
/* @var $this StateController */
/* @var $data State */
?>


  

    <div class="view">
      <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
      <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
      <?php echo CHtml::encode($data->id_user); ?>
      <br />
      
            <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
      <?php echo CHtml::encode($data->type); ?>
      <br />
      */ ?>
      <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
      <?php echo CHtml::encode($data->date); ?>
      <br />
      


      <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
      <?php echo CHtml::encode($data->description); ?>
      <br />


    </div>