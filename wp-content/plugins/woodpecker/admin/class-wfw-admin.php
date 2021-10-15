<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Woodpecker_For_Wordpress_Connector
 * @subpackage Woodpecker_For_Wordpress_Connector/admin
 */


class Woodpecker_For_Wordpress_Connector_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The url of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $url
	 */
	private $url;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $url ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->url = $url;

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
		 * defined in Woodpecker_For_Wordpress_Connector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woodpecker_For_Wordpress_Connector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Add the color picker css file
		wp_enqueue_style('wp-color-picker');

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wfw-admin.css', array(), $this->version.rand(), 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_media();
		wp_enqueue_script('media-upload');

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wfw-admin.min.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {
		add_menu_page( 'Woodpecker', 'Woodpecker', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), plugin_dir_url( __FILE__ ) . 'images/woodpecker-co.png', 81 );
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_setup_page() {
		include_once( 'partials/wfw-admin.php' );
	}

	/**
	 * Save admin options to database
	 *
	 * @since    2.0.0
	 */
	function saveFormSettings() {
		if (current_user_can('manage_options')) {
			global $wpdb;

			$table = $wpdb->prefix . 'wfw_forms';
			$where = [ 'id' => 1 ];

			$data = array(
				'id' => 1,
				'last_mod_date' => date("Y-m-d"),
				'success_message' => wp_filter_post_kses($_POST['successMessage']),
				'error_message' => wp_filter_post_kses($_POST['errorMessage']),
				'already_exist_message' => wp_filter_post_kses($_POST['alreadyExistMessage']),
				'field_required_message' => wp_filter_post_kses($_POST['fieldRequiredMessage']),
				'privacy_policy_message' => wp_filter_post_kses($_POST['privacyPolicyMessage']),
				'api_key' => sanitize_text_field($_POST['apiKey'])
			);

			$wpdb->update($table, $data, $where);
			echo $wpdb->last_query;
		}
	}

	/**
	 * Save form fields to database
	 *
	 * @since    2.0.0
	 */
	function saveFormData() {
		$fields = $_POST['fields'];

		if (current_user_can('manage_options')) {
			global $wpdb;

			$table = $wpdb->prefix . 'wfw_forms';
			$where = [ 'id' => 1 ];

			$data = array(
				'id' => 1,
				'last_mod_date' => date("Y-m-d"),
				'button_label' => sanitize_text_field($_POST['buttonLabel']),
				'default_style' => sanitize_key($_POST['defaultStyle']),
				'font_color' => sanitize_hex_color($_POST['fontColor']),
				'button_color' => sanitize_hex_color($_POST['buttonColor']),
				'button_hover' => sanitize_hex_color($_POST['buttonHover'])
			);

			$wpdb->update($table, $data, $where);

			$tableFormFields = $wpdb->prefix . 'wfw_forms_fields';
			$wpdb->delete( $tableFormFields, array( 'form_id' => 1 ) );
			$wpdb->query("ALTER TABLE " . $tableFormFields . " AUTO_INCREMENT = 1");

			foreach ($_POST['fields'] as $key) {	
				$fieldMap = sanitize_text_field(strtoupper($key[0]));
				$fieldLabel = sanitize_text_field($key[1]);
				$validateText = sanitize_text_field($key[2]);
				$required = rest_sanitize_boolean($key[3]) == "1" ? true : false;
				$relation = sanitize_text_field($key[4]);
				$fieldMap = str_replace(" ", "_", strtoupper($fieldMap));
				if ($fieldMap == 'EMAIL') {
					$required = true;
				}

				$dataFormFields = array(
					'id' => '',
					'field_label' => $fieldLabel,
					'fields_map' => $fieldMap,
					'form_id' => 1,
					'timestamp' => date('Y-m-d H:m:s'),
					'regex' => '',
					'required' => $required,
					'validate_text' => $validateText,
					'relation' => $relation
				);

				$wpdb->insert($tableFormFields, $dataFormFields);
			}
		}
	}
}
