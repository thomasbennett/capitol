        <footer>
            <div class="row">
                <ul class="social">
                    <li><a href="http://www.facebook.com/"><img src="http://sites.umgnashville.com/artist_site_files/icons/facebook-icon.png"></a></li>
                    <li><a href="http://www.twitter.com/"><img src="http://sites.umgnashville.com/artist_site_files/icons/twitter-icon.png"></a></li>
                    <li><a href="http://www.youtube.com/"><img src="http://sites.umgnashville.com/artist_site_files/icons/youtube-icon.png"></a></li>
                    <li><a href="http://www.instagram.com/"><img src="http://sites.umgnashville.com/artist_site_files/icons/instagram-icon.png"></a></li>
                    
                </ul>

                <nav>
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'footer-menu',
                        'container'       => 'ul', 
                        'container_class' => 'footer-nav', 
                        'fallback_cb'     => '',
                    )); ?>
                </nav>

                <?php 
                $copyright = carbon_get_theme_option('capitol_copyright');
                if (!empty($copyright) && $copyright !== 1) { ?>
                    <p class="copyright"><?php echo str_replace('{year}', date('Y'), $copyright); ?></p>
                <?php } ?>
            </div>
        </footer>

        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

        <?php wp_footer(); ?>
    </body>
</html>
