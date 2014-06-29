<div class="row header-margin">
    <?php if (have_posts()): ?>
        <article class="medium-9 columns">
            <?php while (have_posts()): the_post(); ?>
                <h2 class="blog-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                <p>Published on: <span class="meta-date"><?php the_time(); ?></span> by <span class="meta-author"><?php the_author(); ?></span></p>
                <?php if (is_single()) : ?>
                    <?php echo get_the_content(); ?>
                <?php else : ?>
                    <?php echo get_the_excerpt(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </article>
    <?php endif; ?>

    <aside class="medium-3 columns">
        <?php get_sidebar(); ?>
    </aside>
</div>
