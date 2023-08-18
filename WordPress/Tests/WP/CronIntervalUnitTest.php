<?php
/**
 * Unit test class for WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Tests\WP;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

/**
 * Unit test class for the CronInterval sniff.
 *
 * @since 0.3.0
 * @since 0.13.0 Class name changed: this class is now namespaced.
 * @since 1.0.0  This sniff has been moved from the `VIP` category to the `WP` category.
 *
 * @covers \WordPressCS\WordPress\Sniffs\WP\CronIntervalSniff
 */
final class CronIntervalUnitTest extends AbstractSniffUnitTest {

	/**
	 * Returns the lines where errors should occur.
	 *
	 * @return array<int, int> Key is the line number, value is the number of expected errors.
	 */
	public function getErrorList() {
		return array();
	}

	/**
	 * Returns the lines where warnings should occur.
	 *
	 * @return array<int, int> Key is the line number, value is the number of expected warnings.
	 */
	public function getWarningList() {
		return array(
			12  => 1,
			17  => 1,
			37  => 1,
			39  => 1,
			41  => 1,
			43  => 1,
			53  => 1,
			67  => 1,
			76  => 1,
			85  => 1,
			108 => 1,
			115 => 1,
			133 => 1,
			156 => 1,
			168 => 1,
			169 => 1,
			170 => 1,
			207 => 1,
			208 => 1,
			232 => 1,
			244 => 1,
			261 => 1,
			279 => 1,
			280 => 1,
			286 => 1,
			288 => 1,
			290 => 1,
			327 => 1,
			328 => 1,
		);
	}
}
