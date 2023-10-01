<?php
function load_styles()
{
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/plugins/css/bootstrap.min.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/plugins/css/owl.carousel.min.css');
    wp_enqueue_style('owl-default', get_template_directory_uri() . '/plugins/css/owl.theme.default.min.css');
}
add_action('wp_enqueue_scripts', 'load_styles');


function load_scripts()
{
    wp_enqueue_script('jquery', get_template_directory_uri() .  '/plugins/js/jquery-3.7.1.min.js', array(), null, true);
    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri() . '/plugins/js/bootstrap.bundle.min.js',
        array(),
        null,
        true
    );
    wp_enqueue_script(
        'owl-carousel',
        get_template_directory_uri() . '/plugins/js/owl.carousel.min.js',
    );
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'load_scripts');


add_theme_support('post-thumbnails');

// Enable SVG Support in WordPress
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');


add_theme_support('title-tag');
add_theme_support('custom-logo');

function add_nav_menus()
{
    register_nav_menus(array(
        'nav menu' => 'Navigation Bar',
    ));
}
add_action('init', 'add_nav_menus');


function coder_extend_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'coder_extend_excerpt_length');

function handle_custom_form_submission()
{
    if (defined('DOING_AJAX') && DOING_AJAX) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = 'contact@arabicquran.academy';
        $subject = 'أكاديمية قرأن عربي';
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $message = "الاسم: $name<br>البريد الإلكتروني: $email<br>الرسالة: $message";

        wp_mail($to, $subject, $message, $headers);

        echo 'success';

        wp_die();
    }
}

// Hook the form submission handler
add_action('wp_ajax_custom_form_submission', 'handle_custom_form_submission');
add_action('wp_ajax_nopriv_custom_form_submission', 'handle_custom_form_submission');
