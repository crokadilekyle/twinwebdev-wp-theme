<?php
/**
 * Services section for front page
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="twd-services container">
    <h3>Services</h3>
    <div class="services">
            
        <?php 
        // $services = wp_get_recent_posts([
        // 	'numberposts' => 2,
        // 	'post_status' => 'publish',
        // 	'post_type' => 'services'
        // ]);
        
        $query_args = [
            "order" => "asc",
            "post_type" => "services",
        ];

        $services_query = new WP_Query($query_args);

        if ( $services_query->have_posts() ) : ?>

            <?php /* Start the Loop */ ?>

            <?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>

                <?php

                /*
                * Include the Post-Format-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                */
                get_template_part( 'loop-templates/content', get_post_format() );
                ?>

            <?php endwhile; ?>

            
            <?php else : ?>
                
                <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                    
            <?php endif; ?>
                    
            <?php wp_reset_postdata(); ?>

    </div>
</section>