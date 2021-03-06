<?php
/*
 * Template Name: Kontakti
 * Description: Kontaktu lapa
 */

get_header(); ?>

                 
<?php
while ( have_posts() ) : the_post();

    
    the_content();
    // If comments are open or we have at least one comment, load up the comment template.

endwhile; // End of the loop.
?>

<div class="second-section section">
    <div class="section-content">
        <div class="row">
            <?php get_template_part( 'partials/team'); ?>
            <?php get_template_part( 'partials/contact-details'); ?>
        </div>
    </div>
</div>
<?php do_shortcode("[google_map id='111']"); ?>
<?php get_template_part( 'partials/contact-us'); ?>


<?php get_footer(); ?>