<?php
/**
 * Latest Post and Project partial template
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="twd-latest-posts container">
    <div class="latest-blog">
        <article> <!-- latest blog post -->
            <h3>Latest Blog Post</h3>

            <?php 
            $latest_post = wp_get_recent_posts([
                'numberposts' => 1,
                'post_status' => 'publish'
            ]);

            $post_query_args = ["p" => $latest_post[0]["ID"]];

        
            $post_query = new WP_Query($post_query_args);

            if ( $post_query->have_posts() ) : ?>

                <?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

                    <?php get_template_part( 'loop-templates/content', get_post_format() );	?>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>

                <?php get_template_part( 'loop-templates/content', 'none' ); ?>

            <?php endif; ?>
            <?php wp_reset_query(); ?>

        </article><!-- latest-post -->
    </div>
    <div class="lastest-project">
        <article><!-- latest project post-->
            <h3>Latest Project</h3>
            
            <?php 
            $latest_project = wp_get_recent_posts([
                'numberposts' => 1,
                'post_status' => 'publish',
                'post_type' => 'projects'
            ]);
            
            $query_args = [
                "p" => $latest_project[0]["ID"],
                "post_type" => "projects",
            ];

            $project_query = new WP_Query($query_args);

            if ( $project_query->have_posts() ) : ?>

                <?php /* Start the Loop */ ?>

                <?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>

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
        </article><!-- latest-post -->


    </div>
</section>
