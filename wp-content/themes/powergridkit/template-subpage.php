<?php
/**
 * Template Name: Subpage Template
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * template-subpage
 */

get_header();
?>

      <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>

          <?php the_content(); // Individual Post Styling ?>

      	<?php endwhile; ?>

      	<?php else : ?>
      		
      <?php endif; ?>


<?php
get_footer();
