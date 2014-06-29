<div class="row header-margin">
    <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail(); ?>
    <?php endif; ?>

    <div class="columns medium-12"> 
        <article><h2><?php echo get_the_title(); ?></h2></article>
        <?php
        $options = array(
            'posts_per_page' => -1,
            'post_type' => 'post',
        );

        $posts = get_posts($options);

        foreach ($posts as $post): 
            setup_postdata($post) 
            ?>
            <article> 
                <h2 class="blog-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                <small><?php the_time('M. d, Y'); ?></small>
                <div class="entry">
                    <?php if (is_single()) : ?>
                        <?php the_content(); ?>
                    <?php else : ?>
                        <?php the_excerpt(); ?>
                        <a class="read-more" href="/?p=<?php echo get_the_ID(); ?>">Show More</a>
                    <?php endif; ?>
                </div>
            </article>
        <?php wp_reset_postdata(); ?>
        <?php endforeach; ?>
    </div>

    <?php
    /*
    <aside class="medium-3 columns">
        <?php dynamic_sidebar('default-sidebar'); ?>
    </aside>
    */
    ?>
</div>

