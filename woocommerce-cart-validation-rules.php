<?php
/**
 * Plugin Name: WooCommerce Cart Validation Rules
 * Plugin URI:  https://github.com/toniilic/woocommerce-cart-validation-rules
 * Description: A modular engine for enforcing complex cart validation logic in WooCommerce.
 * Version:     1.0.0
 * Author:      Toni Ilic
 * Author URI:  https://github.com/toniilic
 * Text Domain: wc-cart-validation
 * Requires PHP: 7.4
 * Requires at least: 5.8
 * WC requires at least: 5.0
 */

defined( 'ABSPATH' ) || exit;

// PSR-4 Autoloader simulation for this example (in real scenario, use composer)
require_once __DIR__ . '/src/Autoloader.php';

use ToniIlic\WCCartRules\Infrastructure\PluginBootstrap;

add_action( 'plugins_loaded', function() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $plugin = new PluginBootstrap();
    $plugin->init();
} );
