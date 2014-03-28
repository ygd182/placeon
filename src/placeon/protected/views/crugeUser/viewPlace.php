<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <h2>Information</h2>
  <div data-role="fieldcontain" class="ui-disabled">
    <label for="name">Username:</label>
    <input type="text" name="name" id="name" value="<?php echo CHtml::encode($data->username); ?>"  />
    <label for="email">Email:</label>
    <input type="text" name="name" id="email" value="<?php echo CHtml::encode($data->email); ?>"  />
  </div>	
  <br />
  <a id="deleteFriendButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="delete" data-iconpos="left">Delete friend</a>
  <br />
    <a id="setAlertfilter" href="<?php echo Yii::app()->request->baseUrl;?>/index.php/alertfilter/create?user2=<?php echo($data->iduser); ?>" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="gear" data-iconpos="left">Configure alert filter</a>
  <br />
  <h2>States</h2>
  <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="false" data-filter="false">
    <?php $base=Yii::app()->request->baseUrl;
      foreach($states AS $state){
         echo '<li data-theme="c">';
          $this->renderPartial('../state/_view', array('data'=>$state));
          echo '</li>';
    }?>
  </ul>
  <br />
  <div data-role="panel" data-position="right" data-display="overlay" data-theme="a" id="notificationList">
  </div>
   <?php
    //  $this->renderPartial('../common/notificationList', array('allNotifications'=>$allNotifications));
    ?>
</div>

