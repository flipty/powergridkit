<?php
get_header();
?>
    <div class="home-content">

        <section class="hero">
          <div class="overlay"></div>
          <video id="videoBG" poster="<?php echo get_template_directory_uri(); ?>/img/landing.jpg" autoplay muted loop>
            <source src="<?php echo get_template_directory_uri(); ?>/img/landing.mp4" type="video/mp4">
          </video>
          <div class="contained">
            <div class="intro">
              <div class="content">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white-green.png" alt="Behavioral Grooves">
                <h1><?php the_field('headline');?></h1>
              </div>
            </div>
          </div>
        </section>

        <section class="current-episode">
          <div class="contained">
          <?php
          $query = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page' => -1, //query all so that it can count
              'order' => 'DESC'
          ));
          /* Start the Loop */
          while (have_posts()) : the_post(); //this is to get the post object

          if ($query->have_posts()) :
          //count the posts
          $count = $query->post_count;
          $thisCount = $count;
          while ($query->have_posts()) : $query->the_post();
              //get metadata from associated podcast
              if (function_exists('powerpress_get_enclosure_data')) {
                  $EpisodeData = powerpress_get_enclosure_data(get_the_ID());
                  $episodeNumber = $EpisodeData['episode_no'];
              }
              //if is the first of the query
              if (0 == $query->current_post) {
                  ?>

          <div <?php post_class('episode'); ?>>
              <div class="image">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo($EpisodeData['itunes_image']); ?>" alt="Behavioral Grooves Feature">
                  </a>
              </div>
              <div class="content">
                <h2>MOST RECENT EPISODE - LISTEN NOW!</h2>
                <h4><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php echo do_shortcode('[powerpress]'); ?>
              </div>
          </div>

          <?php
              } else {/*do nothing if not the first in the query, we really just got them all for the episode count*/
              }

          //increment the count backwards - to get the 'unofficial' episode number
          $count--;

          endwhile; wp_reset_postdata();
          // pagination here
          else :
          // 404 error here
          endif;
          ?>
          <?php
        endwhile; // End the loop.
          ?>
          </div>

        </section>

        <section class="episodes">
            <div class="contained">

                <h2>RECENT EPISODES</h2>

                <div class="owl-carousel episode-carousel">
                <?php
                    $carouselQuery = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,//have to get them all to count the episodes
                        'order' => 'DESC'
                    ));
                    $carouselCount = $carouselQuery->post_count - 1;
                    /* Start the Loop */
                    while (have_posts()) : the_post(); //this is to get the post object
                    if ($carouselQuery->have_posts()) :
                    while ($carouselQuery->have_posts()) : $carouselQuery->the_post();
                    //get metadata from associated podcast
                    if (function_exists('powerpress_get_enclosure_data')) {
                        $EpisodeData = powerpress_get_enclosure_data(get_the_ID());

                    }
                    //get current count (no offset because we need the full post count)
                    $current = $carouselQuery->current_post;
                    //only do if the post is in our range -- echo value -1 in the count because of the offset (not showing the most recent).
                    if ($current >= 1 && $current <= 6) {
                        ?>
                    <div class="item">
                        <div class="inner">
                            <div class="image">
                                <a href="<?php echo get_the_permalink($episode); ?>"><img src="<?php echo($EpisodeData['itunes_image']); ?>" alt="Behavioral Grooves Feature"></a>
                            </div>
                            <div class="content">
                              <a href="<?php echo get_the_permalink($episode); ?>">
                              <h5>EPISODE <?php echo $carouselCount; ?></h5>
                              <h4><?php echo get_the_title($episode); ?></h4>
                              <?php the_excerpt(); ?>
                              </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $carouselCount--;
                    }//query amount if
                    endwhile; wp_reset_postdata();
                    // pagination here
                    else :
                    // 404 error here
                    endif;
                    ?>
                  </div>
                <?php
                    endwhile; // End the loop.
                ?>
        </section>

        <section class="about">
          <div class="contained">
            <?php the_field('about_content');?>
          </div>
        </section>

        <?php
        //the ACF way...if admin decides to use featured posts instead of chronological
        if (have_rows('carousel_items')):
        ?>
        <section class="episodes featured">
            <div class="contained">

                    <h2>FEATURED EPISODES</h2>
                    <div class="owl-carousel episode-carousel">
                    <?php while (have_rows('carousel_items')): the_row();
                        $episode = get_sub_field('episode');
                        if (function_exists('powerpress_get_enclosure_data')) {
                            $EpisodeData = powerpress_get_enclosure_data($episode);
                        }
                    ?>
                    <div class="item">
                        <div class="inner">
                            <div class="image">
                                <a href="<?php echo get_the_permalink($episode); ?>"><img src="<?php echo($EpisodeData['itunes_image']); ?>" alt="Behavioral Grooves Feature"></a>
                            </div>
                            <div class="content">
                              <a href="<?php echo get_the_permalink($episode); ?>"><h4><?php echo get_the_title($episode); ?></h4>
                              <?php echo get_the_excerpt($episode); ?>
                              </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                  </div>

        </section>
        <?php endif; //end ACF way?>


        <section class="newsletter-signup">
          <div class="contained">
            <div class="newsletter-widget">
              <label for="EMAIL">Enter your email to stay up to date with episodes, news, and more</label>
              <div class="email-form">
                <?php echo do_shortcode('[mc4wp_form id="421"]'); ?>
              </div>

            </div>
          </div>
        </section>

        <section class="video">
          <div class="contained">
            <?php the_field('home_video');?>
          </div>
        </section>

        <section class="patreon">
          <div class="contained">
            <a href="https://www.patreon.com/behavioralgrooves" target="_blank">SHOW YOUR SUPPORT - CLICK HERE TO BECOME A PATREON</a>
          </div>
        </section>

        <section class="reviews">
            <div class="contained">
              <?php the_field('reviews_headline');?>
                <div class="review-container">
                  <div class="owl-carousel review-carousel">
                  <?php
                  if (have_rows('reviews')):
                      while (have_rows('reviews')): the_row();
                      ?>
                      <div class="item">
                        <div class="review">
                            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/stars.png" alt="five stars">
                            <h3><?php the_sub_field('review_headline'); ?></h3>
                            <p><?php the_sub_field('review_text'); ?></p>
                        </div>
                      </div>
                  <?php endwhile;
                  endif; ?>
                  </div>
                </div>
                <?php the_field('reviews_content');?>
            </div>
        </section>

        <?php if (have_rows('featured_products')):
          $count = count(get_field('featured_products'));
        ?>

        <section class="products">
          <h2>FEATURED PRODUCT<?php if ($count >= 2 ) { echo 'S'; }?></h2>
          <div class="contained">
            <div class="product-container">
              <?php while (have_rows('featured_products')): the_row();
                  $img = get_sub_field('image');
                  $href = get_sub_field('link');
              ?>
                <div class="item">
                  <a href="<?php echo $href;?>">
                    <?php echo wp_get_attachment_image($img, 'srcset'); ?>
                  </a>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </section>
        <?php endif; ?>

        <section class="consulting">
          <div class="contained">
            <?php the_field('consulting_content');?>
            <div class="consultants">
              <div class="consultant kurt">
                <div class="image">
                  <a href="https://bookme.name/behavioralgrooves" target="_blank">
                  <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/kurt-headshot.jpg" alt="Kurt Nelson">
                  </a>
                </div>
                <div class="content">
                  <a href="https://bookme.name/behavioralgrooves" target="_blank">
                  <h3>BOOK<br> AN HOUR WITH KURT</h3>
                  <h4>EXPERTISE: MOTIVATION, BEHAVIOR CHANGE, INCENTIVES, EMPLOYEE ENGAGEMENT</h4>
                  <h5>$425/hr</h5>
                  </a>
                </div>
              </div>
              <div class="consultant tim">
                <div class="image">
                  <a href="https://bookme.name/behavioralgrooves" target="_blank">
                  <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/img/tim-headshot.jpg" alt="Tim Houlihan">
                  </a>
                </div>
                <div class="content">
                  <a href="https://bookme.name/behavioralgrooves" target="_blank">
                  <h3>BOOK<br> AN HOUR WITH TIM</h3>
                  <h4>EXPERTISE: TEAM EFFECTIVENESS, RETENTION, SALES EFFECTIVENESS CUSTOMER EXPERIENCE</h4>
                  <h5>$425/hr</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>

    </div>

<?php
get_footer();
?>
