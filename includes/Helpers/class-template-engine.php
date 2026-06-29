<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Template_Engine {

	public static function replace( $template, $variables ) {

		foreach ( $variables as $key => $value ) {

			$template = str_replace(
				'{' . $key . '}',
				$value,
				$template
			);

		}

		return $template;

	}

}