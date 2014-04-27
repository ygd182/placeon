<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <div class="background-pic"></div>

  <?php if (empty($profile_pic) || ($profile_pic->image == null)) { ?>
    <div class="profile-pic ui-bar-c ui-shadow po-border"></div>
  <?php } else { ?>
    <div class="profile-pic ui-bar-c ui-shadow po-border" style="background: url(<?php echo CHtml::encode('../../'.$profile_pic->id_user. $profile_pic->image); ?>) no-repeat;"></div>
  <?php } ?>

  <br />
  <b><?php echo CHtml::encode($data->username); ?></b>
  <br />
  <?php echo CHtml::encode($data->email); ?>
  <br />
</div>
<a id="addFriendButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="add" data-iconpos="left">Add as friend</a>