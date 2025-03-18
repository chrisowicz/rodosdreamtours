<?php
$hs_toggle = get_field('hs_toggle', 'option');
$hs_title = get_field('hs_title', 'option');
$hs_sub_title = get_field('hs_sub_title', 'option');
$hs_background_image = get_field('hs_background_image', 'option');


if ($hs_toggle) :
?>
  <section id="home-hero-section" <?php if($hs_background_image) : ?>style="background-image: url('<?php echo $hs_background_image; ?>');"<?php endif; ?>>
    <div class="title">
      <h1>
        <span class="sub-title"><?php echo $hs_sub_title; ?></span>
        <?php echo $hs_title; ?>
      </h1>
    </div>
  </section>
<?php
endif;
