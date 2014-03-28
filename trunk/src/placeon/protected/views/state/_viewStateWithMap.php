<?php
  $authorUrl = Yii::app()->request->baseUrl.'/index.php/crugeUser/view?id='.CHtml::encode($author->iduser);
  $stateUrl =Yii::app()->request->baseUrl .'/index.php/'.($data->type).'data/view?id='.$data->id;
?>
<div class="view">
  Hey! <b><?php echo CHtml::encode($author->username);?></b> created
  <br/>a new <b><?php echo CHtml::encode($data->type);?></b>
  <br/><b>When? </b><?php echo CHtml::encode($data->date);?>
  <br/><b>What? </b><?php echo CHtml::encode($data->description);?>
  <br/>
  <div data-role="controlgroup" data-mini="true" data-type="horizontal">
    <a href=<?php echo $stateUrl?> data-role="button">What?</a>
    <a href=<?php echo $authorUrl?> data-role="button">Who?</a>
    <a id="centerTo" data-id=<?php echo CHtml::encode($data->id);?> href=# data-role="button">Where?</a>
  </div>
</div>