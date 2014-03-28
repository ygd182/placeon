<?php
/* @var $this StateController */
/* @var $model State */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'state-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
  <?php echo $form->errorSummary($position); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'description'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->