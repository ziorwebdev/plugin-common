<?php
/**
 * Load class
 *
 * @package ZIORWebDev\PluginCommon
 * @since 1.0.0
 */
namespace ZIORWebDev\PluginCommon;

/**
 * Class Load
 *
 * @package ZIORWebDev\PluginCommon
 * @since 1.0.0
 */
final class Load {

	/**
	 * Package version.
	 *
	 * @var string
	 */
	protected static $package_version = '1.0.0';

	/**
	 * Singleton instance of the Plugin class.
	 *
	 * @var Load
	 */
	protected static $instance;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		Utilities::get_instance();
	}

	/**
	 * Returns instance of Settings.
	 *
	 * @since 1.0.0
	 * @return object
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
