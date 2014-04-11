<?php
/* @var $this AlertfilterController */
/* @var $model Alertfilter */

$this->breadcrumbs=array(
	'Alertfilters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alertfilter', 'url'=>array('index')),
	array('label'=>'Manage Alertfilter', 'url'=>array('admin')),
);
?>

<h1>Create Alertfilter</h1>
<div id="mapContainer" class="ui-bar-c ui-corner-all ui-shadow po-border" >
	<div id="map_canvas">
	</div>
</div>		
<?php echo $this->renderPartial('_form', array('model'=>$model, 'position'=>$position)); ?>