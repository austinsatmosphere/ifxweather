<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.ifxweather.com
 * @since             2.0.0
 * @package           ifx-weather
 *
 * @wordpress-plugin
 * Plugin Name:       iFx Weather
 * Plugin URI:        http://www.ifxweather.com
 * Description:       Create your own weather forecast. Plugin stores all weather forecasts in a database to be recalled anytime, verified and scored for accuracy.
 * Version:           2.0.0
 * Author:            Austin's Atmosphere
 * Author URI:        http://www.austinsatmosphere.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ifx-weather
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ifx-weather-activator.php
 */
function activate_ifx_weather() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ifx-weather-activator.php';
	iFx_Weather_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ifx-weather-deactivator.php
 */
function deactivate_ifx_weather() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ifx-weather-deactivator.php';
	iFx_Weather_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ifx_weather' );
register_deactivation_hook( __FILE__, 'deactivate_ifx_weather' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ifx-weather.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ifx_weather() {

	$plugin = new iFx_Weather();
	$plugin->run();

}

////////////////////////////////////////////////////////////////////////////
/////////////////////////////BEGIN OLD CODE/////////////////////////////////
// run_ifx_weather();

// function ifxwx_install () {
// 	global $wpdb;
// 	global $jal_db_version;

// 	$table_name = $wpdb->prefix . '3dayforecasts';
// 	$table_name2 = $wpdb->prefix . '3dayobservations';
	
// 	$charset_collate = $wpdb->get_charset_collate();

// 	$sql = "CREATE TABLE $table_name (
// 		id mediumint(9) NOT NULL AUTO_INCREMENT,
// 		type varchar(5) NOT NULL,
// 		verified varchar(5) NOT NULL,
//     forecaster varchar(55) NOT NULL,
//     station varchar(20),
//     location varchar(55) NOT NULL,
// 		date varchar(55) NOT NULL,
// 		time varchar(55) NOT NULL,
// 	fx_valid_month smallint(2) NOT NULL,
// 	fx_valid_day smallint(2) NOT NULL,
// 	fx_valid_year smallint(4) NOT NULL,
// 	fx_valid_time varchar(10) NOT NULL,
// 	col1_title varchar(30),
// 	col1_icon varchar(400),
// 	col1_weather varchar(55),
// 	col1_temp smallint(3),
// 	col1_highlow varchar(20),
// 	col1_pop smallint(3),
// 	col1_precip decimal(3,3),
// 	col1_hiderain smallint(1),
// 	col1_snowmin smallint(3),
// 	col1_snowmax smallint(3),
// 	col1_windmin smallint(3),
// 	col1_winmax smallint(3),
// 	col1_windgust smallint(3),
// 	col1_winddir varchar(20),
// 	col1_hidewind smallint(1),
// 	col1_details varchar(255),
// 	col2_title varchar(30),
// 	col2_icon varchar(400),
// 	col2_weather varchar(55),
// 	col2_temp smallint(3),
// 	col2_highlow varchar(20),
// 	col2_pop smallint(3),
// 	col2_precip decimal(3,3),
// 	col2_hiderain smallint(1),
// 	col2_snowmin smallint(3),
// 	col2_snowmax smallint(3),
// 	col2_windmin smallint(3),
// 	col2_winmax smallint(3),
// 	col2_windgust smallint(3),
// 	col2_winddir varchar(20),
// 	col2_hidewind smallint(1),
// 	col2_details varchar(255),
// 	col3_title varchar(30),
// 	col3_icon varchar(400),
// 	col3_weather varchar(55),
// 	col3_temp smallint(3),
// 	col3_highlow varchar(20),
// 	col3_pop smallint(3),
// 	col3_precip decimal(3,3),
// 	col3_hiderain smallint(1),
// 	col3_snowmin smallint(3),
// 	col3_snowmax smallint(3),
// 	col3_windmin smallint(3),
// 	col3_winmax smallint(3),
// 	col3_windgust smallint(3),
// 	col3_winddir varchar(20),
// 	col3_hidewind smallint(1),
// 	col3_details varchar(255),
// 	col4_title varchar(30),
// 	col4_icon varchar(400),
// 	col4_weather varchar(55),
// 	col4_temp smallint(3),
// 	col4_highlow varchar(20),
// 	col4_pop smallint(3),
// 	col4_precip decimal(3,3),
// 	col4_hiderain smallint(1),
// 	col4_snowmin smallint(3),
// 	col4_snowmax smallint(3),
// 	col4_windmin smallint(3),
// 	col4_winmax smallint(3),
// 	col4_windgust smallint(3),
// 	col4_winddir varchar(20),
// 	col4_hidewind smallint(1),
// 	col4_details varchar(255),
// 	col5_title varchar(30),
// 	col5_icon varchar(400),
// 	col5_weather varchar(55),
// 	col5_temp smallint(3),
// 	col5_highlow varchar(20),
// 	col5_pop smallint(3),
// 	col5_precip decimal(3,3),
// 	col5_hiderain smallint(1),
// 	col5_snowmin smallint(3),
// 	col5_snowmax smallint(3),
// 	col5_windmin smallint(3),
// 	col5_winmax smallint(3),
// 	col5_windgust smallint(3),
// 	col5_winddir varchar(20),
// 	col5_hidewind smallint(1),
// 	col5_details varchar(255),
// 	col6_title varchar(30),
// 	col6_icon varchar(400),
// 	col6_weather varchar(55),
// 	col6_temp smallint(3),
// 	col6_highlow varchar(20),
// 	col6_pop smallint(3),
// 	col6_precip decimal(3,3),
// 	col6_hiderain smallint(1),
// 	col6_snowmin smallint(3),
// 	col6_snowmax smallint(3),
// 	col6_windmin smallint(3),
// 	col6_winmax smallint(3),
// 	col6_windgust smallint(3),
// 	col6_winddir varchar(20),
// 	col6_hidewind smallint(1),
// 	col6_details varchar(255),
// 	temp_unit varchar(11),
// 	precip_unit varchar(3),
// 	wind_unit varchar(4),
// 	colorize_temp varchar(4),
// 		UNIQUE KEY id (id)
// 	) $charset_collate;";
	
// 	$sql2 = "CREATE TABLE $table_name2 (
// 		id mediumint(9) NOT NULL AUTO_INCREMENT,
// 		type varchar(5) NOT NULL,
// 		verified varchar(5) NOT NULL,
//     forecaster varchar(55) NOT NULL,
//     station varchar(20),
//     location varchar(55) NOT NULL,
// 		date varchar(55) NOT NULL,
// 		time varchar(55) NOT NULL,
// 	col1_date varchar(30),
// 	col1_time varchar(400),
// 	col1_weather varchar(55),
// 	col1_temp smallint(3),
// 	col1_highlow varchar(20),
// 	col1_pop smallint(3),
// 	col1_precip decimal(3,3),
// 	col1_snow smallint(3),
// 	col1_windmin smallint(3),
// 	col1_winmax smallint(3),
// 	col1_windgust smallint(3),
// 	col1_winddir varchar(20),
// 	col2_date varchar(30),
// 	col2_time varchar(400),
// 	col2_weather varchar(55),
// 	col2_temp smallint(3),
// 	col2_highlow varchar(20),
// 	col2_pop smallint(3),
// 	col2_precip decimal(3,3),
// 	col2_snow smallint(3),
// 	col2_windmin smallint(3),
// 	col2_winmax smallint(3),
// 	col2_windgust smallint(3),
// 	col2_winddir varchar(20),
// 	col3_date varchar(30),
// 	col3_time varchar(400),
// 	col3_weather varchar(55),
// 	col3_temp smallint(3),
// 	col3_highlow varchar(20),
// 	col3_pop smallint(3),
// 	col3_precip decimal(3,3),
// 	col3_snow smallint(3),
// 	col3_windmin smallint(3),
// 	col3_winmax smallint(3),
// 	col3_windgust smallint(3),
// 	col3_winddir varchar(20),
// 	col4_date varchar(30),
// 	col4_time varchar(400),
// 	col4_weather varchar(55),
// 	col4_temp smallint(3),
// 	col4_highlow varchar(20),
// 	col4_pop smallint(3),
// 	col4_precip decimal(3,3),
// 	col4_snow smallint(3),
// 	col4_windmin smallint(3),
// 	col4_winmax smallint(3),
// 	col4_windgust smallint(3),
// 	col4_winddir varchar(20),
// 	col5_date varchar(30),
// 	col5_time varchar(400),
// 	col5_weather varchar(55),
// 	col5_temp smallint(3),
// 	col5_highlow varchar(20),
// 	col5_pop smallint(3),
// 	col5_precip decimal(3,3),
// 	col5_snow smallint(3),
// 	col5_windmin smallint(3),
// 	col5_winmax smallint(3),
// 	col5_windgust smallint(3),
// 	col5_winddir varchar(20),
// 	col6_date varchar(30),
// 	col6_time varchar(400),
// 	col6_weather varchar(55),
// 	col6_temp smallint(3),
// 	col6_highlow varchar(20),
// 	col6_pop smallint(3),
// 	col6_precip decimal(3,3),
// 	col6_snow smallint(3),
// 	col6_windmin smallint(3),
// 	col6_winmax smallint(3),
// 	col6_windgust smallint(3),
// 	col6_winddir varchar(20),
// 	temp_unit varchar(11),
// 	precip_unit varchar(3),
// 	wind_unit varchar(4),
// 		UNIQUE KEY id (id)
// 	) $charset_collate;";

// 	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
// 	dbDelta( $sql );
// 	dbDelta( $sql2 );

// 	add_option( 'jal_db_version', $jal_db_version );

// }
// 	function ifxwx_install_data() {
// 	global $wpdb;
	
// 	$welcome_forecaster = 'Austin';
// 	$welcome_station = 'KDXR';
// 	$welcome_location = 'Danbury, CT';
// 	$welcome_fx_valid_month = '02';
// 	$welcome_fx_valid_day = '08';
// 	$welcome_fx_valid_year = '2016';
// 	$welcome_fx_valid_time = '5PM - 5AM';
	
// 	$table_name = $wpdb->prefix . '3dayforecasts';
	
// 	$wpdb->insert( 
// 		$table_name, 
// 		array( 
// 			'forecaster' => $welcome_forecaster, 
// 			'station' => $welcome_station,
// 			'location'=> $welcome_location,
// 			'fx_valid_month' => $welcome_fx_valid_month,
// 			'fx_valid_day' => $welcome_fx_valid_day,
// 			'fx_valid_year' => $welcome_fx_valid_year,
// 			'fx_valid_time' => $welcome_fx_valid_time
// 		) 
// 	);
	
// 			$welcome_forecaster2 = 'Austin';
// 	$welcome_station2 = 'KDXR';
// 	$welcome_location2 = '06776';
// 	$welcome_date = '2016-04-12';
// 	$welcome_time = '08:00';
		
// 	$table_name2 = $wpdb->prefix . '3dayobservations';
	
// 	$wpdb->insert( 
// 		$table_name2, 
// 		array( 
// 			'forecaster' => $welcome_forecaster2, 
// 			'station' => $welcome_station2,
// 			'location'=> $welcome_location2,
// 			'date' => $welcome_date,
// 			'time' => $welcome_time
// 		) 
// 	);

// 		ifxwx_install ();
// 		/*ifxwx_install_data ();*/
// 	}

// function test_shortcode() {
// 	global $wpdb;
	
// 	$result = $wpdb->get_results( "SELECT * FROM wp_3dayforecasts ");

// 	ob_start();
// echo "ID" . " Location" . "<br><br>";
	
// foreach($result as $row) {

//  echo $row->id . "  " . $row->location . "<br>";

//  }
// return ob_get_clean();
	
// }

// add_shortcode('listforecasts', 'test_shortcode');

// register_activation_hook( __FILE__, 'ifxwx_install' );
// register_activation_hook( __FILE__, 'ifxwx_install_data' );
////////////////////////////////////////////////////////////////////////////
/////////////////////////////END OLD CODE///////////////////////////////////

// add_action( 'admin_menu', 'ifxwx_admin_menu' );





// Register Custom Post Type
function forecast_post() {

	$labels = array(
		'name'                  => _x( 'Forecasts', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Forecast', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'iFx Weather', 'text_domain' ),
		'name_admin_bar'        => __( 'Forecast', 'text_domain' ),
		'archives'              => __( 'Forecast Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Forecast:', 'text_domain' ),
		'all_items'             => __( 'All Forecasts', 'text_domain' ),
		'add_new_item'          => __( 'Add New Forecast', 'text_domain' ),
		'add_new'               => __( 'Add New Forecast', 'text_domain' ),
		'new_item'              => __( 'New Forecast', 'text_domain' ),
		'edit_item'             => __( 'Edit Forecast', 'text_domain' ),
		'update_item'           => __( 'Update Forecast', 'text_domain' ),
		'view_item'             => __( 'View Forecast', 'text_domain' ),
		'search_items'          => __( 'Search Forecasts', 'text_domain' ),
		'not_found'             => __( 'No Forecasts Found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Forecast Feature Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set forecast featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove forecast featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as forecast featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into forecast', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this forecast', 'text_domain' ),
		'items_list'            => __( 'Forecasts list', 'text_domain' ),
		'items_list_navigation' => __( 'Forecasts list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter forecasts list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Forecast', 'text_domain' ),
		'description'           => __( 'Weather forecast', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'menu_icon'             => 'dashicons-cloud',
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_submenu'       => 'ifxwx-add-fx.php',
		'menu_position'         => 6,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	
	register_post_type( 'forecast', $args );
	
}
add_action( 'init', 'forecast_post', 0 );

add_action('admin_menu', 'ifx_weather_submenu');

function ifx_weather_submenu()
{
	add_submenu_page( 'edit.php?post_type=forecast', 'Options', 'Options', 'manage_options', 'ifxwx_options', 'ifxwx_admin_options');
}

class Day1_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'day1_fx',
			__( 'Day 1 Forecast', 'text_domain' ),
			array( $this, 'render_metabox' ),
			'forecast',
			'advanced',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'ifxwx_nonce_action', 'ifxwx_nonce' );

		// Retrieve an existing value from the database.
		$car_year = get_post_meta( $post->ID, 'car_year', true );
		$car_mileage = get_post_meta( $post->ID, 'car_mileage', true );
		$car_cruise_control = get_post_meta( $post->ID, 'car_cruise_control', true );
		$car_power_windows = get_post_meta( $post->ID, 'car_power_windows', true );
		$car_sunroof = get_post_meta( $post->ID, 'car_sunroof', true );

		// Set default values.
		if( empty( $car_year ) ) $car_year = '';
		if( empty( $car_mileage ) ) $car_mileage = '';
		if( empty( $car_cruise_control ) ) $car_cruise_control = '';
		if( empty( $car_power_windows ) ) $car_power_windows = '';
		if( empty( $car_sunroof ) ) $car_sunroof = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="car_year" class="car_year_label">' . __( 'Year', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="car_year" name="car_year" class="car_year_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $car_year ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="car_mileage" class="car_mileage_label">' . __( 'Mileage', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="number" id="car_mileage" name="car_mileage" class="car_mileage_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $car_mileage ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="car_cruise_control" class="car_cruise_control_label">' . __( 'Cruise Control', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="checkbox" id="car_cruise_control" name="car_cruise_control" class="car_cruise_control_field" value="' . $car_cruise_control . '" ' . checked( $car_cruise_control, 'checked', false ) . '> ' . __( '', 'text_domain' );
		echo '			<span class="description">' . __( 'Car has cruise control.', 'text_domain' ) . '</span>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="car_power_windows" class="car_power_windows_label">' . __( 'Power Windows', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="checkbox" id="car_power_windows" name="car_power_windows" class="car_power_windows_field" value="' . $car_power_windows . '" ' . checked( $car_power_windows, 'checked', false ) . '> ' . __( '', 'text_domain' );
		echo '			<span class="description">' . __( 'Car has power windows.', 'text_domain' ) . '</span>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="car_sunroof" class="car_sunroof_label">' . __( 'Sunroof', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="checkbox" id="car_sunroof" name="car_sunroof" class="car_sunroof_field" value="' . $car_sunroof . '" ' . checked( $car_sunroof, 'checked', false ) . '> ' . __( '', 'text_domain' );
		echo '			<span class="description">' . __( 'Car has sunroof.', 'text_domain' ) . '</span>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = $_POST['ifxwx_nonce'];
		$nonce_action = 'ifxwx_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$car_new_year = isset( $_POST[ 'car_year' ] ) ? sanitize_text_field( $_POST[ 'car_year' ] ) : '';
		$car_new_mileage = isset( $_POST[ 'car_mileage' ] ) ? sanitize_text_field( $_POST[ 'car_mileage' ] ) : '';
		$car_new_cruise_control = isset( $_POST[ 'car_cruise_control' ] ) ? 'checked' : '';
		$car_new_power_windows = isset( $_POST[ 'car_power_windows' ] ) ? 'checked' : '';
		$car_new_sunroof = isset( $_POST[ 'car_sunroof' ] ) ? 'checked' : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'car_year', $car_new_year );
		update_post_meta( $post_id, 'car_mileage', $car_new_mileage );
		update_post_meta( $post_id, 'car_cruise_control', $car_new_cruise_control );
		update_post_meta( $post_id, 'car_power_windows', $car_new_power_windows );
		update_post_meta( $post_id, 'car_sunroof', $car_new_sunroof );

	}

}

new Day1_Meta_Box;

// function ifxwx_admin_menu() {
// 	add_menu_page( 'iFx Weather', 'iFx Weather', 'manage_options', 'ifxwx', 'ifxwx_admin_page', 'dashicons-cloud', 6  );
// 	add_submenu_page( 'ifxwx','','Overview','manage_options','ifxwx','ifxwx_admin_page');
// 	add_submenu_page( 'ifxwx', 'View Forecasts', 'View Forecasts', 'manage_options', 'ifxwx-view-fx.php', 'ifxwx_admin_view_fx' );
// 	add_submenu_page( 'ifxwx', 'Add Forecast', 'Add Forecast', 'manage_options', 'ifxwx-add-fx.php', 'ifxwx_admin_add_fx' );

// }

function ifxwx_admin_page(){
	?>
	<div class="wrap">
		<h2>iFx Weather Overview</h2>
	</div>
	<?php
}

function ifxwx_admin_view_fx(){
	?>
	<div class="wrap">
		<h2>View Forecasts</h2>
	</div>
	<?php
}

function ifxwx_admin_add_fx(){
	?>
	<div class="wrap">
		<h2>Add New Forecast</h2>
	</div>

	<?php
}

function ifxwx_admin_options(){
	?>
	<div class="wrap">
		<h2>iFx Weather Options</h2>
	</div>
	<?php
}

