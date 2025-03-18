<?php
$sliders_toggle = get_field('sliders_toggle', 'option');

if ($sliders_toggle) :
?>

  <section id="sliders">
    <div class="container">
      <?php if (have_rows('sliders', 'option')) : ?>
        <?php while (have_rows('sliders', 'option')) : the_row();
          $reverse = get_sub_field('reverse');
          $title = get_sub_field('title');
          $desc = get_sub_field('desc');
          $image = get_sub_field('image');
        ?>
          <div id="slide-<?php echo get_row_index(); ?>" class="item">
            <div class="content">
              <?php if ($reverse) : ?>
                <div class="desc">
                  <h2><?php echo $title; ?></h2>
                  <?php echo $desc; ?>
                </div>
                <div class="image"><?php echo wp_get_attachment_image($image, 'full'); ?></div>
              <?php else : ?>
                <div class="image"><?php echo wp_get_attachment_image($image, 'full'); ?></div>
                <div class="desc">
                  <h2><?php echo $title; ?></h2>
                  <?php echo $desc; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>

<?php
endif;
