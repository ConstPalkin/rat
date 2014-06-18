<?php
/*
Plugin Name: ReArchTemplate
Description: This plugin change archive template
Version: 0.0.2
Author: Const Palkin
Author URI: http://intelinets.ru
Author Email: palkin@intelinets.ru
License: Free
*/

$VERSION = '0.0.2';
$plugin_slug = 'rat';



function getTemplate()
	{
			if (is_archive()) 
			{
				include( plugin_dir_path( __FILE__ ) . 'funct.php' );
				include( plugin_dir_path( __FILE__ ) . 'archive.php' );
				exit;
			}
	}

add_action( 'template_redirect', 'getTemplate' , 5 );

/*
		wp_register_style( $plugin_slug, plugins_url( '/css/style.css', __FILE__ ), array(), $VERSION, 'all' );
		wp_enqueue_style( $plugin_slug );
		wp_register_script( $plugin_slug, plugins_url( '/js/rat.js', __FILE__ ), array(), $VERSION, true );
		wp_enqueue_script( $plugin_slug );
*/

