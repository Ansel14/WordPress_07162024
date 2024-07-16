<?php
function theblog_assets(){
    wp_enqueue_style('theblog-style', get_template_directory_uri() . "/css/style.css", microtime());
    wp_enqueue_style('theblog-icons', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css", 1.0);
    wp_enqueue_script('theblog-script', get_template_directory_uri() . "/script/app.js", microtime(), [], true );
}
add_action('wp_enqueue_scripts', 'theblog_assets');

function theblog_theme_support() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theblog_theme_support');