<div class="userView" data-iduser="<?php echo($data->iduser); ?>">

  <b>Username:</b>
  <?php echo CHtml::encode($data->username); ?>
  <br />

  <b>Email:</b>
  <?php echo CHtml::encode($data->email); ?>
  <br />

</div>
<a id="addFriendButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="add" data-iconpos="left">Add friend</a>