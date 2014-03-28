<?php
/* @var $this AlertfilterController */
/* @var $model Alertfilter */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alertfilter-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row hidden">
		<?php echo $form->labelEx($model,'user_1'); ?>
		<?php echo $form->textField($model,'user_1'); ?>
		<?php echo $form->error($model,'user_1'); ?>
	</div>

	<div class="row hidden">
		<?php echo $form->labelEx($model,'user_2'); ?>
		<?php echo $form->textField($model,'user_2'); ?>
		<?php echo $form->error($model,'user_2'); ?>
	</div>

	<div class="row">
		<label for="Alertfilter_value" class="required ui-input-text">Distance (in mts.)</label>
		<?php echo $form->numberField($model,'value'); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div data-role="fieldcontain">
	 	<fieldset data-role="controlgroup">
			<?php echo CHtml::checkBox("Alertfilter[id_position][{$model->id_position}]",$model->id_position,array('name'=>'checkbox-1','class'=>'custom','id'=>'checkbox-1')); ?>
			<label for="checkbox-1">Use customized fix position to filter</label>
	    </fieldset>
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