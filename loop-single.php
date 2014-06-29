<div class="row header-margin">
    <?php if (have_posts()) : ?>
        <article class="medium-12 columns">
            <?php while (have_posts()) : the_post(); ?>
                <h2<?php if (is_page()) { ?> class="right-title"<?php } ?>><?php the_title(); ?></h2>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </article>	
    <?php endif; ?>
</div>
