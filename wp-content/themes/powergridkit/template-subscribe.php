<?php
/**
 * Template Name: Subscribe Page
 *
 * @package WordPress
 * @subpackage behavioralgrooves2
 * @since Twenty Sixteen 1.0
 * template-subscribe
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
          <?php
          if (have_rows('services')):
            ?>
            <div class="services">
            <?php
              while (have_rows('services')): the_row();
                  $name = get_sub_field('service');
                  $logo = get_sub_field('logo');
                  $url = get_sub_field('url');
                  $color = get_sub_field('text_color');
                  $show_text = get_sub_field('show_text');
              ?>
              <div class="item">
                  <div class="inner">
                    <a href="<?php echo $url;?>" target="_blank">
                        <?php if ($logo) { ?>
                          <div class="image">
                            <?php echo wp_get_attachment_image($logo, 'srcset'); ?>
                          </div>
                        <?php } ?>
                        <?php if ($show_text) { ?>
                        <div class="content">
                            <h4 style="color: <?php echo $color;?>;"><?php echo $name; ?></h4>
                        </div>
                        <?php } ?>
                        </a>
                      </div>
              </div>

              <?php endwhile; ?>
            </div>
          <?php endif; //end ACF loop?>

      	<?php endwhile; ?>
      		<?php // Navigation ?>
      	<?php else : ?>
      		<?php // No Posts Found ?>
      <?php endif; ?>
  </div>

  <?php if (get_field('extra_content')) { ?>
  <div class="extra-content" style="background-image: url('<?php echo  wp_get_attachment_url(get_field('extra_content_image'))?>');">
    <div class="contained">
      <?php the_field('extra_content');?>
    </div>
  </div>
  <?php } ?>

  <div class="content-area contained">
    <?php the_content(); // Individual Post Styling ?>
    <div class="patreon-button">
      <a href="https://www.patreon.com/behavioralgrooves" target="_blank">BECOME A PATREON HERE</a>
    </div>
  </div>


</div>

<?php
get_footer();
