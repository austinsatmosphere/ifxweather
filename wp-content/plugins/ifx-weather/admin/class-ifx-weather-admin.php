<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    iFx_Weather
 * @subpackage iFx_Weather/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    iFx_Weather
 * @subpackage iFx_Weather/admin
 * @author     Your Name <email@example.com>
 */
class iFx_Weather_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ifx_weather    The ID of this plugin.
	 */
	private $ifx_weather;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $ifx_weather       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ifx_weather, $version ) {

		$this->ifx_weather = $ifx_weather;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in iFx_Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The iFx_Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->ifx_weather, plugin_dir_url( __FILE__ ) . 'css/ifx-weather-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in iFx_Weather_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The iFx_Weather_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->ifx_weather, plugin_dir_url( __FILE__ ) . 'js/ifx-weather-admin.js', array( 'jquery' ), $this->version, false );

	}

}
