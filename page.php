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
    <?php the_content(); ?>
  </div>
</section>
<?php get_footer();
