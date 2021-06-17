<?php
/**
 * Single post partial template
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if(get_post_type() === 'post') :?>
    <div class="twitter-comments" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/2021 Twitter logo - blue.png')">
        <h3>Questions? Comments?</h3>
        <p>Let's continue the conversation!</p>

        <?php 
            $hashtag = null;

            if( get_post_custom_values('hashtag') ) {
                $hashtag = esc_html( get_post_custom_values('hashtag')[0] );
            }  
        ?>

        <p>Tweet me <span class="twitter-handle">@twinwebdev</span> #<?php echo( $hashtag ? $hashtag : esc_html($post->post_name));?></p>
    </div>
<?php endif; ?>