<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="post">

		<?php

		/* Start the Loop */
		while ( have_posts() ) : the_post();
		?>

		<?php
		endwhile; // End the loop.
		?>

</div><!--/contained-->

<?php
get_footer();
