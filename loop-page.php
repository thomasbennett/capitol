<?php if (have_posts()) : ?>
    <div class="row header-margin">
        <?php while (have_posts()) : the_post(); ?>
            <div class="medium-12">
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
            <article class="<?php if (!empty($sidebar)) { ?>medium-9<?php } else { ?>medium-12<?php } ?> columns">
                <h2><?php the_title(); ?></h2>
                <div class="main_content medium-12 columns">
                    <?php the_content(); ?>
                </div>
            </article>	
            <?php if (!empty($sidebar)) { ?>
            <aside class="medium-3 columns">
                <?php dynamic_sidebar('page-sidebar'); ?>
            </aside>
            <?php }; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
