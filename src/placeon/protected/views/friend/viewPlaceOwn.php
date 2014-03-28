<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <h2>Information</h2>
  <div data-role="fieldcontain" >
    <label for="name">Username:</label>
    <input type="text" name="name" id="name" value="<?php echo CHtml::encode($data->username); ?>"  />
    <label for="email">Email:</label>
    <input type="text" name="name" id="email" value="<?php echo CHtml::encode($data->email); ?>"  />
    <a id="saveInformationButton" class="ui-disabled" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="add" data-iconpos="left">Save</a>
  </div>	
  <br />
  <br />
  <br />
  <br />
  <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="false" data-filter="false">
    <?php $base=Yii::app()->request->baseUrl;
      foreach($placeReviews AS $placeReview){
      echo '<li data-theme="c"><a href=' . $base . '/index.php/search/view?id=' . $placeReview->id_place . '>';
      echo '<b>Customer: </b>';
      echo Yii::app()->user->um->loadUserById($placeReview->id_user)->username;      
      echo '<br />';
      echo '<b>Score: </b>'.$placeReview->score;
      echo '<br />';
      echo '<b>Comment: </b>'.$placeReview->comment;
      echo '<br />
      <b>Date: </b>';
      echo $placeReview->date;
      echo '</a></li>';
    }?>
  </ul>
  <br />
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

