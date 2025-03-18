<?php
$qc_toggle = get_field('qc_toggle', 'option');
$qc_bg_image = get_field('qc_bg_image', 'option');
$qc_title = get_field('qc_title', 'option');
$qc_phone_1 = get_field('qc_phone_1_pl', 'option');
$qc_phone_2 = get_field('qc_phone_2_el', 'option');
$qc_whatsapp = get_field('qc_whatsapp', 'option');
$qc_mail = get_field('qc_mail', 'option');
$qc_messenger = get_field('qc_messenger', 'option');
$qc_instagram = get_field('qc_instagram', 'option');
$qc_facebook = get_field('qc_facebook', 'option');

if($qc_toggle) :
?>

  <section id="quick-contact" <?php if ($qc_bg_image) : ?>style="background-image: url('<?php echo $qc_bg_image; ?>');" <?php endif; ?>>
    <div id="container">
      <h3><?php echo $qc_title; ?></h3>
      <div id="links">
        <?php
        if ($qc_phone_1) : ?>
          <a href="<?php echo $qc_phone_1['url']; ?>" target="_blank"><i class="icon-phone icon"></i> <?php echo $qc_phone_1['title']; ?></a>
        <?php endif;
        if ($qc_phone_2) : ?>
          <a href="<?php echo $qc_phone_2['url']; ?>" target="_blank"><i class="icon-phone-grace icon"></i> <?php echo $qc_phone_2['title']; ?></a>
        <?php endif;
        if ($qc_whatsapp) : ?>
          <a rel="noopener" rel="nofollow" href="<?php echo $qc_whatsapp['url']; ?>" target="_blank"><i class="icon-whatsapp icon"></i> <?php echo $qc_whatsapp['title']; ?></a>
        <?php endif;
        if ($qc_mail) : ?>
          <a href="<?php echo $qc_mail['url']; ?>" target="_blank"><i class="icon-mail icon"></i> <?php echo $qc_mail['title']; ?></a>
        <?php endif;
        if ($qc_messenger) : ?>
          <a rel="noopener" rel="nofollow" href="<?php echo $qc_messenger['url']; ?>" target="_blank"><i class="icon-messenger icon"></i> <?php echo $qc_messenger['title']; ?></a>
        <?php endif;
        if ($qc_instagram) : ?>
          <a rel="noopener" rel="nofollow" href="<?php echo $qc_instagram['url']; ?>" target="_blank"><i class="icon-instagram icon"></i> <?php echo $qc_instagram['title']; ?></a>
        <?php
        endif;
        if ($qc_facebook) : ?>
          <a rel="noopener" rel="nofollow" href="<?php echo $qc_facebook['url']; ?>" target="_blank"><i class="icon-facebook icon"></i> <?php echo $qc_facebook['title']; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php endif; ?>