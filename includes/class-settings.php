<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Keyss_WhatsApp_Settings {

	public function __construct() {

		add_action( 'admin_init', array( $this, 'register_settings' ) );
        

	}

	public function register_settings() {

		register_setting(
			'kwo_settings_group',
			'kwo_settings'
		);

	}
}