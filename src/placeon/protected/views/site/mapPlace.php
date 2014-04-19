<div id="mapContainer" class="ui-bar-c ui-corner-all ui-shadow po-border" >
	<div id="map_canvas">
	</div>
</div>
<div data-role="collapsible" class="ui-bar-c ">
    <h4>Edit Position</h4>
    <p>Select the option more suitable to update your location.</p>
    <div class="ui-block-a halfWidth">
    <div data-role="fieldcontain">
        <label for="latitudeInput">Latitude:</label>
        <input data-role="text" id="latitudeInput" size="10" />
    </div>	
  </div>
  <div class="ui-block-b halfWidth" >
    <div data-role="fieldcontain" >
        <label for="longitudeInput">Longitude:</label>
        <input data-role="text" id="longitudeInput" size="10" />
    </div>
  </div>
  <div data-role="fieldcontain">
      <label for="postcode">Address/Place:</label>
      <input data-role="text" id="postcode" size="10" />
  </div>	
  <a data-role="button" id="searchPostcodeButton">Search Address</a> 
  <a data-role="button" id="geolocationEnableButton">Automatic geolocation</a>
  <a data-role="button" id="savePlace">Save location</a> 
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
          <li> <a class="stateCreation" href="../State/create">State</a></li>
          <li> <a class="stateCreation" href="../Announcementdata/create">Announcement</a></li>
          <li> <a class="stateCreation" href="../sharedurldata/create">Shared Link</a></li>
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


