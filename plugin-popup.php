<?php
/*
Plugin Name: Plugin Popup
Plugin URI: https://leafteashop.co.uk/plugin-popup
Description: A simple popup plugin based on a custom JavaScript application.
Version: 1.0
Author: Blaze Media
Author URI: https://blazemedia.co.uk/
License: GPL2
*/
function mi_plugin_popup_enqueue_scripts() {
    wp_enqueue_script('mi-plugin-popup-script', plugin_dir_url(__FILE__) . 'js/mi-plugin-popup.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'mi_plugin_popup_enqueue_scripts');


function mi_plugin_popup_enqueue_styles() {
    wp_enqueue_style('plugin-popup-style', plugin_dir_url(__FILE__) . 'css/plugin-popup.css');
}
add_action('wp_enqueue_scripts', 'plugin_popup_enqueue_styles');

add_shortcode( 'popup_plugin', 'my_popup_plugin_shortcode' );


function my_popup_plugin_shortcode($atts) {
    // You can customize the default attributes by using the shortcode_atts() function.
    $atts = shortcode_atts(array(
        'id' => 'popup',
        'class' => 'popup-class',
    ), $atts, 'popup_plugin');

    // Output the necessary HTML and JavaScript for your pop-up.
ob_start();?>
<div id="<?php echo esc_attr($atts['id']); ?>" class="<?php echo esc_attr($atts['class']); ?>">
    <div>
        <button class="show-modal">BTN</button>
            <div class="modal hidden">
                <button class="close-modal">&times;</button>
                    <h1>I'm a modal window </h1>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.
                    </p>
            </div>
        <div class="overlay hidden"></div>
    </div>
</div>
<link rel="stylesheet" href="/wp-content/plugins/plugin-popup/css/style.css">
<script src="/wp-content/plugins/plugin-popup/js/plugin-pop-up.js"></script>
 
 <?php
    return ob_get_clean();
}







 