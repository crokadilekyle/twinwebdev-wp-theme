<?php
/**
 * Template Name: Twin Web Dev About
 *
 * Twin Web Dev About page template
 *
 * @package understrap
 */



// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

get_template_part( 'global-templates/hero' );

?>

<div class="wrapper" id="page-wrapper">

			<main class="site-main" id="main">

                <?php get_template_part('loop-templates/content', 'about'); ?>
                
                <?php get_template_part('loop-templates/content', 'testimonials-slider'); ?>

                

                <section class="twd-toolbelt">
                    <h3>My Develop Toolbelt</h3>
                    <ul class="twd-dev-tools"></ul>
                </section>

			</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer();