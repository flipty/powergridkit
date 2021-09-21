</main>
<footer>
  <div class="contained">
  <h6>Connect with Behavioral Grooves</h6>
  <div class="socials">
    <a target="_blank" href="https://twitter.com/behavioralgroov?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="twitter"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/twitter.svg" alt="Twitter" loading="lazy"></a>
    <a target="_blank" href="https://www.linkedin.com/company/behavioral-grooves/" class="linkedin"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin-in.svg" alt="LinkedIn" loading="lazy"></a>
    <a target="_blank" href="https://www.facebook.com/behavioralgrooves/" class="facebook"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook-f.svg" alt="Facebook" loading="lazy"></a>
    <a target="_blank" href="https://www.instagram.com/behavioralgrooves/?hl=en" class="instagram"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/instagram.svg" alt="Instagram" loading="lazy"></a>
    <a href="/contact" class="email"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/envelope.svg" alt="Email" loading="lazy"></a>
  </div>
  <div class="copyright">
    COPYRIGHT &copy;<?php echo(date('Y'));?> ALL RIGHTS RESERVED, BEHAVIORAL GROOVES
  </div>
  <div class="disclaimer">
    <?php echo get_field('footer_disclaimer', 'options'); ?>
  </div>
</div>

</footer>

<?php wp_footer(); ?>
<script src="/wp-content/themes/behavioralgrooves2/js/jquery-3.6.0.min.js"></script>
<?php if ( is_front_page() || is_page_template('template-insights.php') ) { ?>
<script src="/wp-content/themes/behavioralgrooves2/js/owl.min.js"></script>
<?php } ?>
<script src="/wp-content/themes/behavioralgrooves2/js/behavioralgrooves2.js"></script>
</body>
</html>
