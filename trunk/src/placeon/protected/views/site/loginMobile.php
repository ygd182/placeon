<?php
	$this->pageTitle=Yii::app()->name . ' - Login';
	$this->breadcrumbs=array('Login',);
?>
<div id="content">
	<h1>Login</h1>
	<div class="form">
		<form method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cruge/ui/login" id="logon-form">
			<div class="row">
				<label class="required" for="CrugeLogon_username">Username or Email: <span class="required">*</span></label>
				<input type="text" maxlength="45" id="CrugeLogon_username" name="CrugeLogon[username]">	
			</div>
			<div class="row">
				<label class="required" for="CrugeLogon_password">Password: <span class="required">*</span></label>
				<input type="password" maxlength="20" id="CrugeLogon_password" name="CrugeLogon[password]">
			</div>
			<div class="row rememberMe">
				<input type="hidden" name="CrugeLogon[rememberMe]" value="0" id="ytCrugeLogon_rememberMe">
				<input type="checkbox" value="1" id="CrugeLogon_rememberMe" name="CrugeLogon[rememberMe]">
				<label for="CrugeLogon_rememberMe">Remember this machine:</label>
			</div>
			<div class="row buttons">
				<input type="submit" value="Login" name="submit"><a href="/tesis/index.php/cruge/ui/pwdrec">Lost Password?</a>
				<a href="/tesis/index.php/cruge/ui/registration">Register</a>
			</div>
		</form>
	</div>
</div>