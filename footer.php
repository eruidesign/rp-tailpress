
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<div class="flex">
	<div>
		<?php echo do_shortcode('[contact-form-7 id="338" title="Contact form"]');?>
	</div>
	<div>
		<h2>More details Here</h2>
		<h3>How about this one? jhgjfshg asjfhasdfj</h3>
	</div>
</div>

<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto text-center text-gray-500">
		&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
