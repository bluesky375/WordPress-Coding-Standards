<?php
/**
 * Unit test class for WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Tests\Security;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

/**
 * Unit test class for the ValidatedSanitizedInput sniff.
 *
 * @package WPCS\WordPressCodingStandards
 *
 * @since   0.3.0
 * @since   0.13.0 Class name changed: this class is now namespaced.
 * @since   1.0.0  This sniff has been moved from the `VIP` category to the `Security` category.
 */
class ValidatedSanitizedInputUnitTest extends AbstractSniffUnitTest {

	/**
	 * Returns the lines where errors should occur.
	 *
	 * @return array <int line number> => <int number of errors>
	 */
	public function getErrorList() {
		return array(
			5   => 3,
			7   => 1,
			10  => 1,
			20  => 1,
			33  => 3,
			65  => 1,
			79  => 1,
			80  => 1,
			81  => 1,
			82  => 1,
			85  => 1,
			90  => 1,
			93  => 1,
			96  => 1,
			100 => 2,
			101 => 1,
			104 => 2,
			105 => 1,
			114 => 2,
			121 => 1,
			132 => 1,
			137 => 1,
			138 => 1,
			150 => 2,
			160 => 2,
		);
	}

	/**
	 * Returns the lines where warnings should occur.
	 *
	 * @return array <int line number> => <int number of warnings>
	 */
	public function getWarningList() {
		return array(
			76 => 1, // Whitelist comment deprecation warning.
		);
	}

}
