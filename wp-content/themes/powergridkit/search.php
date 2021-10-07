<?php
/**
 * Template Name: Search Template
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * search
 */

get_header();
?>

<div class="subpage">

    <h1 class="page-title contained">
      <?php if (empty($_GET['s'])) { ?>
        Search Our Episodes & Posts
      <?php } ?>
      <?php if (!empty($_GET['s'])) { ?>
        <?php _e( 'Search results for: ', 'twentynineteen' ); ?><em><?php echo get_search_query(); ?></em>
      <?php } ?>
    </h1>

    <div class="content-area contained">

      <?php echo get_search_form();
      if (!empty($_GET['s'])) {
        if ( have_posts() ) :

  			// Start the Loop.
  			while ( have_posts() ) :
  				the_post();
  				get_template_part( 'template-parts/content/content', 'excerpt' );
  			// End the loop.
  			endwhile;

  		else :
  			get_template_part( 'template-parts/content/content', 'none' );
  		endif;
    } //empty query check
		?>

    </div>

</div>


<?php
get_footer();
