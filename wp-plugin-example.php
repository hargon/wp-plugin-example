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

