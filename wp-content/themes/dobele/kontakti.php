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
<?php get_template_part( 'partials/googlemap'); ?>
<?php get_template_part( 'partials/contact-us'); ?>


<?php get_footer(); ?>