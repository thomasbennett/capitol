<div class="row header-margin">
    <?php if (have_posts()) : ?>
        <article class="medium-9 columns">
            <?php while (have_posts()) : the_post(); ?>
                <h2<?php if (is_page()) { ?> class="right-title"<?php } ?>><?php the_title(); ?></h2>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </article>	
    <?php endif; ?>

    <aside class="medium-3 columns">
        <?php get_sidebar(); ?>
    </aside>
</div>
