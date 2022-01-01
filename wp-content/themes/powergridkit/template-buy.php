<?php
/**
 * Template Name: Buy
 *
 * @package WordPress
 * @subpackage powergridkit
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>

    <?php

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    ?>
    <div class="container">

    <?php the_content(); ?>
      <div class="products">
          <?php
          if (have_rows('products')):
          while (have_rows('products')): the_row();
            $product = get_sub_field('product');
            $size = get_sub_field('size');
            $altTitle = get_field('alternative_title', $product);
            $url = get_the_permalink($product);
          ?>
          <div class="product <?php echo $size;?>">
              <a href="<?php echo $url;?>" target="_blank">
                <?php echo get_the_post_thumbnail($product, 'srcset'); ?>
                <h2>
                  <?php
                  if ($altTitle){
                    echo $altTitle;
                  }
                  if (!$altTitle){
                    echo get_the_title($product);
                  }
                  ?>
                  <?php //check for price if it exists
        					if (!get_field('free', $product)){
        						$sale = get_field('sale', $product);
        						$normalPrice = get_field('normal_price', $product);
        						?><br>
        					<span class="price <?php if ($sale) { echo 'sale';}?>">
                    <?php if ($sale) { ?><span class="normal-price">was $<?php echo $normalPrice;?></span>now <?php }?>$<?php the_field('price', $product);?>
                  </span>
        					<?php } ?>
                </h2>
              </a>
          </div>
          <?php endwhile; endif; ?>
      </div>
    </div>
    <?php
  	endwhile; // End the loop.
    ?>

<?php
 get_footer();
