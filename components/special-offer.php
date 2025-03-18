<?php
$so_toggle = get_field('so_toggle', 'option');
$so_title = get_field('so_title', 'option');

if ($so_toggle) :
  $home_special_offer = new WP_Query(array(
    'numberposts'  => -1,
    'post_type'    => 'page',
    'post_parent' => 12,
    'order'   => 'ASC',
    'orderby' => 'menu_order',
    'post_status' => 'publish'
  ));
?>

  <section id="special-offer">
    <h3 class="h1"><span><?php echo $so_title; ?></span></h3>
    <?php
    if ($home_special_offer->have_posts()) : ?>
      <div id="offers">
        <?php while ($home_special_offer->have_posts()) : $home_special_offer->the_post(); ?>
          <article class="offer">
            <div class="thumbnail">
              <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
            </div>
            <div class="title">
              <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
            </div>
          </article>
        <?php endwhile;
        wp_reset_postdata();?>
      </div>
    <?php endif; ?>
  </section>

<?php
endif;
