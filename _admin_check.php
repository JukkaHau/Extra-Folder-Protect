<?php
/* 2020 Extra Folder Protect */
require(dirname(__FILE__) . '/_config.php');
$ip_now = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDED_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
if(isset($EXTRA_LOGIN_WHITELISTED_IPS) && $EXTRA_LOGIN_WHITELISTED_IPS != '' && in_array($ip_now, $EXTRA_LOGIN_WHITELISTED_IPS)) {
}
else {
	if(!isset($_COOKIE[$EXTRA_LOGIN_COOKIE_NAME])) {
		require(dirname(__FILE__) . '/_extralogin_check.php');
		die();
	}
	else if($_COOKIE[$EXTRA_LOGIN_COOKIE_NAME] != $EXTRA_LOGIN_COOKIE_SECRET_VALUE) {
		//unset wrong cookie:
		unset($_COOKIE[$EXTRA_LOGIN_COOKIE_NAME]); 
		setcookie($EXTRA_LOGIN_COOKIE_NAME, null, -1, '/');

		// die('error '. $EXTRA_LOGIN_COOKIE_SECRET_VALUE );
		require(dirname(__FILE__) . '/_extralogin_check.php');
		die();
	}
}
