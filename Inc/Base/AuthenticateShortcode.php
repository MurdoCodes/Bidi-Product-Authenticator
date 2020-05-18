<?php
/**
* @package Bidi Product Authenticator
*/
namespace Inc\Base;
use \Inc\Base\AuthenticateBaseController;

class AuthenticateShortcode extends AuthenticateBaseController{
	function register() {
		add_shortcode('Bidi_Product_Authenticator', array($this, 'template'));
	}

	function template(){
        require_once $this->plugin_path . 'templates/page.template.php';  
	}
}