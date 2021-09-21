<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @since 1.0.0
 */

get_header();
?>
    <div class="contained archive">

        <?php if ( have_posts() ) : ?>

            <?php if ( is_post_type_archive('episode') ) { ?>
            <h1>Episodes tagged <span><?php single_cat_title(); ?></span></h1>
            <?php } ?>

            <?php if ( is_post_type_archive('newsletter') ) { ?>
            <h1>Newsletter Archive <span><?php single_cat_title(); ?></span></h1>
            <?php } ?>

            <?php if ( is_post_type_archive('blogentry') ) { ?>
            <h1>Blog Archive <span><?php single_cat_title(); ?></span></h1>
            <?php } ?>

            <div class="archive-list">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();//object
                ?>
                <div class="archive-item">
                <?php
                    get_template_part( 'template-parts/content/content', 'excerpt' );
                ?>
                </div>
                <?php
			// End the loop.
			endwhile;
            ?>
            </div>
            <?php
			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
		?>
        <?php if ( ! is_post_type_archive() ) { ?>
        <div class="all-tags">
            <h2>All Topics</h2>
            <div class="tag-cloud">
                <?php wp_tag_cloud( array(
                   'smallest' => 12, // size of least used tag
                   'largest'  => 12, // size of most used tag
                   'unit'     => 'px', // unit for sizing the tags
                   'number'   => 1000, // displays XX tags, in this case the top XX
                   'orderby'  => 'name', // order tags -- name or count
                   'order'    => 'ASC', // order tags by ascending order
                   'taxonomy' => 'post_tag' // you can even make tags for custom taxonomies
                ) ); ?>
            </div>
        </div>
    <?php } ?>
    </div>
<?php
get_footer();
