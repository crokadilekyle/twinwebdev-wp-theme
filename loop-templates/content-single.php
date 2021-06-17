<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<div class="twd-single-post-container">

		<figure class="twd-featured-image">

			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			<?php if(get_post(get_post_thumbnail_id())->post_excerpt) : ?>
			<figcaption><span><?php echo wp_kses(get_post(get_post_thumbnail_id())->post_excerpt, ['a' => ['href' => [] ] ]); ?></span></figcaption>
			<?php endif; ?>

		</figure>

	</div>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php $project_url = get_post_meta($post->ID, 'url', true); 
		
		if ($project_url) { ?>

			<a href="<?php echo $project_url; ?>">Visit Site</a>

		<?php }

		?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
