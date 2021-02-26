<?php 
require_once 'config/config.php';
require 'helper/url_helper.php';
require 'helper/session_helper.php';

spl_autoload_register(function($class){
	require_once 'libraries/' .$class. '.php';
});
