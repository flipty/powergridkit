<?php
/**
 * The template for displaying single product CPT posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

		/* Start the Loop */
		while ( have_posts() ) : the_post();
		?>
		<div class="container">

			<div class="product-info">
				<?php $images = get_field('images');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $images ): ?>
				<div class="images">
					<div class="main-image">
						<?php
						$firstImg = $images[0];
						echo wp_get_attachment_image( $firstImg, $size );
						?>
					</div>
			    <ul class="image-choices">
		        <?php foreach( $images as $image_id ): ?>
	          <li>
							<a href="<?php echo wp_get_attachment_url( $image_id ); ?>" data-src="<?php echo wp_get_attachment_url( $image_id ); ?>"><?php echo wp_get_attachment_image( $image_id, $size ); ?></a>
	          </li>
	        	<?php endforeach; ?>
			    </ul>
				</div>
				<?php endif; ?>
				<div class="content<?php if(! $images ){ echo ' no-image';}?>">
					<h1><?php if (get_field('alternative_title')) { the_field('alternative_title'); } if (!get_field('alternative_title')) { the_title(); } ?></h1>

					<?php //check for price if it exists
					if (!get_field('free')){
						$sale = get_field('sale');
						$normalPrice = get_field('normal_price');
						?>
					<h2 <?php if ($sale) { echo 'class="sale"';}?>><?php if ($sale) { ?><span class="normal-price">was $<?php echo $normalPrice;?></span>now <?php }?>$<?php the_field('price');?>
					</h2>
					<?php } ?>

					<?php the_content();?>

					<div class="buy-button">
						<?php the_field('shopify_code'); ?>
					</div>
				</div>
			</div>

		</div>

		<?php
		endwhile; // End the loop.

get_footer();
