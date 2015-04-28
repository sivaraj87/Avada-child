<?php get_header(); ?>

<div id="main">
    <div class="page-title">
            <div class="most-recent-news-title">
                <span>Most Recent Reviews</span>
            </div>

            <div class="most-recent">
                <div class="col1">
                    <?php
                    //loop1
                    $my_query = new WP_Query( 'posts_per_page=1' );
                    while ( $my_query->have_posts() ) : $my_query->the_post();
                     $do_not_duplicate = $post->ID; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php
                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail(); //featured image
                        } ?>
                        <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                        <p class="post-excerpt"><a href="<php the_permalink(); ?>"><?php echo(get_the_excerpt()); ?></a>
                        </p>
                    <?php endwhile; ?>
                </div>
                <!-- #content -->
                <div class="col2">
                    <div class="most-recent-news-title">
                        <span>Advertisement</span>
                        <?php get_template_part( 'advert/home-350x250'); ?>
                    </div>
                </div>
            </div> <!--most recent over-->
        <div class="rest-of-posts clearfix">
            <div class="col1">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            if ( $post->ID == $do_not_duplicate ) continue; ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail(array(440, 440));  // Other resolutions
                    } ?>
                    <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                    <a href="<php the_permalink(); ?>"><?php the_excerpt(); ?></a>

                <?php endwhile; endif; ?>
            </div>

            <div class="col2">
                <div class="most-recent-news-title">
                    <header class="ent">
                        <div>Home Entertainment</div>
                    </header>
                    <span></span>
                </div>
                <?php rewind_posts(); ?>
                <?php
                //loop3
                $args = [
                    'category_name' => 'home-entertainment',
                    'showposts' => '3'
                ];
                $new_query = new WP_Query($args);
                ?>
                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail(array(440, 440));  // Other resolutions
                    } ?>
                    <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                <?php endwhile; ?>
                <div class="most-recent-news-title">
                    <span>Advertisement</span>
                </div>
                <?php get_template_part( 'advert/home-350x250'); ?>
                <header class="rec">
                    <div>Recommended</div>
                </header>
                <?php rewind_posts(); ?>
                <?php
                //loop4
                $args = [
                    'category_name' => 'home-entertainment',
                    'showposts' => '3',
                    'offset' => '3'
                ];
                $new_query = new WP_Query($args);
                ?>
                <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail(array(440, 440));  // Other resolutions
                    } ?>
                    <?php the_date('m.d.y', '<time class="clearfix timestamp">', '</time>'); ?>
                <?php endwhile; ?>
            </div>
            <?php themefusion_pagination($pages = '', $range = 2); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
