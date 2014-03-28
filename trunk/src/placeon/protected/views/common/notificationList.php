<h2>Notification List</h2>
<ul class="friendsList" data-role="listview">
  <?php foreach ($allNotifications AS $notification) {    
    $author = Yii::app()->user->um->loadUserById($notification->id_user);
    echo '<li class="unread" id="state'.$notification->id.'" data-user="'.$author->username.'" data-mess="'
    .$notification->description.'" data-lat="'.$notification->position->latitude.'" data-lon="'
    .$notification->position->longitude.'" data-theme="c">';
    $this->renderPartial('../state/_viewStateWithMap', array('data'=>$notification,'author'=>$author));
    echo '</li>';
  }
    ?>
    <?php foreach ($oldNotifications AS $notification) {
    $author = Yii::app()->user->um->loadUserById($notification->id_user);
    echo '<li class="read" id="state'.$notification->id.'" data-user="'.$author->username.'" data-mess="'
    .$notification->description.'" data-lat="'.$notification->position->latitude.'" data-lon="'
    .$notification->position->longitude.'" data-theme="c">';
    $this->renderPartial('../state/_viewStateWithMap', array('data'=>$notification,'author'=>$author));
    echo '</li>';
  }?>
</ul>
