<?php
get_header();
the_post();
if (has_post_thumbnail()) :
?>
  <section id="page-hero-section" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
    <h1 id="page-title-hero" class="h1"><?php echo the_title(); ?></h1>
    <?php // the_post_thumbnail('full', array('class' => 'img-fluid hero-image')); 
    ?>
  </section>
<?php endif; ?>
<section id="content" <?php if (!has_post_thumbnail()) : ?>style="margin-top: 200px;" <?php endif; ?>>
  <?php if (!has_post_thumbnail()) : ?>
    <h1 id="page-title"><?php echo the_title(); ?></h1>
  <?php endif; ?>
  <div class="post">
    <h2><?php _e('404 - Niestety strona której szukasz nie istnieje ;-(', 'rodosdreamtours'); ?></h2><br>
    <a class="btn btn-aida" href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Przejdź do strony głównej', 'bjsrenovation'); ?></a>
  </div>
</section>
<?php get_footer();
