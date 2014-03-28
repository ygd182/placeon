<!DOCTYPE html>
<html class="ui-mobile">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title></title> 
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryMobile.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/myStyle.css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/jQueryMobile.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/viewUser.js"></script>
  </head> 
  <body class="ui-mobile-viewport ui-overlay-c"> 
    <div data-role="page" data-theme="b">
      <div data-role="header">
          <?php $this->widget('application.components.widgets.SideMenu', array(
          'links' => array(
            array('name' => 'Map', 'url' =>  '/site/map', 'icon' => 'home'),
            array('name' => 'Search', 'url' =>  '/crugeUser/ViewAll', 'icon' => 'search'),
            array('name' => 'Friends', 'url' =>  '/friend', 'icon' => 'search'),
            array('name' => 'Profile', 'url' =>  '/crugeuser/view?id='.Yii::app()->user->id, 'icon' => 'gear'),
           
            array('name' => 'Logout', 'url' =>  '/cruge/ui/logout', 'icon' => 'delete')
          ))); ?>
      </div><!-- /header -->
      <div  data-role="content" data-theme="b"  > 
        <?php echo $content; ?>
      </div>
      <div data-role="footer">
        <h4 class="powered">powered by ooTB - Out Of The Blue - 2013</h4>
      </div><!-- /footer -->
    </div>
  </body>
</html>