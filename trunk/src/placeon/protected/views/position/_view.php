<?php
/* @var $this PositionController */
/* @var $data Position */
?>

<div id="mapContainer" class="ui-bar-c ui-corner-all ui-shadow po-border" >
	<div id="map_canvas">
	</div>
</div>		
<div class="view">


    <label for="lat">Latitude:</label>
    <span  name="lat" id="positionLatitudeView" ><?php echo($data->latitude); ?></span>
    <label for="long">Longitude:</label>
    <span name="long" id="positionLongitudeView" ><?php echo($data->longitude); ?></span>

	


</div>