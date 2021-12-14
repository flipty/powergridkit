</main>

<footer>
  <div class="container">
    <div class="newsletter">
      <div class="inner">
        <div class="content">
          <div class="icon">
            <img src="/wp-content/themes/powergridkit/img/rss.svg" alt="RSS icon">
          </div>
          <div class="text">
            <h3><?php echo get_field('newsletter_headline', 'options');?></h3>
            <p><?php echo get_field('newsletter_paragraph', 'options');?></p>
          </div>
          <div class="form">
            <?php echo do_shortcode('[mc4wp_form id="30"]');?>
          </div>
        </div>
        <div class="image">
          <img src="/wp-content/themes/powergridkit/img/power-lines.png" alt="illustrated power lines">
        </div>
      </div>
    </div>
    <div class="links">
      <a href="mailto: support@powergridkit.com" class="email">support@powergridkit.com</a>
      <a href="/terms">Privacy & Terms</a>
      <!-- <a href="/privacy">Privacy</a> -->
      <span>St. Paul, MN</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<script src="/wp-content/themes/powergridkit/js/pgk.js"></script>

</body>
</html>
