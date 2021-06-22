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
                    <h3>My Developer Toolbelt</h3>
                    <ul class="twd-dev-tools">
                        <?php 
                        
                        $twd_dev_tools = array(
                            array('tool' => 'PHP', 'fa-class' => 'fab fa-2x fa-php'),
                            array('tool' => 'Python', 'fa-class' => 'fab fa-2x fa-python'),
                            array('tool' => 'Javascript', 'fa-class' => 'fab fa-2x fa-js-square'),
                            array('tool' => 'HTML', 'fa-class' => 'fab fa-2x fa-html5'),
                            array('tool' => 'CSS', 'fa-class' => 'fab fa-2x fa-css3-alt'),
                            array('tool' => 'Laravel', 'fa-class' => 'fab fa-2x fa-laravel'),
                            array('tool' => 'React JS', 'fa-class' => 'fab fa-2x fa-react'),
                            array('tool' => 'Vue JS', 'fa-class' => 'fab fa-2x fa-vuejs'),
                            array('tool' => 'WordPress', 'fa-class' => 'fab fa-2x fa-wordpress'),
                            array('tool' => 'Bootstrap', 'fa-class' => 'fab fa-2x fa-bootstrap'),
                            array('tool' => 'Tailwind CSS', 'fa-class' => ''),
                            array('tool' => 'GIT and Github', 'fa-class' => 'fab fa-2x fa-github'),
                            array('tool' => 'NPM', 'fa-class' => 'fab fa-2x fa-npm'),
                            array('tool' => 'Composer', 'fa-class' => ''),
                            array('tool' => 'Docker', 'fa-class' => 'fab fa-2x fa-docker'),
                            array('tool' => 'Adobe CC', 'fa-class' => ''),
                            array('tool' => 'Office 365', 'fa-class' => 'fab fa-2x fa-microsoft'),
                            array('tool' => 'Elementor', 'fa-class' => 'fab fa-2x fa-elementor'),
                        );
                        

                        foreach($twd_dev_tools as $tool) :
                        ?>
                            <li class="twd-dev-tool">
                                <i class="<?php echo $tool['fa-class']; ?>"></i>
                                <?php echo $tool['tool']; ?>
                            </li>
                        <?php
                        endforeach;
                        ?>

                    </ul>
                </section>

			</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer();