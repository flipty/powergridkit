<?php
/**
 * Template Name: All Blog Posts Template
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>

    <?php

    $query = new WP_Query( array(
        'post_type' => 'blogentry',
        'posts_per_page' => -1,
        'order' => 'DESC'
    ) );

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    ?>

    <div class="container">

        <h1><?php echo get_the_title();?></h1>

        <div class="content-area">
            <div class="blog-posts">
            <?php
            if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
            ?>

            <div class="blogentry">
                <a href="<?php echo get_the_permalink(); ?>">
                    <h4><?php echo get_the_date(); ?></h4>
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                </a>
            </div>

            <?php
            endwhile; wp_reset_postdata();
            // pagination here
            else :
            // 404 error here
            endif;
            ?>
            </div>
        </div>
        <?php
    	endwhile; // End the loop.
        ?>
    </div>
<?php
 get_footer();
