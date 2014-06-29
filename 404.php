<?php get_header(); ?>

	<!-- Main -->
	<div id="main">
		<div class="shell">
			<div class="post">
				<h2>404 not found</h2>
				<p><?php printf(__('Please check the URL for proper spelling and capitalization.<br/>If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>'), get_option('home')); ?></p>
			</div>
		</div>
	</div>
	<!-- End of Main -->

<?php get_footer(); ?>