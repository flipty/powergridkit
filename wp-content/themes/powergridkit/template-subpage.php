<?php
/**
 * Template Name: Subpage Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves2
 * @since Twenty Sixteen 1.0
 * template-subpage
 */

get_header();
?>
<?php
  $intro_image = get_field('intro_image');
  $intro_content = get_field('intro_content');
  $header_override = get_field('intro_header_override');
?>
<div class="subpage">
  <div class="header-image <?php if (get_field('tall')) { echo ' tall'; } ?>">
    <div class="image">
      <?php echo wp_get_attachment_image($intro_image, 'srcset');?>
    </div>
    <div class="content">
      <div class="contained">
        <?php if (!$header_override) { ?><h1><?php the_title(); ?></h1><?php } ?>
        <?php echo $intro_content;?>
      </div>
    </div>
  </div>

  <div class="content-area contained">
      <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>
      		<?php the_content(); // Individual Post Styling ?>
      	<?php endwhile; ?>
      		<?php // Navigation ?>
      	<?php else : ?>
      		<?php // No Posts Found ?>
      <?php endif; ?>
  </div>

</div>

<?php
get_footer();
