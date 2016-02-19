<?php
/**
 * Plugin name: WP Libre Form
 * Plugin URI: https://github.com/Seravo/wp-libre-form
 * Description: A better contact form builder and lead collector
 * Version: 0.1
 * Author: Seravo Oy
 * Author: http://seravo.fi
 * License: GPLv3
 *
 * This plugin acts as a simple, no bullshit form maker for WordPress installations.
 * Everything is created with WordPress core functionality only, so it's beautiful.
 *
 * Go ahead, just look at the code! :)
 */

/** Copyright 2016 Seravo Oy

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 3, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

if ( !class_exists('WP_Libre_Form')) :

class WP_Libre_Form {
  public static $instance;

  public static function init() {
    if ( is_null( self::$instance ) ) {
      self::$instance = new WP_Libre_Form();
    }
    return self::$instance;
  }

  private function __construct() {
    //require 'vendor/autoload.php';

    add_action( 'plugins_loaded', array( $this, 'load_our_textdomain' ) );

    require_once 'inc/wplf-form.php';
    require_once 'inc/wplf-submissions.php';
    require_once 'inc/wplf-shortcode.php';
    require_once 'inc/wplf-form-validation.php';
    require_once 'inc/wplf-ajax.php';
  }

  /**
   * Load our plugin textdomain
   */
  public static function load_our_textdomain() {
    load_plugin_textdomain( 'wplf', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
  }
}

endif;

// init the plugin
$wplf = WP_Libre_Form::init();

