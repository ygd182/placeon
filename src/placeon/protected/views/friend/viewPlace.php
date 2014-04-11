<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <b>Username:</b>
  <?php echo CHtml::encode($data->username); ?>
  <br />
  <b>Email:</b>
  <?php echo CHtml::encode($data->email); ?>
  <br />
  <a id="deleteFriendButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="delete" data-iconpos="left">Delete friend</a>
  <br />
  <br />
  <h2>Reviews</h2>
  <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="true" data-filter="false">
    <?php $base=Yii::app()->request->baseUrl;
     /* foreach($placeReviews AS $placeReview){
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
      echo '</a></li>';*/
      foreach($states AS $state){
         echo '<li data-theme="c">';
          $this->renderPartial('../state/_view', array('data'=>$state));
          echo '</li>';
    }?>
  </ul>
  <br />
  <div class="ui-block-a halfWidth">
    <label for="textarea-a">New comment: </label>
    <textarea name="textarea" id="textarea-a"> </textarea>
  </div>
  <div class="ui-block-a halfWidth">
    <div data-role="fieldcontain" >
     <label for="select-choice-1" class="select">Rating: </label>
     <select name="select-choice-1" id="select-choice-1">
        <option value="standard">1 out of 10</option>
        <option value="standard">2 out of 10</option>
        <option value="standard">3 out of 10</option>
        <option value="standard">4 out of 10</option>
        <option value="standard">5 out of 10</option>
        <option value="standard">6 out of 10</option>
        <option value="standard">7 out of 10</option>
        <option value="standard">8 out of 10</option>
        <option value="standard">9 out of 10</option>
        <option value="standard">10 out of 10</option>
     </select>
    </div>
  </div>
  <div data-role="panel" data-position="right" data-display="overlay" data-theme="a" id="notificationList">
    <h2>Notification List</h2>
    <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="true" data-filter="false">
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

  <a id="saveReviewButton" href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="add" data-iconpos="left">Save review</a>
</div>

