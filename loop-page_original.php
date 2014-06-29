<?php if (have_posts()) : ?>
    <div class="row header-margin">
        <?php while (have_posts()) : the_post(); ?>
            <div class="medium-12 columns">
                <?php $slides = carbon_get_post_meta(get_the_ID(), 'page_rotator', 'complex'); ?>
                <div id="slideshow" class="cycle-slideshow" 
                        data-cycle-fx=fade
                        data-cycle-timeout=4000
                        data-cycle-speed="1200"
                        data-cycle-slides=".slide",
                        data-cycle-auto-height="container">'
                    
                    <?php
                    foreach ($slides as $slide) {
                        echo '<div class="slide"><img src="'.$slide['slide'].'"></div>';
                    }
                    ?>
                </div>
            </div>
            <?php $sidebar = carbon_get_post_meta(get_the_ID(), 'sidebar_option'); ?>
            <article <?php if (!empty($sidebar)) { ?>class="medium-9 columns"<?php } ?>>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>	
            <?php if (!empty($sidebar)) { ?>
            <aside class="medium-3 columns">
                <?php dynamic_sidebar('page-sidebar'); ?>
            </aside>
            <?php }; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
