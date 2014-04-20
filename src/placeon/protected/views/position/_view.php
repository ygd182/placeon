<?php
/* @var $this PositionController */
/* @var $data Position */
?>

<div id="mapContainer" class="ui-bar-c ui-corner-all ui-shadow po-border" >
	<div id="map_canvas">
	</div>
</div>		
<div class="view">


    <b><label for="lat">Latitude:</label></b>
    <span  name="lat" id="positionLatitudeView" ><?php echo($data->latitude); ?></span>
    <b><label for="long">Longitude:</label></b>
    <span name="long" id="positionLongitudeView" ><?php echo($data->longitude); ?></span>

	


</div>