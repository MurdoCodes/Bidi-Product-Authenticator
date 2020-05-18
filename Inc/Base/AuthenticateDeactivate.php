<?php
/**
* @package Bidi Product Authenticator
*/
namespace Inc\Base;

class AuthenticateDeactivate{
	public static function deactivate(){
		flush_rewrite_rules();
	}
}