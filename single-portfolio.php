<?php get_header(); ?> <!-- single portfolio piece -->

<div class="main clearfix">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>
          
          <?php the_terms( $post->ID, 'technology', '', '-'); ?>

          <div class="entry-content">
          <?php the_field('portfolio_technologies_used') ?>
            <?php the_field('portfolio_short_desc') ?>
            <?php the_content(); ?>

            <div class="gallery">
              <?php while(has_sub_field('portfolio_gallery')): ?>
                  <div class="gallery-item">
                    <?php $image = get_sub_field('image') ?>
                    <?php $image_src = $image['sizes']['medium'] ?>
                    <img src="<?php echo $image_src ?>" alt="">
                    <p><?php the_sub_field('caption') ?></p>
                  </div>
              <?php endwhile; ?>
            </div>
            
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>