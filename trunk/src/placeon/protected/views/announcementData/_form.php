<?php
/* @var $this AnnouncementDataController */
/* @var $model AnnouncementData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'announcement-data-form',
	'enableAjaxValidation'=>false,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
  <?php echo $form->errorSummary($position); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model->data,'message'); ?>
		<?php echo $form->textField($model->data,'message',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model->data,'message'); ?>
	</div>
  
   <div class="row">
		<?php echo $form->labelEx($position,'latitude'); ?>
		<?php echo $form->textField($position,'latitude'); ?>
		<?php echo $form->error($position,'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($position,'longitude'); ?>
		<?php echo $form->textField($position,'longitude'); ?>
		<?php echo $form->error($position,'longitude'); ?>
	</div>
  
  	<div class="row">
		<?php /*echo $form->labelEx($model,'image'); 
		 echo $form->textField($model,'image',array('size'=>60,'maxlength'=>200));
		 echo $form->error($model,'image'); */?>
    
    <?php
          echo $form->labelEx($model->data, 'image');
          echo $form->fileField($model->data, 'image');
          echo $form->error($model->data, 'image');
    ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->