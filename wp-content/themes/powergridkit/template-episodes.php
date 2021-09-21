<?php
/**
 * Template Name: Episodes Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves2
 * @since Twenty Sixteen 1.0
 * template-episodes
 */

get_header();
?>

    <h1 class="contained">Behavioral Grooves Episodes</h1>

    <div class="filter-bar">
        <div class="selector">
            <h2>
                Filtered by
                <span class="filter active-filter" id="order-date">air date<i>&#9658;</i></span>
                <span class="filter" id="order-topic">topic<i>&#9658;</i></span>
                <span class="filter" id="order-guest">guest<i>&#9658;</i></span>
            </h2>
        </div>
        <div class="tag-list">
            <h6>Choose episode topic(s)</h6>
            <?php
            $cutoff = 10;
            $tags = get_tags();
            $moreTags = count($tags) - $cutoff;
            //style below is to hide the $cutoff tags from the secondary list
            ?>
            <style>
            .page-template-template-episodes .filter-bar .tag-list .tag-cloud.secondary-tags a:nth-child(-n+<?php echo $cutoff;?>) {
                display: none !important;
            }
            </style>
            <div class="tag-cloud primary-tags">
                <?php wp_tag_cloud( array(
                   'smallest' => 12, // size of least used tag
                   'largest'  => 12, // size of most used tag
                   'unit'     => 'px', // unit for sizing the tags
                   'number'   => $cutoff, // displays XX tags
                   'orderby'  => 'count', // order tags -- name or count
                   'order'    => 'DESC', // order tags by ascending order
                   'taxonomy' => 'post_tag'
                ) ); ?>
            </div>
            <div class="tag-cloud secondary-tags">
                <?php wp_tag_cloud( array(
                   'smallest' => 10, // size of least used tag
                   'largest'  => 10, // size of most used tag
                   'unit'     => 'px', // unit for sizing the tags
                   'number'   => 900, // displays XX tags
                   'orderby'  => 'count', // order tags -- name or count
                   'order'    => 'DESC', // order tags by ascending order
                   'taxonomy' => 'post_tag' // you can even make tags for custom taxonomies
                ) ); ?>
            </div>
            <a class="showmore" href="#">show <span class="more"> <?php echo($moreTags); ?> more </span><span class="less"> less </span>  topics</a>
        </div>
    </div>

    <?php

    $query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'order' => 'DESC'
    ) );

    /* Start the Loop */
    while ( have_posts() ) : the_post(); //this is to get the post object
    ?>

    <div class="grid-container-episiodes">

    <?php
    if ( $query->have_posts() ) :
    //count the posts
    $count = $query->post_count;

    while ( $query->have_posts() ) : $query->the_post();
        //get metadata from associated podcast
        if( function_exists('powerpress_get_enclosure_data') ) {
           $EpisodeData = powerpress_get_enclosure_data( get_the_ID() );
           $episodeNumber = $EpisodeData['episode_no'];
        }
    ?>

    <div <?php post_class('episode');?>>
        <div class="inner">
            <div class="image">
                <a href="<?php echo get_the_permalink(); ?>"><img loading="lazy" src="<?php echo($EpisodeData['itunes_image']); ?>" alt="Behavioral Grooves Feature"></a>
            </div>
            <div class="content">
              <a href="<?php echo get_the_permalink(); ?>">
              <h5>EPISODE <?php echo $count; ?></h5>
              <h4><?php echo get_the_title(); ?></h4>
              <?php the_excerpt(); ?>
              </a>
            </div>
        </div>
    </div>


    <?php
    //increment the count backwards - for the 'unofficial' episode number
    $count--;
    endwhile; wp_reset_postdata();

    // pagination here
    else :
    // 404 error here
    endif;
    ?>
    </div>
    <?php
	endwhile; // End the loop.

 get_footer();
