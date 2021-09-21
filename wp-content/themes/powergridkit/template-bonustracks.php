<?php
/**
 * Template Name: Bonus Tracks Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>

    <?php

    //query for bonus tracks (this ID as value of related_episode field)
    $queryBT = new WP_Query( array(
      'post_type' => 'blogentry',
      'posts_per_page' => -1,
      'order' => 'DESC',
      //posts that are bonus tracks
      'meta_query' => array(
          array(
              'key'       => 'bonus_track',
              'value'     => 1,
              'compare'   => 'LIKE'
          )
        )
      ) );

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    ?>

    <div class="subpage">

        <h1 class="contained"><?php the_title();?></h1>

        <div class="content-area">

          <section class="bonus-tracks">
            <div class="contained">
                <div class="grid-container-bonustracks">

                <?php

                if ( $queryBT->have_posts() ) :
                while ( $queryBT->have_posts() ) : $queryBT->the_post();
                $episode = get_field('related_episode');
                if( function_exists('powerpress_get_enclosure_data') ) {
            		   $EpisodeData = powerpress_get_enclosure_data( $episode );
            		}
                ?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <img loading="lazy" src="<?php echo($EpisodeData['itunes_image']); ?>" alt="">
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt(); ?>
                    </a>
                  <span>bonus track from "<a href="<?php echo get_the_permalink($episode);?>"><?php echo get_the_title($episode);?></a>"</span>
                </div>
                <?php
                endwhile; wp_reset_postdata();
                ?>
              </div>

            <?php endif; ?>

            </div>
          </section>


        </div>
        <?php
    	endwhile; // End the loop.
        ?>
    </div>
<?php
 get_footer();
