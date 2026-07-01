<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Template_Engine {

	public static function replace( $template, $variables ) {

		foreach ( $variables as $token => $value ) {

			$template = str_replace(
				$token,
				(string) $value,
				$template
			);

		}

		return $template;

	}

}