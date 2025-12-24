<?php
/**
 * Handles creation of WordPress admin menus and utilities.
 *
 * @package ZiorWebDev\PluginCommon
 */

namespace ZiorWebDev\PluginCommon;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Utilities
 *
 * Creates admin menu and submenu pages in WordPress dashboard.
 *
 * @package ZiorWebDev\PluginCommon
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

	/**
	 * Registers the elementor tags group.
	 *
	 * @return void
	 */
	public function register_elementor_tags_group( $dynamic_tags_manager ): void {
		$dynamic_tags_manager->register_group(
			'ziorwebdev',
			array(
				'title' => esc_html__( 'ZIORWeb.Dev', 'plugin-common' ),
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
				'title'  => esc_html__( 'ZIORWeb.Dev', 'plugin-common' ),
				'icon'   => 'eicon-apps',
				'active' => false,
			)
		);
	}
}
