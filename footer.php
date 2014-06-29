        <footer>
            <div class="row">
                <div class="large-4 columns">
                    <ul class="social">
                        <?php capitol_list_social_networks(); ?>
                    </ul>
                </div>
                <div class="large-2 columns push-1">
                    <img class="label_logo" src="<?php echo carbon_get_theme_option('capitol_label_logo'); ?>">
                </div>
                <nav class="large-4 columns">
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'footer-menu',
                        'container'       => 'ul', 
                        'container_class' => 'footer-nav', 
                        'fallback_cb'     => '',
                    )); ?>
                    <p class="copyright">&copy; UMG Nashville <?php echo date('Y'); ?></p>
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

            (function(jQuery) {
                $(".mailing-list").fancybox({
                    type : 'iframe',
                    padding : [5],
                    height: 420,
                    width: 650
                });
            });
        </script>

        <?php wp_footer(); ?>
    </body>
</html>
