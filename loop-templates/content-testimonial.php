<?php
/**
 * For displaying testimonails - post type is twd_testimonial
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article <?php post_class(['twd-testimonial', $args['class']]); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">

    <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', [ 'class' => 'aligncenter'] ); ?>

    	<?php the_content(); ?>

    <?php
    the_title(
        sprintf( '<p class="twd-testimonial-author">', esc_html( get_the_title() ) ),
        '</p>'
    );
    ?>

	</div>

</article>
