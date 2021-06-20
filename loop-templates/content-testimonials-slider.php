<?php
/**
 * For displaying testimonails slider - post type is twd_testimonial
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="twd-testimonials">
    <h2>Testimonials</h2>

    <?php 

        $query_args = [
            "post_type" => "twd_testimonial",
        ];

        $testimonial_query = new WP_Query($query_args);
        // var_dump($testimonial_query);

        if ( $testimonial_query->have_posts() ) : ?>

            <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>

                <?php get_template_part( 'loop-templates/content', 'testimonial' ); ?>

            <?php endwhile; ?>
            
            <?php else : ?>
                
                <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                
        <?php endif; ?>
                
        <?php wp_reset_postdata(); ?>

    <div class="twd-carousel-nav"></div>
</section>