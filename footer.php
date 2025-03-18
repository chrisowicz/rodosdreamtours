<?php
$footer_menu_1_title = get_field('footer_menu_1_title', 'option');
$footer_menu_1_desc = get_field('footer_menu_1_desc', 'option');
$footer_menu_1_map_url = get_field('footer_menu_1_map_url', 'option');
$footer_menu_2_title = get_field('footer_menu_2_title', 'option');
$footer_menu_3_title = get_field('footer_menu_3_title', 'option');
$footer_menu_3_logos = wp_get_attachment_image(get_field('footer_menu_3_logos', 'option'), 'full', '', ['style' => 'width:250px']);
$footer_copyright = get_field('footer_copyright', 'option');
get_template_part('components/contact');
?>
<footer>
  <section id="bottom-links">
    <div class="item">
      <h3><?php echo $footer_menu_1_title; ?></h3>
      <p><?php echo $footer_menu_1_desc; ?></p>
      <a target="_blank" rel="noopener" rel="nofollow" href="<?php echo $footer_menu_1_map_url; ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/localizaction-bg-footer.png" alt="Nasza lokalizacja"></a>
    </div>
    <div class="item">
      <h3><?php echo $footer_menu_2_title; ?></h3>
      <?php wp_nav_menu(array('theme_location' => 'footer-menu-nasza-oferta')); ?>
    </div>
    <div class="item">
      <h3><?php echo $footer_menu_3_title; ?></h3>
      <?php wp_nav_menu(array('theme_location' => 'footer-menu-przydatne-linki')); ?>
      <?php echo $footer_menu_3_logos; ?>
    </div>
  </section>
  <section id="copyright">
    <p><?php echo $footer_copyright; ?> ® <?php echo date('Y ');
                                          echo bloginfo('name'); ?></p>
    <?php gp('Tworzę niezwykłe rzeczy dla wyjątkowych ludzi. | EN: I create extraordinary things for exceptional people'); ?>
  </section>
</footer>
<?php
$qc_phone_1 = get_field('qc_phone_1_pl', 'option');
$qc_whatsapp = get_field('qc_whatsapp', 'option');
$qc_messenger = get_field('qc_messenger', 'option');
$qc_mail = get_field('qc_mail', 'option'); ?>
<div id="quick-contact-small">
  <button id="quick-contact-toggle" class="icon-quick-contact-toggle icon"></button>
  <div id="qc-content">
    <?php
    if ($qc_phone_1) : ?>
      <a href="<?php echo $qc_phone_1['url']; ?>" target="_blank"><i class="icon-phone icon"></i> <?php echo $qc_phone_1['title']; ?></a>
    <?php endif;
    if ($qc_whatsapp) : ?>
      <a rel="noopener" rel="nofollow" href="<?php echo $qc_whatsapp['url']; ?>" target="_blank"><i class="icon-whatsapp icon"></i> <?php echo $qc_whatsapp['title']; ?></a>
    <?php endif;
    if ($qc_messenger) : ?>
      <a rel="noopener" rel="nofollow" href="<?php echo $qc_messenger['url']; ?>" target="_blank"><i class="icon-messenger icon"></i> <?php echo $qc_messenger['title']; ?></a>
    <?php endif;
    if ($qc_mail) : ?>
      <a href="<?php echo $qc_mail['url']; ?>" target="_blank"><i class="icon-mail icon"></i> <?php echo $qc_mail['title']; ?></a>
    <?php endif; ?>
  </div>
</div>
</div> <!-- Close div #main -->
<?php wp_footer(); ?>
<script>
  jQuery(document).ready(function($) {
    // $('.owl-carousel').owlCarousel({
    //   loop: false,
    //   margin: 0,
    //   nav: false,
    //   items: 1,
    // });
    $('.wp-block-gallery').lightGallery({
      selector: 'a',
      download: false,
      zoom: false,
      share: false
    });
    $('.wp-block-image').lightGallery({
      selector: 'a',
      download: false,
      zoom: false,
      share: false
    });
  });
</script>
</body>

</html>