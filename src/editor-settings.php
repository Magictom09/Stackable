<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Stackable_Editor_Settings' ) ) {
	class Stackable_Editor_Settings {

		/**
		 * Add our hooks.
		 */
		function __construct() {
			// Register settings.
			add_action( 'init', array( $this, 'register_settings' ) );

			// Make our settings available in the editor.
			add_filter( 'stackable_js_settings', array( $this, 'add_settings' ) );
		}

		/**
		 * Register the setting.
		 *
		 * @return void
		 */
		public function register_settings() {
			register_setting(
				'stackable_editor_settings',
				'stackable_enable_design_library',
				array(
					'type' => 'boolean',
					'description' => __( 'Hides the Stackable Design Library button on the top of the editor', STACKABLE_I18N ),
					'sanitize_callback' => 'sanitize_text_field',
					'show_in_rest' => true,
					'default' => true,
				)
			);

			register_setting(
				'stackable_editor_settings',
				'stackable_auto_collapse_panels',
				array(
					'type' => 'boolean',
					'description' => __( 'Collapse other inspector panels when opening another, keeping only one open at a time.', STACKABLE_I18N ),
					'sanitize_callback' => 'sanitize_text_field',
					'show_in_rest' => true,
					'default' => true,
				)
			);

			register_setting(
				'stackable_editor_settings',
				'stackable_enable_block_linking',
				array(
					'type' => 'boolean',
					'description' => __( 'Gives you the ability to link columns. Any changes you make on one column will automatically get applied on the other columns.', STACKABLE_I18N ),
					'sanitize_callback' => 'sanitize_text_field',
					'show_in_rest' => true,
					'default' => false,
				)
			);
		}

		/**
		 * Make our settings available in the editor.
		 *
		 * @param Array $settings
		 * @return Array Settings array to be loaded in the editor.
		 */
		public function add_settings( $settings ) {
			$settings['stackable_enable_design_library'] = get_option( 'stackable_enable_design_library' );
			$settings['stackable_auto_collapse_panels'] = get_option( 'stackable_auto_collapse_panels' );
			$settings['stackable_enable_block_linking'] = get_option( 'stackable_enable_block_linking' );
			return $settings;
		}
	}

	new Stackable_Editor_Settings();
}