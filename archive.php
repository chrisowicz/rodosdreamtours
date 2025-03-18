<?php get_header(); ?>
<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 class="section-title"><?php echo my_archive_title($title); ?></h1>
      </div>
      <?php if (have_posts()) : ?>
        <section id="excerpt" class="row no_margin">
          <?php while (have_posts()) : the_post(); ?>
            <div class="col-lg-4 col-md-6 col-xs-12">
              <div class="excerpt-item offer no-filter center">
                <div class="thumbnail"><?php the_post_thumbnail('full', array('loading' => 'lazy')); ?></div>
                <div class="content">
                  <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <?php echo the_excerpt(); ?>
                  <span class="btn"><?php _e('Zobacz', 'bjsrenovation'); ?></span>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          <div class="col-xs-12 pagination">
            <?php
            global $wp_query;
            echo generatePagination(get_query_var('paged'), $wp_query);
            ?>
          </div>
        </section>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php
get_footer();
