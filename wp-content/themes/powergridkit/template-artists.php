<?php
/**
 * Template Name: All Artists Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves
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

    <?php

    $query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'order' => 'DESC'
    ) );

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    ?>

    <div class="contained grid-container-artists">
    <?php
    if ( $query->have_posts() ) :

    while ( $query->have_posts() ) : $query->the_post();
    ?>

    <?php if ( have_rows('featured_artist') ): ?>
      <div class="episode">
        <h3><a href="<?php echo get_the_permalink();?>"><?php the_title(); ?></a></h3>
        <?php while ( have_rows('featured_artist') ) : the_row(); ?>
            <p>
                <a href="
                <?php
                if ( get_sub_field('link') ) { the_sub_field('link'); }
                if ( ! get_sub_field('link') ) { echo 'https://google.com/search?q='; echo(get_sub_field('artist_name')); echo ' music'; }
                ?>" target="_blank">
                    <?php the_sub_field('artist_name'); ?>
                </a>
            </p>

        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php
    //increment the count backwards - for the 'unofficial' episode number
    endwhile; wp_reset_postdata();

    // pagination here
    else :
    // 404 error here
    endif;
    ?>

    </div>


    <?php
	endwhile; // End the loop.

 get_footer();
