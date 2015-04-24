<?php get_header(); ?>
<div id="main">
  <div class="page-title">
    <?php if( is_front_page() && !is_paged() ) : ?>
  <div class="most-recent-news-title">
    <span>Most Recent Reviews</span>
  </div>
  <?php
    //primer
    $new_query = new WP_Query();
    $new_query->query('post_type=post&showposts=1'.'&paged='.$paged);
  ?>
  <div class="most-recent">
    <div class="col1">
        <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php 
          if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          the_post_thumbnail(); //featured image
        }?>
        <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
        <a href="<php the_permalink(); ?>"><?php the_excerpt(); ?></a>

        <?php endwhile; ?>
    </div><!-- #content -->
    <div class="col2">
      <img src="http://placehold.it/350x250" alt="" />
    </div>
  </div> <!--most recent over-->
<?php else : ?>
<p>Not Home Page</p>
<?php endif; ?>

  <div class="rest-of-posts clearfix">
    <!--second loop-->
  <?php rewind_posts(); ?>
  <?php
    //primer
    $new_query = new WP_Query();
    $new_query->query('post_type=post&offset=1');
  ?>
  <div class="col1">
        <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php 
          if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          the_post_thumbnail( array(440, 440) );  // Other resolutions
        }?>
        <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
        <a href="<php the_permalink(); ?>"><?php the_excerpt(); ?></a>

        <?php endwhile; ?>
    </div>

      <div class="col2">
      stuff
      </div>
    <?php themefusion_pagination($pages = '', $range = 2); ?>
  </div>
</div>
</div>
<?php get_footer(); ?>
