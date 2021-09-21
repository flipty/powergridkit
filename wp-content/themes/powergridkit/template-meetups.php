<?php
/**
 * Template Name: Meetups Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves2
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>
<?php
  $intro_image = get_field('intro_image');
  $intro_content = get_field('intro_content');
  $header_override = get_field('intro_header_override');
?>
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


    <?php

    $query = new WP_Query( array(
        'post_type' => 'meetup_events',
        'posts_per_page' => -1,
        'order' => 'DESC'
    ) );

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    ?>

    <div class="contained ">

    <?php echo do_shortcode('[meetup_events posts_per_page="99"]');?>

    <?php
    if ( $query->have_posts() ) :
    ?>
    <div class="events">
    <?php
    while ( $query->have_posts() ) : $query->the_post();
    ?>
<!--
    <div class="event">
        <a href="<?php echo get_the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
        <?php the_content();?>
        </a>
    </div>
-->
    <?php
    //increment the count backwards - for the 'unofficial' episode number
    endwhile; wp_reset_postdata();
    ?>
    </div>
    <?php
    // pagination here
    else :
    // 404 error here
    endif;
    ?>
    </div>

    <?php
	endwhile; // End the loop.

 get_footer();
