<h1><?php echo ucwords(CrugeTranslator::t("register"));?></h1>
<div class="form">
<?php
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/
?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'registration-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
<div class="row form-group-vert">
	<h6><?php echo ucfirst(CrugeTranslator::t("Account data"));?></h6>
	<?php 
		foreach (CrugeUtil::config()->availableAuthModes as $authmode){
			echo "<div class='col'>";
			echo $form->labelEx($model,$authmode);
			echo $form->textField($model,$authmode);
			echo $form->error($model,$authmode);
			echo "</div>";
		}
	?>
	<div class="col">
		<?php echo $form->labelEx($model,'newPassword'); ?>

			<?php echo $form->textField($model,'newPassword'); ?>

		<?php echo $form->error($model,'newPassword'); ?>
		<script>
			function fnSuccess(data){
				$('#CrugeStoredUser_newPassword').val(data);
			}
			function fnError(e){
				alert("error: "+e.responseText);
			}
		</script>
		<?php echo CHtml::ajaxbutton(
			CrugeTranslator::t("Generate a new password")
			,Yii::app()->user->ui->ajaxGenerateNewPasswordUrl
			,array('success'=>new CJavaScriptExpression('fnSuccess'),
				'error'=>new CJavaScriptExpression('fnError'))
		); ?>
	</div>
</div>


<!-- inicio de campos extra definidos por el administrador del sistema -->
<?php 
	if(count($model->getFields()) > 0){
		echo "<div class='row form-group-vert'>";
		echo "<h6>".ucfirst(CrugeTranslator::t("profile"))."</h6>";
		$i=0;
		foreach($model->getFields() as $f){
			if($i<1){
			// aqui $f es una instancia que implementa a: ICrugeField
			echo "<div class='col'>";
			echo Yii::app()->user->um->getInputField($model,$f);
			echo '<label for="CrugeStoredUser_isPlace">'.Yii::app()->user->um->getLabelField($f).'</label>';
			echo $form->error($model,$f->fieldname);
			echo "</div>";
			$i++;
			}
		}
		echo "</div>";
	}
?>
<!-- fin de campos extra definidos por el administrador del sistema -->


<!-- inicio - terminos y condiciones -->
<?php
	if(Yii::app()->user->um->getDefaultSystem()->getn('registerusingterms') == 1)
	{
?>
<div class='form-group-vert'>
	<h6><?php echo ucfirst(CrugeTranslator::t("terminos y condiciones"));?></h6>
	<?php echo CHtml::textArea('terms'
		,Yii::app()->user->um->getDefaultSystem()->get('terms')
		,array('readonly'=>'readonly','rows'=>5,'cols'=>'80%')
		); ?>
	<div><span class='required'>*</span><?php echo CrugeTranslator::t(Yii::app()->user->um->getDefaultSystem()->get('registerusingtermslabel')); ?></div>
	<?php echo $form->checkBox($model,'terminosYCondiciones'); ?>
	<?php echo $form->error($model,'terminosYCondiciones'); ?>
</div>
<!-- fin - terminos y condiciones -->
<?php } ?>



<!-- inicio pide captcha -->
<?php if(Yii::app()->user->um->getDefaultSystem()->getn('registerusingcaptcha') == 1) { ?>
<div class='form-group-vert'>
	<h6><?php echo ucfirst(CrugeTranslator::t("codigo de seguridad"));?></h6>
	<div class="row">
		<div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"><?php echo CrugeTranslator::t("please type the characters or digits that you see on the image");?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
</div>
<?php } ?>
<!-- fin pide captcha-->



<div class="row buttons">
	<?php Yii::app()->user->ui->tbutton("Register"); ?>
</div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
</div>
