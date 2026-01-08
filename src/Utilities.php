<?php
/**
 * Handles creation of WordPress admin menus and utilities.
 *
 * @package ZIORWebDev\PluginCommon
 */

namespace ZIORWebDev\PluginCommon;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Utilities
 *
 * Creates admin menu and submenu pages in WordPress dashboard.
 *
 * @package ZIORWebDev\PluginCommon
 */
class Utilities {

	/**
	 * Instance of the Utilities class.
	 *
	 * @var Utilities
	 */
	private static $instance = null;

	/**
	 * Constructor.
	 *
	 * Hooks into WordPress admin_menu action to register menus.
	 */
	public function __construct() {
		add_action( 'elementor/dynamic_tags/register', array( $this, 'register_elementor_tags_group' ), 10 );
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_elementor_categories' ), 10 );
	}

	/**
	 * Registers the elementor tags group.
	 *
	 * @return void
	 */
	public function register_elementor_tags_group( $dynamic_tags_manager ): void {
		$dynamic_tags_manager->register_group(
			'ziorwebdev',
			array(
				'title' => esc_html__( 'ZIORWebDev', 'plugin-common' ),
			)
		);
	}

	/**
	 * Registers the elementor categories.
	 *
	 * @return void
	 */
	public function register_elementor_categories( $elements_manager ): void {
		$elements_manager->add_category(
			'ziorwebdev',
			array(
				'title'  => esc_html__( 'ZIORWebDev', 'plugin-common' ),
				'icon'   => 'eicon-apps',
				'active' => false,
			)
		);
	}

	/**
	 * Returns the single instance of the Utilities class.
	 *
	 * @return Utilities The single instance of the Utilities class.
	 */
	public static function get_instance() {
		// If the instance does not exist, create it
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
