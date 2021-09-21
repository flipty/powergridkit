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
<div class="post-container contained">

	<div class="grid-container">
		<?php

		/* Start the Loop */
		while ( have_posts() ) : the_post();

		?>
		<?php if ( get_post_type() == 'meetup_events' ) { ?>
			<h1 class="contained">BEHAVIORAL GROOVES MEETUP</h1>
		<?php } ?>

		<?php if ( get_post_type() == 'newsletter' ) { ?>

		<?php } ?>

		<div class="post-area">

		<?php if ( get_post_type() == 'meetup_events' ) { ?>
			<h4><a href="/meetups">&lt; BACK TO ALL MEETUPS</a></h4>
		<?php } ?>

		<?php
			the_title('<h1>','</h1>');
			the_content();
		?>
		</div>

		<div class="side-area">

		<?php if (get_field('bonus_track')){?>
			<div class="bonus-track">
				<h3>Related Podcast Episode:</h3>
					<?php	$bonus_track_relation = get_field('related_episode');	?>
					<a href="<?php echo get_the_permalink($bonus_track_relation);?>">
						<?php echo get_the_title($bonus_track_relation);?>
					</a>
			</div>
		<?php } ?>


			<div class="archives">
				<h3>BEHAVIORAL GROOVES BLOG</h3>
				<?php

				$blogargs = array(
					'post_type' => 'blogentry',
					'posts_per_page' => -1,
					'order' => 'DESC'
				);

				$blogs = new WP_Query( $blogargs );
				if ( $blogs->have_posts() ) {
					?>
					<ul>
					<?php
						while ( $blogs->have_posts() ) {
								$blogs->the_post();
					?>
						<li>
							<span><?php echo get_the_date(); ?></span>
							<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php
					}//endwhile
					?>
					</ul>
				<?php }//endif
				wp_reset_postdata();
				?>

			</div>
			<?php if ( get_post_type() == 'newsletter' ) { ?>

			<div class="archives">
				<h3>GROOVELETTER ARCHIVES</h3>
				<?php

				$nlargs = array(
					'post_type' => 'newsletter',
					'posts_per_page' => -1,
					'order' => 'DESC'
				);

				$newsletters = new WP_Query( $nlargs );
				if ( $newsletters->have_posts() ) {
					?>
					<ul>
					<?php
				    while ( $newsletters->have_posts() ) {
				        $newsletters->the_post();
					?>
						<li>
							<span><?php echo get_the_date(); ?></span>
							<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php
					}//endwhile
					?>
					</ul>
				<?php }//endif
				wp_reset_postdata();
				?>

			</div>

		<?php }?>

		<?php
		endwhile; // End the loop.
		?>
	</div>

</div><!--/contained-->

<?php
get_footer();
