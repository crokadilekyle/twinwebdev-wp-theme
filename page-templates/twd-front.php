<?php
/**
 * Template Name: Twin Web Dev Front
 *
 * Twin Web Dev front page template
 *
 * @package understrap
 */



// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

get_template_part( 'global-templates/hero' );

?>
<header class="twd-front-page-header">
	<div class="<?php echo esc_attr( $container ); ?>">
		<h1><?php echo(esc_html(get_bloginfo('name'))); ?></h1>
		<h2><?php echo(esc_html(get_bloginfo('description'))); ?></h2>
	</div>
</header>

<div class="wrapper" id="page-wrapper">

			<main class="site-main" id="main">

				<?php get_template_part('loop-templates/content', 'latest'); ?>

				<?php get_template_part('loop-templates/content', 'frontpage-about'); ?>
				
				<?php get_template_part('loop-templates/content', 'frontpage-services'); ?>

			</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer();
