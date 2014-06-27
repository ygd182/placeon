<h1><?php echo CrugeTranslator::t("Retrieve password"); ?></h1>

<?php if(Yii::app()->user->hasFlash('pwdrecflash')): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('pwdrecflash'); ?>
</div>
<?php else: ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pwdrcv-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"><?php echo CrugeTranslator::t("please type the characters or digits that you see on the image");?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	
	<div class="row buttons">
		<?php Yii::app()->user->ui->tbutton("Retrieve password"); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div>
<?php endif; ?>