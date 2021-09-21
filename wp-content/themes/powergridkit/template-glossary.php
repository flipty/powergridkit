<?php
/**
 * Template Name: Glossary Template
 *
 * @package WordPress
 * @subpackage behavioralgrooves
 * @since Twenty Sixteen 1.0
 * template-artists
 */

get_header();
?>
<?php
  $intro_image = get_field('intro_image');
  $intro_content = get_field('intro_content');
  $header_override = get_field('intro_header_override');
?>
<div class="subpage">
  <div class="header-image <?php if (get_field('tall')) { echo ' tall'; } ?>">
    <div class="image">
      <?php echo wp_get_attachment_image($intro_image, 'srcset');?>
    </div>
    <div class="content">
      <div class="contained">
        <?php if (!$header_override) { ?><h1><?php the_title(); ?></h1><?php } ?>
        <?php echo $intro_content;?>
      </div>
    </div>
  </div>

  <div class="content-area contained">
    <a name="#top"></a>
      <?php if (have_posts()) : ?>
      	<?php while (have_posts()) : the_post(); ?>

          <?php if (have_rows('content_sections')): ?>
            <ul class="page-nav">
            <?php while (have_rows('content_sections')) {
              the_row();
              $title = get_sub_field('title');
              $index = get_row_index();
            ?>
              <li>
                <a href="#anchor-<?php echo $index;?>"><?php echo $title;?></a>
              </li>
            <?php } ?>
            </ul>

          <?php endif; ?>

          <?php if (have_rows('content_sections')): ?>
            <?php while (have_rows('content_sections')) {
              the_row();
              $title = get_sub_field('title');
              $content = get_sub_field('content');
              $index = get_row_index();
            ?>
              <a name="anchor-<?php echo $index;?>"></a>
              <section>
                <h2><?php echo $title;?> <?php if ($index > 1) { ?><a href="#top">Top</a><?php } ?></h2>
                <div class="content">
                  <?php echo $content;?>
                </div>
              </section>
            <?php } ?>
          <?php endif; ?>



      	<?php endwhile; ?>
      <?php endif; ?>
  </div>

<?php
 get_footer();
