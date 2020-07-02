<?php
/**
 * Plugin Name: WP Plugin Example
 * Plugin URI: http://github.com/hargon/wp-plugin-example
 * Description: Adiciona um texto ao final do post.
 * Version: 1.0
 * Author: Artur
 * Author URI: http://github.com/hargon
 */

define('WP_PLUGIN_EXAMPLE_VERSION', '1.0');

function wp_plugin_example_add_message_footer($content) {
    if (is_single()) {
        return $content . '<p>Até logo leitor(a)!</p>';
    }
}

add_filter('the_content', 'wp_plugin_example_add_message_footer');


require_once 'plugin-update-checker/plugin-update-checker.php';


/*
 * Plugin Update Checker Setting
 *
 * @see https://github.com/YahnisElsts/plugin-update-checker for more details.
 */
function my_plugin_update_checker_setting() {
	if ( ! is_admin() || ! class_exists( 'Puc_v4_Factory' ) ) {
		return;
	}

	$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/hargon/wp_plugin_example/',
		__FILE__,
		'wp_plugin_example'
	);
	
	// (Opcional) If you're using a private repository, specify the access token like this:
	//$myUpdateChecker->setAuthentication('your-token-here');

	// (Opcional) Set the branch that contains the stable release.
	//$myUpdateChecker->setBranch('stable-branch-name');
}

add_action( 'admin_init', 'my_plugin_update_checker_setting' );

