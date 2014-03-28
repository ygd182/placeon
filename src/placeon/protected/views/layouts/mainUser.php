<!DOCTYPE html>
<html class="ui-mobile">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"><!-- base href="http://jquerymobile.com/demos/1.2.0-alpha.1/docs/pages/multipage-template.html" -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title></title> 
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryMobile.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/myStyle.css" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/jquery.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/lib/jQueryMobile.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	</head> 
	<body class="ui-mobile-viewport ui-overlay-c"> 
		<div data-role="page" data-theme="b">
			<div data-role="header">
				<h1 aria-level="1" role="heading" class="ui-title">PlaceOn</h1>
				<div id="mainmenu">
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('label'=>'Login'
							, 'url'=>Yii::app()->user->ui->loginUrl
							, 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')'
							, 'url'=>Yii::app()->user->ui->logoutUrl
							, 'visible'=>!Yii::app()->user->isGuest),
						),
					)); ?>
					<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
				</div><!-- mainmenu -->
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>
			</div><!-- /header -->
			<?php echo $content; ?>
			<div data-role="footer">
				<h4 class="powered">powered by ooTB - Out Of The Blue - 2013</h4>
			</div><!-- /footer -->
		</div>
	</body>
</html>