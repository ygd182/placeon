<?php
/* @var $this CrugeUserController */
/* @var $model CrugeUser */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'cruge-user-form',
  'enableAjaxValidation'=>false,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
  'action'=>Yii::app()->createUrl('/crugeuser/save'),
)); ?>

  <div class="row">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo CHtml::encode($model->username); ?>" />
  </div>

  <div class="row">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo CHtml::encode($model->email); ?>" />
  </div>

  <div class="row">
    <label for="image">Profile Pic:</label>
    <?php echo $form->fileField($profile_pic,'image'); ?>
    <?php if (empty($profile_pic) || ($profile_pic->image == null)) { ?>
      <div class="profile-pic ui-bar-c ui-shadow po-border"></div>
    <?php } else { ?>
      <div class="profile-pic ui-bar-c ui-shadow po-border" style="background: url(<?php echo CHtml::encode('../../'.$profile_pic->id_user. $profile_pic->image); ?>) no-repeat;"></div>
    <?php } ?>  </div>

  <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->