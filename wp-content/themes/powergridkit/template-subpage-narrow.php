<?php
/**
 * Template Name: Subpage Template (Narrow)
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * template-subpage
 */

get_header();
?>

  <div class="container narrow">

      <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>
          <h1><?php echo get_the_title();?></h1>
          <?php the_content(); ?>

      	<?php endwhile; ?>

      	<?php else : ?>

      <?php endif; ?>

  </div>

<?php
get_footer();
