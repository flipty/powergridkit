<?php
/**
 * Template Name: Partners Page
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * template-partners
 */

get_header();
?>

<div class="container">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <h1><?php echo get_the_title();?></h1>

        <div class="partners-container">
          <div class="partners-content <?php if (!get_field('featured_blurb')) { echo ' no-feature'; }?> ">
            <?php the_content(); ?>
          </div>
          <?php if (get_field('featured_blurb')) {
          $blurb = get_field('featured_blurb');
          $featuredImg = get_post_thumbnail_id($blurb);
          ?>
          <div class="featured-partner">
            <?php echo wp_get_attachment_image($featuredImg, 'full');?>
            <p><?php echo get_the_excerpt($blurb); ?></p>
            <a href="<?php echo get_the_permalink($blurb);?>">Find out more...</a>
          </div>
          <?php } ?>
        </div>

        <?php if (get_field('partners')) { ?>
        <div class="partner-grid">
          <?php
          if (have_rows('partners')):
          while (have_rows('partners')): the_row();
            $logo = get_sub_field('partner_logo');
            $url = get_sub_field('partner_url');
          ?>
          <a href="<?php echo $url;?>" target="_blank">
            <?php echo wp_get_attachment_image($logo, 'full'); ?>
          </a>
          <?php endwhile; endif; ?>
        </div>
      <?php } ?>

      <?php endwhile; ?>

      <?php else : ?>

    <?php endif; ?>

</div>

<?php
 get_footer();
