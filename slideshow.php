<?php

$options = array(
    'post_type' => 'slideshow',
);

$slideshow = new WP_Query($options);

if ($slideshow->have_posts()) {
    echo '<div id="slideshow" class="home-background cycle-slideshow" 
        data-cycle-fx=fade
		data-cycle-timeout=4000
		data-cycle-speed="1200"
		data-cycle-slides=".slide",
        data-cycle-auto-height="container">'
    ;
    while ($slideshow->have_posts()) {
        $slideshow->the_post();

        $slideLink = carbon_get_post_meta(get_the_ID(), 'slide_link');
    
        if (has_post_thumbnail()) {
            echo '<div class="slide">';
            if (!empty($slideLink)) echo '<a href="'. $slideLink .'">';
                the_post_thumbnail();
            if (!empty($slideLink)) echo '</a>';
            echo '</div>';
        }        
    }
    echo '</div>';
}
