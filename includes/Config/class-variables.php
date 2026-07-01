<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Variables {

	public static function all() {

		return require KWO_PLUGIN_PATH . 'includes/Config/variables.php';

	}

	public static function get( $key ) {

		$variables = self::all();

		return $variables[ $key ] ?? null;

	}

	public static function preview_data() {

		$preview = array();

		foreach ( self::all() as $variable ) {

			$preview[ $variable['token'] ] = $variable['example'];

		}

		return $preview;

	}

}