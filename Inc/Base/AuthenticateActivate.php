<?php
/**
* @package Bidi Product Authenticator
*/
namespace Inc\Base;

class AuthenticateActivate {

	public static function activate(){
		flush_rewrite_rules();
	}	
}