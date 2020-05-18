<?php
/**
* @package Bidi Product Authenticator
*/
/*
Plugin Name:Bidi Product Authenticator
Plugin URI: https://bidivapor.com
Description: This is a plugin that would allow customers to check if the product they purchased is Authentic
Version: 1.0.0
Author: QuickFillRX
Author URI : http://quickfillrx.com/
License: GPLv2 or later
Text Domain: bidi-product-authenticator
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the license, or (at your option) an later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY of FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public Icense for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
Copyright 2005-2015 Automatic, Inc.
*/
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );

// Load Composer Vendor Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Initialize Activation, The code that runs during plugin activation
function activate_product_authenticator_plugin(){
    Inc\Base\AuthenticateActivate::activate();
}
register_activation_hook( __FILE__, 'activate_product_authenticator_plugin' );

// Initialize Deactivation, The code that runs during plugin deactivation
function deactivate_product_authenticator_plugin(){
    Inc\Base\AuthenticateDeactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_product_authenticator_plugin' );

// Include the Init folder, Initialize all the core classes of the plugin
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}