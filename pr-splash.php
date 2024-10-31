<?php
/*
Plugin Name: PR Splash
Plugin URI: http://paulor.com.br
Description: Plugin para exibição de mensagens ou imagens em forma de splash.
Version: 1.0.4
Author: Paulo Iankoski
*/

DEFINE('prSplashOptions', 'PRSplashOptions');
require_once(dirname(__FILE__).'/pr-admin-functions.php');
require_once(dirname(__FILE__).'/pr-front-functions.php');

if(!function_exists("PRSplash_ap")){
	function PRSplash_ap(){
		if(function_exists('add_menu_page')):
			add_menu_page( 'PR Splash', 'PR Splash', 'manage_options', 'prsplash', 'printAdminSplashPage');
		endif;
	}
}
add_action('admin_menu', 'PRSplash_ap');
