<?php
/**
 * BuddyBoss Compatibility Integration Class.
 *
 * @since BuddyBoss 1.1.5
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

use Composer\Script\PackageEvent;

/**
 * Check if the class does not exits then only allow the file to add
 */
if( ! class_exists( 'AcrossWP_Register_Blocks' ) ) {
	/**
	 * Fired during plugin licences.
	 *
	 * This class defines all code necessary to run during the plugin's licences and update.
	 *
	 * @since      0.0.1
	 * @package    AcrossWP_Main_Menu
	 * @subpackage AcrossWP_Main_Menu/includes
	 * @author     AcrossWP <contact@acrosswp.com>
	 */
	class AcrossWP_Register_Blocks {

		/**
		 * The single instance of the class.
		 *
		 * @var AcrossWP_Main_Menu
		 * @since 0.0.1
		 */
		protected static $_instance = null;

		/**
		 * Initialize the collections used to maintain the actions and filters.
		 *
		 * @since    0.0.1
		 */
		public function __construct() {

            add_action( 'init', array( $this, 'register_blocks' ) );
		}

		/**
		 * Main Post_Anonymously_Loader Instance.
		 *
		 * Ensures only one instance of WooCommerce is loaded or can be loaded.
		 *
		 * @since 0.0.1
		 * @static
		 * @see Post_Anonymously_Loader()
		 * @return Post_Anonymously_Loader - Main instance.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Adds the plugin license page to the admin menu.
		 *
		 * @return void
		 */
		function register_blocks() {
			
            $package = $event->getOperation()->getPackage();
            $originDir = $package->someFunctionToFind(); #Here, I should retrieve the install dir

            if (file_exists($originDir) && is_dir($originDir)) {
                var_dump( $originDir );
            } 
		}
	}

	AcrossWP_Main_Menu::instance();
}