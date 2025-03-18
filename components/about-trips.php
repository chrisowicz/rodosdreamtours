<?php
$at_toggle = get_field('at_toggle', 'option');
$at_title = get_field('at_title', 'option');
$at_desc = get_field('at_desc', 'option');
$at_image = get_field('at_image', 'option');

if ($at_toggle) :
?>

  <section id="about-trips">
    <div class="image" <?php if ($at_image) : ?>style="background-image: url('<?php echo $at_image; ?>');" <?php endif; ?>></div>
    <div class="desc">
      <h2 class="h1"><span><?php echo $at_title; ?></span></h2>
      <?php echo $at_desc; ?>
    </div>
  </section>

<?php
endif;
