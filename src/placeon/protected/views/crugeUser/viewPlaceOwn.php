<div class="userView" data-iduser="<?php echo($data->iduser); ?>">
  <h2>Information</h2>
  <div data-role="fieldcontain" >
    <label for="name">Username:</label>
    <input type="text" name="name" id="name" value="<?php echo CHtml::encode($data->username); ?>"  />
    <label for="email">Email:</label>
    <input type="text" name="name" id="email" value="<?php echo CHtml::encode($data->email); ?>"  />
    <a id="saveInformationButton"  href="#" data-ajax="false" data-role="button" data-inline="true" data-theme="b" data-icon="add" data-iconpos="left">Save</a>
  </div>	
  <br />
  <br />
  <br />
  <br />
  <h2>States</h2>
  <ul class="friendsList" data-role="listview" data-autodividers="false" data-inset="false" data-filter="false">
    <?php $base=Yii::app()->request->baseUrl;
      foreach($states AS $state){
         echo '<li data-theme="c">';
          $this->renderPartial('../state/_view', array('data'=>$state));
          echo '</li>';
    }?>
  </ul>
  <br />
</div>

