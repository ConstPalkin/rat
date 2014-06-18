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

class ReArchTemplate
{
	const VERSION = '0.0.2';
	private $plugin_name = 'ReArchTemplate';
	private $plugin_slug = 'rat';

	public function __construct()
	{
		$this->registerStyle();
		add_action( 'template_redirect', array( $this, 'getTemplate' ), 5 );
	}


	public function getTemplate()
	{
			if (is_archive()) 
			{
				include( plugin_dir_path( __FILE__ ) . 'funct.php' );
				include( plugin_dir_path( __FILE__ ) . 'archive.php' );
				exit;
			}
	}
/*
	private function registerScript()
	{
		wp_register_script( $this->plugin_slug, plugins_url( '/js/rat.js', __FILE__ ), array(), self::VERSION, true );
		wp_enqueue_script( $this->plugin_slug );
	}
*/

	private function registerStyle()
	{
		wp_register_style( $this->plugin_slug, plugins_url( '/css/style.css', __FILE__ ), array(), self::VERSION, 'all' );
		wp_enqueue_style( $this->plugin_slug );
	}


}

new ReArchTemplate;

