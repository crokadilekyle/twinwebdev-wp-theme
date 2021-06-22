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
    <div class="twd-testimonial-slider">

    <?php 

        $query_args = [
            "post_type" => "twd_testimonial",
        ];

        
        $testimonial_query = new WP_Query($query_args);
        
        

        if ( $testimonial_query->have_posts() ) : ?>

            <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
            <?php            
                $class = '';

                if ($testimonial_query->current_post == 0){
                    $class = 'active';
                }
            ?>
            
                <?php get_template_part( 'loop-templates/content', 'testimonial', ['class' => $class] ); ?>

            <?php endwhile; ?>
            
            <?php else : ?>
                
                <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                
        <?php endif; ?>

        
    </div>
    <div class="twd-carousel-nav">
        <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
        <?php
        $class = '';

                if ($testimonial_query->current_post == 0){
                    $class = 'active';
                }
        ?>
        <span class="carousel-link <?php echo $class;?>" id="<?php the_ID(); ?>"></span>
        <?php endwhile; ?>
    </div>
            
    <?php wp_reset_postdata(); ?>
</section>

<script>
    const slide_links = Array.from(document.getElementsByClassName('carousel-link'));
    const testimonials = Array.from(document.getElementsByClassName('twd-testimonial'));

    function testLoop(arr){
        let counter = 0;
        // Sets up timer to cycle through testimonials
        setInterval(function timer(){
            arr[counter].classList.remove('active');
            if (counter < arr.length - 1){
                arr[counter + 1].classList.add('active');
                let id = arr[counter + 1].getAttribute('id').slice(5);
                for (link in slide_links){
                    slide_links[link].classList.remove('active');
                }
                let bubble = document.getElementById(id);
                bubble.classList.add('active');
                counter++;
            } else {
                arr[0].classList.add('active');
                counter = 0;
                for (link in slide_links){
                    slide_links[link].classList.remove('active');
                }
                slide_links[0].classList.add('active');

            }
        },10000);
    }
    
        testLoop(testimonials);


        // Sets correct testimonial when clicking on nav link
        slide_links.forEach(function(link, i, links){
            link.addEventListener('click', function(e){

                const selected = e.target.getAttribute('id');

                for( const link in links) {
                    links[link].classList.remove('active');
                }

                for (const testimonial in testimonials) {
                    testimonials[testimonial].classList.remove('active');
                }

                e.target.classList.add('active');

                for (const testimonial in testimonials) {
                    let id = testimonials[testimonial].getAttribute('id');
                    if (id == "post-"+selected){
                        testimonials[testimonial].classList.add('active');
                    }

                }

            });
        });




</script>