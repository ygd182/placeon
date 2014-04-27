<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <div class="background-pic"></div>
  <?php if (empty($profile_pic) || ($profile_pic->image == null)) { ?>
    <div class="profile-pic ui-bar-c ui-shadow po-border"></div>
  <?php } else { ?>
    <div class="profile-pic ui-bar-c ui-shadow po-border" style="background: url(<?php echo CHtml::encode('../../'.$profile_pic->id_user. $profile_pic->image); ?>) no-repeat;"></div>
  <?php } ?>    <br />
  <b><?php echo CHtml::encode($data->username); ?></b>
  <br />
  <?php echo CHtml::encode($data->email); ?>
  <br />
  
  <a id="deleteFriendButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="delete" data-iconpos="left">Delete friend</a>
  <a id="setAlertfilter" href="<?php echo Yii::app()->request->baseUrl;?>/index.php/alertfilter/create?user2=<?php echo($data->iduser); ?>" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="gear" data-iconpos="left">Configure alert filter</a>
  <br />
  <div class="ui-bar-d ui-corner-all ui-shadow po-border">
    <h2>States</h2>
    <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="true" data-filter="false">
      <?php $base=Yii::app()->request->baseUrl;
        foreach($states AS $state){
           echo '<li data-theme="c">';
            $this->renderPartial('../state/_view', array('data'=>$state));
            echo '</li>';
      }?>
    </ul>
    <br />
  </div>
  <div data-role="panel" data-position="right" data-display="overlay" data-theme="a" id="notificationList">
  </div>
   <?php
    //  $this->renderPartial('../common/notificationList', array('allNotifications'=>$allNotifications));
    ?>
</div>

