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

		//get metadata from associated podcast
		if( function_exists('powerpress_get_enclosure_data') ) {
		   $EpisodeData = powerpress_get_enclosure_data( get_the_ID() );
		}


		?>
		<?php if ( get_post_type() == 'meetup_events' ) { ?>
			<h1 class="contained">BEHAVIORAL GROOVES MEETUP</h1>
		<?php } ?>

		<?php if ( get_post_type() == 'newsletter' ) { ?>

		<?php } ?>

		<div class="post-area">
		<?php
			//query of all posts
			$allPosts = new WP_Query( array(
				'post_type' => 'post',
				'posts_per_page' => -1,
				'order' => 'DESC'
			) );
			//make array of all post IDs
			$allIDs = wp_list_pluck( $allPosts->posts, 'ID' );
			//put my thang down flip it and reverse it
			$allIDs = array_reverse($allIDs);
			//get this posts's ID
			$thisID = get_the_ID();
			//search the all ID's array for the ID of this post and add 1
			$thisIndex = array_search($thisID, $allIDs) + 1;

			//query for bonus tracks (this ID as value of related_episode field)
			$bonusTrackQuery = new WP_Query( array(
				'post_type' => 'blogentry',
				'posts_per_page' => -1,
				'order' => 'DESC',
				'meta_query' => array(
				    array(
				        'key'       => 'related_episode',
				        'value'     => $thisID,
				        'compare'   => 'LIKE',
				    )
				)
			) );

		?>
		<?php if ( get_post_type() == 'meetup_events' ) { ?>
			<h4><a href="/meetups">&lt; BACK TO ALL MEETUPS</a></h4>
		<?php } ?>
		<?php
			the_title('<h1>','</h1>');
			the_content();
		?>
		</div>
		<?php if ( get_post_type() == 'post' ) { ?>
		<div class="side-area">
			<h2><span>AIRDATE: <?php echo get_the_date(); ?></span> EPISODE <?php echo $thisIndex;?></h2>
				<?php echo do_shortcode('[powerpress]');?>

			<?php if ( have_rows('podcast_providers', 'options') ): ?>
					<div class="play-options">
						<h4>This episode also available via:</h4>
						<ul>
							<?php while ( have_rows('podcast_providers', 'options') ) : the_row();
							$service = get_sub_field('service');
							$logo = get_sub_field('logo');
							$url = get_sub_field('url');
							//print_r($EpisodeData);
							?>
							<li><a href="<?php echo $url;?>" title="<?php echo $service;?>"><?php echo wp_get_attachment_image($logo, 'srcset');?></a></li>
							<?php endwhile; ?>
							<li><a href="<?php echo($EpisodeData['url']);?>" target="_blank">MP3 Download</a></li>
						</ul>

				</div>
			<?php endif;?>

			<h3 class="title"><?php the_title(); ?></h3>

			<?php
			if ( $bonusTrackQuery->have_posts() ) {
				?>
				<div class="bonus-tracks">
					<h3>Bonus Track</h3>
					<ul>
					<?php	while ( $bonusTrackQuery->have_posts() ) { $bonusTrackQuery->the_post(); ?>
						<li>
							<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
						<?php	}//endwhile	?>
					</ul>
				</div>
			<?php }//endif
			wp_reset_postdata();
			?>


			<div class="extra-info">

				<div class="guest">
					<?php if ( have_rows('guests') ): ?>
					<?php $guests = count(get_field('guests'));?>
					<h3>Featured Guest<?php if ($guests > 1){ echo 's';}?></h3>
					<?php endif; ?>
					<div class="image">
						<?php if ( have_rows('guests') ): ?>
						    <?php while ( have_rows('guests') ) : the_row(); ?>
								<?php if ( get_sub_field('guest_link') ) { ?><a href="<?php the_sub_field('guest_link'); ?>"><?php } ?>
								<img src="<?php echo($EpisodeData['itunes_image']); ?>" alt="">
								<?php if ( get_sub_field('guest_link') ) { ?></a><?php } ?>
								<h5>
								<?php if ( get_sub_field('guest_link') ) { ?><a href="<?php the_sub_field('guest_link'); ?>" target="_blank"><?php } ?>
									<?php the_sub_field('guest_name'); ?>
								<?php if ( get_sub_field('guest_link') ) { ?></a><?php } ?>
							</h5>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="music">
					<?php if ( have_rows('featured_artist') ): ?>
					<h3>Featured Artists</h3>
					<?php endif; ?>
					<?php if ( have_rows('featured_artist') ): ?>
						<?php while ( have_rows('featured_artist') ) : the_row(); ?>
							<?php
							$link = '';
							$artistName = get_sub_field('artist_name');
							if ( get_sub_field('link') ) { $link = get_sub_field('link'); }
							if ( ! get_sub_field('link') ) { $link = 'https://google.com/search?q='.$artistName.' music'; }
							?>
							<p>
								<a href="<?php echo $link; ?>" target="_blank"><?php the_sub_field('artist_name'); ?></a>
							</p>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>

			</div>

			<div class="tags">

				<?php
				//get all of this post's tags
				$tags = get_the_tags($post->ID);
				$tagCount = count($tags);
				?>
				<?php if ($tags) : ?>
				<h3>TOPICS</h3>

				<ul class="tag-cloud">
				<?php foreach($tags as $tag) :  ?>
					<li>
						<a href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>">
							<?php print_r($tag->name); ?>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
				<?php endif; ?>

			</div>

			<?php if ( get_field('links_section') ) { ?>
			<div class="links">
				<h3>LINKS</h3>
				<?php the_field('links_section');?>
			</div>
			<?php } ?>

			<?php if ( get_field('transcript') ) { ?>
			<div class="transcript">
				<h3>TRANSCRIPT AVAILABLE</h3>
				<a href="<?php the_field('transcript');?>" title="View/Download Transcript" target="_blank">View / Download Transcript</a>
			</div>
			<?php } ?>

		</div>
		<?php } ?>

		<?php if ( get_post_type() == 'newsletter' ) { ?>
		<div class="side-area">
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
		</div>
		<?php }?>

		<?php
		endwhile; // End the loop.
		?>
	</div>

</div><!--/contained-->

<?php
get_footer();
