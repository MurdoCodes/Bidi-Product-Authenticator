<?php
/**
* @package Bidi Product Authenticator
*/
namespace Inc\Base;
use \Inc\Base\AuthenticateBaseController;

class AuthenticateEnqueue extends AuthenticateBaseController{

	public function register() {
		$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
		$bidiAuthenticatorPage = strpos( $request_uri, '/authenticate-your-bidi/' );

		if( false === $bidiAuthenticatorPage ){
			return false;
		}else{
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueuePage'));	
		}
	}

	public function enqueuePage(){
		// enqueue all our scripts
		wp_enqueue_style( 'bootstrap-min-css', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css', __FILE__ );
		wp_enqueue_style( 'font-awesome-min-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', __FILE__ );
		wp_enqueue_style( 'JqueryConfirmCSS', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css', 99 );
		wp_enqueue_style( 'jquery-ui-min-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', __FILE__ );
		wp_enqueue_style( 'BidiAuthenticatePlugin-page', $this->plugin_url . 'assets/css/pluginStyleSheet.css', 99 );
		

		wp_enqueue_script( 'jquery-1-12-4', 'https://code.jquery.com/jquery-1.12.4.min.js', __FILE__ );
		wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', __FILE__ );
		wp_enqueue_script( 'bootstrap-min-js', 'https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', __FILE__ );
		wp_enqueue_script( 'JqueryConfirmCSSJS', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js', __FILE__ );
		
		wp_enqueue_script( 'BidiAuthenticatePluginScript', $this->plugin_url . 'assets/scripts/pluginScripts.js', __FILE__ );
		wp_localize_script('BidiAuthenticatePluginScript', 'pluginScript', array(
		    'pluginsUrl' => $this->plugin_url,
		));
		
	}

}