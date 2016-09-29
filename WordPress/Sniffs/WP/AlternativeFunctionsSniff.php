<?php
/**
 * WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

/**
 * Discourages the use of various functions and suggests (WordPress) alternatives.
 *
 * @package WPCS\WordPressCodingStandards
 *
 * @since   0.11.0
 */
class WordPress_Sniffs_WP_AlternativeFunctionsSniff extends WordPress_AbstractFunctionRestrictionsSniff {

	/**
	 * Groups of functions to restrict.
	 *
	 * Example: groups => array(
	 * 	'lambda' => array(
	 * 		'type'      => 'error' | 'warning',
	 * 		'message'   => 'Use anonymous functions instead please!',
	 * 		'functions' => array( 'eval', 'create_function' ),
	 * 	)
	 * )
	 *
	 * @return array
	 */
	public function getGroups() {
		return array(
			'curl' => array(
				'type'      => 'warning',
				'message'   => 'Using cURL functions is highly discouraged. Use wp_remote_get() instead.',
				'functions' => array(
					'curl_*',
				),
			),

			'parse_url' => array(
				'type'      => 'warning',
				'message'   => '%s() is discouraged due to a lack for backwards-compatibility in PHP versions; use wp_parse_url() instead.',
				'functions' => array(
					'parse_url',
				),
			),

			'json_encode' => array(
				'type'      => 'warning',
				'message'   => '%s() is discouraged. Use wp_json_encode() instead.',
				'functions' => array(
					'json_encode',
				),
			),

			'file_get_contents' => array(
				'type'      => 'warning',
				'message'   => '%s() is discouraged. Use wp_remote_get() instead.',
				'functions' => array(
					'file_get_contents',
				),
			),

		);
	} // end getGroups()

} // end class
