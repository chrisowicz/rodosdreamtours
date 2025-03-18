<?php get_header(); ?>
<section id="content">
  <div class="container">
    <div class="row">
      <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
      <div class="col-xs-12 col-lg-4 text-center">
        <div class="posts-excerpt">
          <div class="thumbnail"><a
              href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-absolute', array('class' => 'img-fluid')); ?></a>
          </div>
          <h2 class="h2"><?php cut_the_title(45); ?></h2>
          <p class="excerpt"><?php the_excerpt_max_charlength(200); ?></p>
          <a href="<?php the_permalink(); ?>" class="btn"><?php _e('zobacz', 'bjsrenovation'); ?></a>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="col-xs-12 pagination">
        <?php
          global $wp_query;
          echo generatePagination(get_query_var('paged'), $wp_query);
        ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php
get_footer();