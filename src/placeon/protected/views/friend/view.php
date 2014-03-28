<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <h2>Information</h2>
  <div data-role="fieldcontain" class="ui-disabled">
    <label for="name">Username:</label>
    <input type="text" name="name" id="name" value="<?php echo CHtml::encode($data->username); ?>"  />
    <label for="email">Email:</label>
    <input type="text" name="name" id="email" value="<?php echo CHtml::encode($data->email); ?>"  />
  </div>	
  <br />
  <br />
  <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="false" data-filter="false">
    <?php $base=Yii::app()->request->baseUrl;
      foreach($friendNotifications AS $friendNotification){
      echo '<li data-theme="c"><a href=' . $base . '/index.php/search/view?id=' . $friendNotification->id_place . '>';
      echo '<b>Place: </b>';
      echo Yii::app()->user->um->loadUserById($friendNotification->id_place)->username;      
      echo '<br />';
      echo '<b>Score: </b>'.$friendNotification->score;
      echo '<br />';
      echo '<b>Comment: </b>'.$friendNotification->comment;
      echo '<br />
      <b>Date: </b>';
      echo $friendNotification->date;
      echo '</a></li>';
    }?>
  </ul>
  <div data-role="panel" data-position="right" data-display="overlay" data-theme="a" id="notificationList">
    <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="false" data-filter="false">
      <?php $base=Yii::app()->request->baseUrl;
      foreach($allNotifications AS $notification){
        echo '<li data-theme="c"><a href=' . $base . '/index.php/search/view?id=' . $notification->id_place . '>';
        echo '<b>Friend: </b>';
        echo Yii::app()->user->um->loadUserById($notification->id_user)->username;
        echo '<br />';
        echo '<b>Place: </b>';
        echo Yii::app()->user->um->loadUserById($notification->id_place)->username;
        echo '<br />';
        echo '<b>Score: </b>'.$notification->score;
        echo '<br />';
        echo '<b>Comment: </b>'.$notification->comment;
        echo '<br />
        <b>Date: </b>';
        echo $notification->date;
        echo '</a></li>';
      }?>
    </ul>
  </div>
</div>
<br />
<a id="deleteFriendButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="delete" data-iconpos="left">Delete friend</a>