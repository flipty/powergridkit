<?php
/**
 * Template Name: About Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves2
 * @since Twenty Sixteen 1.0
 * template-about
 */

get_header();
?>
<?php
  $intro_image = get_field('intro_image');
  $intro_content = get_field('intro_content');
  $header_override = get_field('intro_header_override');
?>
<div class="header-image">
  <div class="image">
    <?php echo wp_get_attachment_image($intro_image, 'srcset');?>
  </div>
  <div class="content">
    <div class="contained">
      <?php echo $intro_content;?>
    </div>
  </div>
</div>

<div class="content-area contained">
  <?php if (have_posts()) : ?>
  	<?php while (have_posts()) : the_post(); ?>

      <section class="intro">
        <h2>THE BEHAVIORAL GROOVES STORY</h2>
        <div class="more-info">
          <?php the_content();?>
          <a href="#" class="readmore readmore-top"><span>READ MORE</span></a>
        </div>
      </section>

      <section class="bios">
        <h2>WHO WE ARE</h2>

        <div class="person kurt">
          <div class="image">
            <div class="socials">
              <a href="https://twitter.com/motivationguru?lang=en" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter.svg" alt="Follow Kurt on Twitter"></a>
              <a href="https://www.linkedin.com/in/kurtwnelson/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-in.svg" alt="Find Kurt on LinkedIn"></a>
              <a href="mailto:Kurt@behaviroalgrooves.com"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/envelope.svg" alt="Email Kurt"></a>
              <a href="https://bookme.name/behavioralgrooves" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/calendar.svg" alt="Book an appointment with Kurt"></a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/img/kurt-bio.jpg" alt="Kurt Nelson, PhD">
          </div>
          <div class="content">
            <h3>Kurt Nelson, PhD</h3>
            <ul>
              <li class="podcast">
                <img src="<?php echo get_template_directory_uri(); ?>/img/mic-white.svg" alt="icon">
                <p>CO-FOUNDER &amp; CO-HOST</p>
              </li>
              <li class="accolades">
                <img src="<?php echo get_template_directory_uri(); ?>/img/gear-white.svg" alt="icon">
                <p>RECOGNIZED LEADER IN HUMAN MOTIVATION AND BEHAVIOR CHANGE</p>
              </li>
              <li class="history">
                <img src="<?php echo get_template_directory_uri(); ?>/img/bulb-white.svg" alt="icon">
                <p>FOUNDER: THE LANTERN GROUP</p>
              </li>
              <li class="trivia">
                <img src="<?php echo get_template_directory_uri(); ?>/img/beer-white.svg" alt="icon">
                <p>ENJOYS GEEKING OUT OVER MALTY BEERS</p>
              </li>
            </ul>
          </div>
          <div class="blurb">
            <p>
            <?php the_field('kurt_blurb');?>
            </p>
            <a href="#" class="readmore"><span>READ MORE</span></a>
            <div class="extra-content">
              <?php the_field('kurt_blurb_long');?>
            </div>
          </div>
        </div><!--/person kurt-->

        <div class="person tim">
          <div class="image">
            <div class="socials">
              <a href="https://twitter.com/thoulihan?lang=en" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter.svg" alt="Follow Tim on Twitter"></a>
              <a href="https://www.linkedin.com/in/tim-houlihan-b-e/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-in.svg" alt="Find Tim on LinkedIn"></a>
              <a href="mailto:Tim@behaviroalgrooves.com"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/envelope.svg" alt="Email Tim"></a>
              <a href="https://bookme.name/behavioralgrooves" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/calendar.svg" alt="Book an appointment with Tim"></a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/img/tim-bio.jpg" alt="Tim Houlihan">
          </div>
          <div class="content">
            <h3>Tim Houlihan</h3>
            <ul>
              <li class="podcast">
                <img src="<?php echo get_template_directory_uri(); ?>/img/mic-white.svg" alt="icon">
                <p>CO-FOUNDER &amp; CO-HOST</p>
              </li>
              <li class="accolades">
                <img src="<?php echo get_template_directory_uri(); ?>/img/gear-white.svg" alt="icon">
                <p>RECOGNIZED LEADER IN STRATEGY, TRAINING, AND SALES EFFECTIVENESS</p>
              </li>
              <li class="history">
                <img src="<?php echo get_template_directory_uri(); ?>/img/bulb-white.svg" alt="icon">
                <p>FOUNDER: BEHAVIORALCHEMY</p>
              </li>
              <li class="trivia">
                <img src="<?php echo get_template_directory_uri(); ?>/img/guitar-white.svg" alt="icon">
                <p>BEHAVIORAL SCIENCE BY DAY - MUSIC BY NIGHT</p>
              </li>
            </ul>
          </div>
          <div class="blurb">
            <p>
            <?php the_field('tim_blurb');?>
            </p>
            <a href="#" class="readmore"><span>READ MORE</span></a>
            <div class="extra-content">
              <?php the_field('tim_blurb_long');?>
            </div>
          </div>
        </div><!--/person tim-->

      </section><!--/bios-->

      <section class="sponsors">
        <h2>THANK YOU TO OUR SPONSORS</h2>
        <div class="inner">
          <?php
          if (have_rows('sponsors')):
          while (have_rows('sponsors')): the_row();
            $logo = get_sub_field('logo');
            $content = get_sub_field('content');
            $url = get_sub_field('url');
          ?>
          <div class="sponsor">
              <a href="<?php echo $url;?>" target="_blank">
                <?php echo wp_get_attachment_image($logo, 'srcset'); ?>
                <p><?php echo $content;?></p>
              </a>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </section>

      <section class="partners">
        <h2>PARTNERS &amp; AFFILIATES</h2>
        <div class="inner">
          <?php
          if (have_rows('partners')):
          while (have_rows('partners')): the_row();
            $logo = get_sub_field('logo');
            $url = get_sub_field('url');
          ?>
          <div class="partner">
              <a href="<?php echo $url;?>" target="_blank">
                <?php echo wp_get_attachment_image($logo, 'srcset'); ?>
              </a>
          </div>
          <?php endwhile; endif; ?>
        </div>
      </section>


  	<?php endwhile; ?>
  	<?php else : ?>
  <?php endif; ?>
</div>

<?php
get_footer();
