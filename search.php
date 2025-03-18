<?php get_header(); ?>
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 class="h1"><?php _e('Strona wyszukiwania', 'bjsrenovation'); ?></h1>
      </div>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="col-xs-12 col-md-6 col-lg-4 text-center posts-excerpt">
            <div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array('class' => 'img-fluid')); ?></a></div>
            <h2 class="h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php woocommerce_template_loop_price(); ?>
            <span class="btn"><?php _e('Wybierz opcje', 'bjsrenovation'); ?></span>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
        <div class="col-xs-12 pagination">
          <?php
          global $wp_query;
          echo generatePagination(get_query_var('paged'), $wp_query);
          ?>
        </div>
      <?php else : ?>
        <div class="w-100 text-center">
          <h2 class="h1"><i class="fas fa-info-circle"></i> <?php _e('Niestety nie znaleźliśmy tego, czego szukasz. Napisz do nas, lub zadzwoń.', 'bjsrenovation'); ?></h2>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>