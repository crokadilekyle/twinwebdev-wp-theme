<?php

function twinwebdev_theme_register_testimonials() {
    register_post_type('twd_testimonial', [
        'labels' => [
            'name'      => __('Testimonials', 'twinwebdev'),
            'singular'  =>__('Testimonial', 'twinwebdev')
        ],
        'description'   => "Customer Testimonials, Reviews, and Kind Words",
        'public'        => true,
        'show_in_rest'  => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-testimonial',
        'rewrite'       =>[ 'slug' => 'twdtestimonials' ],
        'supports'      =>[ 'title', 'editor', 'thumbnail' ],
        
    ]);
}

add_action('init', 'twinwebdev_theme_register_testimonials');