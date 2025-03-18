<?php
$trips_toggle = get_field('trips_toggle', 'option');
$trips_title = get_field('trips_title', 'option');

if ($trips_toggle) :
  $home_page_trips = new WP_Query(array(
    'numberposts'  => -1,
    'post_type'    => 'page',
    'post_parent' => 31,
    'order'   => 'ASC',
    'orderby' => 'menu_order',
    'meta_key' => 'home_page',
    'meta_value' => '1',
    'post_status' => 'publish'
  ));
?>

  <section id="trips-top-6">
    <h3 class="h1"><span><?php echo $trips_title; ?></span></h3>
    <?php
    if ($home_page_trips->have_posts()) : ?>
      <div id="trips">
        <?php 
        while ($home_page_trips->have_posts()) : $home_page_trips->the_post();
          $price = get_field('price');
          $best_price = get_field('best_price');
          $route = get_field('route');
        ?>
          <article class="trip">
            <div class="thumbnail">
              <?php the_post_thumbnail('medium-absolute', array('class' => 'img-fluid')); ?>
            </div>
            <div class="title">
              <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
              <div class="detail">
                <span class="price"><?php echo $price; ?></span>
                <span class="info"><?php echo $best_price; ?></span>
              </div>
            </div>
            <div class="desc">
              <?php echo the_excerpt(); ?>
              <?php if($route) : ?><p><strong>Trasa:</strong> <?php echo $route; ?></p><?php endif; ?>
            </div>
            <button class="btn">Poznaj</button>
          </article>
        <?php endwhile;
        wp_reset_postdata();?>
      </div>
    <?php endif; ?>
  </section>

<?php
endif;
