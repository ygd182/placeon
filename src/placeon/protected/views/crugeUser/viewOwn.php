
<?php

/* @var $this CrugeUserController */
/* @var $model CrugeUser */
echo $this->renderPartial('_form', array('model'=>$data, 'profile_pic' => $profile_pic)); ?>
<div class="ui-bar-d ui-corner-all ui-shadow po-border">
    <h2>States</h2>
    <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="true" data-filter="false">
      <?php $base=Yii::app()->request->baseUrl;
        foreach($states AS $state){
           echo '<li data-theme="c">';
            $this->renderPartial('../state/_view', array('data'=>$state));
            echo '</li>';
      }?>
    </ul>
</div>