<?php
get_header();
?>

<main>

  <section class="intro">
    <div class="container">
      <div class="intro-content">
        <div class="content">
          <?php the_field('intro_content');?>
          <div class="buy">
            <a href="/buy"><span>BUY THE KIT</span><img src="/wp-content/themes/powergridkit/img/cart.svg" alt=""></a>
          </div>
        </div>
        <div class="image">
          <?php
          $image = get_field('intro_image');
          echo wp_get_attachment_image($image, 'srcset');
          ?>
        </div>
      </div>
      <div class="traces">
        <div class="dot"></div>
        <div class="trace1"></div>
        <div class="trace2"></div>
        <div class="trace3"></div>
      </div>

    </div>
  </section>

  <section class="video-news">
    <div class="traces">
      <div class="traceL1"></div>
      <div class="traceL2"></div>
    </div>
    <div class="container">
      <div class="video">
        <div class="embed-container">
          <?php the_field('home_video'); ?>
        </div>
      </div>
      <div class="learnmore">
        <div class="traces">
          <div class="trace1"></div>
          <div class="dot"></div>
        </div>
        <div class="buy <?php if (!get_field('more_info_button_link')){echo 'no-button';}?>">
          <?php if (get_field('more_info_button_link')){?>
          <a href="<?php echo get_field('more_info_button_link');?>"><?php echo get_field('more_info_button_text');?></a>
          <?php } ?>
        </div>
      </div>
      <?php if (have_rows('home_news_stories')): ?>
      <div class="news">
        <h2>Power Grid Kit News & Updates</h2>
        <div class="featured-posts">
          <?php while (have_rows('home_news_stories')): the_row();
          $newsPost = get_sub_field('story');
          ?>
          <div class="single-post">
              <a href="<?php echo get_the_permalink($newsPost); ?>">
                  <h3><?php echo get_the_title($newsPost); ?></h3>
                  <div class="image">
                    <?php echo get_the_post_thumbnail($newsPost, 'large');?>
                  </div>
              </a>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
    <div class="traces">
      <div class="traceR1"></div>
      <div class="traceR2"></div>
    </div>
  </section>

</main>

<?php
get_footer();
?>
