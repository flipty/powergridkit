<?php
/**
 * Template Name: Insights Template
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>

    <?php

    $queryNL = new WP_Query( array(
      'post_type' => 'newsletter',
      'posts_per_page' => 6,
      'order' => 'DESC'
    ) );

    $queryBP = new WP_Query( array(
      'post_type' => 'blogentry',
      'posts_per_page' => 6,
      'order' => 'DESC',
      //ignore blog posts that are not bonus tracks - this may require re-saving legacy blog posts initially to set the value
      'meta_query' => array(
          array(
              'key'       => 'bonus_track',
              'value'     => 0,
              'compare'   => 'LIKE'
          )
        )
    ) );

    //query for bonus tracks (this ID as value of related_episode field)
    $queryBT = new WP_Query( array(
      'post_type' => 'blogentry',
      'posts_per_page' => 6,
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

        <!-- <h1 class="contained"><?php the_title();?></h1> -->

        <div class="content-area">

          <section class="recent-blogs">
            <div class="contained">
              <h2>RECENT BLOGS</h2>
              <div class="owl-carousel insight-carousel insight-carousel-blogs">
              <?php
              if ( $queryBP->have_posts() ) :
              while ( $queryBP->have_posts() ) : $queryBP->the_post();
              ?>

              <div class="item">
                  <a href="<?php echo get_the_permalink(); ?>">
                      <!-- <h4><?php echo get_the_date(); ?></h4> -->
                      <h3><?php the_title(); ?></h3>
                      <?php the_excerpt(); ?>
                  </a>
              </div>

              <?php
              endwhile; wp_reset_postdata();
              endif;
              ?>
              </div>
              <div class="archive">
                <a href="/blog/">CLICK HERE TO ACCESS THE ENTIRE BLOG ARCHIVE</a>
              </div>
            </div>
          </section>

          <section class="bonus-tracks">
            <div class="contained">

              <h2>FEATURED BONUS TRACKS</h2>
              <div class="owl-carousel insight-carousel insight-carousel-bonus">
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
                endif;
                ?>
              </div>
              <div class="archive">
                <a href="/bonus-tracks/">CLICK HERE TO ACCESS THE ENTIRE BONUS TRACK ARCHIVE</a>
              </div>

            </div>
          </section>

          <section class="recent-newsletters">
            <div class="contained">

              <h2>RECENT NEWSLETTERS</h2>
              <div class="owl-carousel insight-carousel insight-carousel-newsletters">
              <?php
              if ( $queryNL->have_posts() ) :
              while ( $queryNL->have_posts() ) : $queryNL->the_post();
              ?>

              <div class="item">
                  <a href="<?php echo get_the_permalink(); ?>">
                      <!-- <h4><?php echo get_the_date(); ?></h4> -->
                      <h3><?php the_title(); ?></h3>
                      <?php the_excerpt(); ?>
                  </a>
              </div>

              <?php
              endwhile; wp_reset_postdata();
              endif;
              ?>
              </div>
              <div class="archive">
                <a href="/newsletter/">CLICK HERE TO ACCESS THE ENTIRE NEWSLETTER ARCHIVE</a>
              </div>

            </div>
          </section>

          <section class="newsletter-subscribe">
            <div class="contained">
              <div class="newsletter-widget">
                <label for="EMAIL">Enter your email to stay up to date with episodes, news, and more</label>
                <div class="email-form">
                  <?php echo do_shortcode('[mc4wp_form id="421"]'); ?>
                </div>
              </div>
            </div>
          </section>

          <section class="glossary-intro">
            <div class="contained">
              <h2>GLOSSARY OF BEHAVIORAL SCIENCE TERMS</h2>
              <?php echo get_field('glossary_intro_content');?>
            </div>
          </section>

        </div>
        <?php
    	endwhile; // End the loop.
        ?>
    </div>
<?php
 get_footer();
