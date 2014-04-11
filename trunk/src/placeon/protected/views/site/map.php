<div data-role="panel" data-position="right" data-display="overlay" data-theme="a" id="notificationList">
</div>
<div id="mapContainer" class="ui-bar-c ui-corner-all ui-shadow po-border" >
	<div id="map_canvas">
	</div>
</div>		

<div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
  <a href="#popupMenu" data-rel="popup" data-role="button" data-inline="true" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" aria-haspopup="true" aria-owns="#popupMenu" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-c">
  <span class="ui-btn-inner ui-btn-corner-all">
    <span class="ui-btn-text">Create state</span>
  </span>
</a>
</div>

<!-- HIDDEN MENU -->
<div class="ui-popup-container ui-selectmenu-hidden" id="popupMenu-popup">
  <div data-role="popup" id="popupMenu" data-theme="a" class="ui-popup ui-body-a ui-overlay-shadow ui-corner-all" aria-disabled="false" data-disabled="false" data-shadow="true" data-corners="true" data-transition="none" data-position-to="origin">
				<ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="b" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
					<li data-role="divider" data-theme="a" class="ui-li ui-li-static ui-btn-up-a ui-corner-top">Select state</li>
          <li> <a href="../State/create">State</a></li>
          <li> <a href="../Announcementdata/create">Announcement</a></li>
         <?php
         /*foreach($data AS $type){
             if($type!='State')
               echo '<li> <a href="../' . $type . 'data/create"> ' . $type .'</a></li>';
             else
               echo '<li> <a href="../' . $type . '/create"> ' . $type .'</a></li>';
          }*/
          ?>
						</ul>
		</div>
</div>
