<?php
defined("ABSPATH") || exit();


add_action('admin_menu', 'ecocoded_themepage');
function ecocoded_themepage()
{
    add_menu_page(__('Theme Settings', 'ecocoded'), __('Theme Settings', 'ecocoded'), 'manage_options', 'ecocoded_themepage', 'ecocoded_themepage_content', get_template_directory_uri() . '/inc/info_content/themepage/src/wp-icon-superb.svg', 61);
}

function ecocoded_themepage_content()
{
    require_once(trailingslashit(get_template_directory()) . 'inc/info_content/themepage/src/themepage.php');
}

function ecocoded_comparepage_css($hook)
{
    if ('toplevel_page_ecocoded_themepage' != $hook) {
        return;
    }
    wp_enqueue_style('ecocoded-custom-style', get_template_directory_uri() . '/inc/info_content/themepage/src/compare.css');
}
add_action('admin_enqueue_scripts', 'ecocoded_comparepage_css');

// Theme page end
