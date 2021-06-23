<?php
/**
 * About section for front page
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="divider triangle"></div>
    
<article class="twd-about">
    <div class="container">
        <section class="profile-pic animate">
            <img src="<?php echo get_template_directory_uri(); ?>/img/kyle-duotone-blue.png" />
        </section>
        <section class="animate">
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