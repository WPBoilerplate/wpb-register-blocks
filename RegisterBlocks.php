<?php
/**
 * Register Blocks functionality
 *
 * @package WPBoilerplate\RegisterBlocks
 * @since   1.0.0
 */

namespace WPBoilerplate\RegisterBlocks;

// Exit if accessed directly.
\defined( 'ABSPATH' ) || exit;

/**
 * Check if the class does not exits then only allow the file to add
 */
if ( ! class_exists( 'WPBoilerplate\RegisterBlocks\RegisterBlocks' ) ) {

	/**
	 * Fired during plugin licences.
	 *
	 * This class defines all code necessary to run during the plugin's licences and update.
	 *
	 * @since      1.0.0
	 * @package    WPBoilerplate\RegisterBlocks
	 * @subpackage WPBoilerplate\RegisterBlocks\RegisterBlocks
	 */
	class RegisterBlocks {

		/**
		 * The plugin dir path
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $plugin_path    The string for plugin dir path
		 */
		protected $plugin_path;

		/**
		 * Initialize the collections used to maintain the actions and filters.
		 *
		 * @since    1.0.0
		 */
		public function __construct( $plugin_path ) {

			$this->plugin_path = $plugin_path;

			\add_action( 'init', array( $this, 'register_blocks' ) );
		}

		/**
		 * Get the block path inside the plugins
		 *
		 * @return string
		 */
		public function get_block_path() {
			return $this->plugin_path . 'build/blocks';
		}

		/**
		 * Adds the block into the sites
		 *
		 * @return void
		 */
		public function register_blocks() {

			$blocks_dir = $this->get_block_path();

			$block_directories = \glob( $blocks_dir . '/*', GLOB_ONLYDIR );
			foreach ( $block_directories as $block ) {
				\register_block_type( $block );
			}
		}
	}
}
