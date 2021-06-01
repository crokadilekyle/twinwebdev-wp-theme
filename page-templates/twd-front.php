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

				<section class="twd-latest-posts container">
					<div class="latest-blog">
						<article> <!-- latest blog post -->
							<h3>Latest Blog Post</h3>

							<?php 
							$latest_post = wp_get_recent_posts([
								'numberposts' => 1,
								'post_status' => 'publish'
							]);
							$post_query = new WP_Query($latest_post[0]['ID']);
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
				<div class="divider triangle"></div>
				
				<article class="twd-about">
					<div class="container">
						<section class="profile-pic">
							<img src="<?php echo get_template_directory_uri(); ?>/img/kyle-duotone-blue.png" />
						</section>
						<section >
							<h2>
								Hello.  I'm Kyle.</br>
								Full Stack Web Developer.</br>
								Waco, TX
							</h2>
							<a class="btn btn-primary about" href="/about">Learn More</a>
						</section>
					</div>
				</article>
				
				<div class="divider triangle purple"></div>

				<!-- <article class="twd-services container"	> -->
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
				<!-- </article> -->

			</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer();
