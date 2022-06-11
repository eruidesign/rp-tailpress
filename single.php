<?php get_header(); ?>


	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="hero min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'banner-1440x600');?>);">
				<div class="hero-overlay bg-opacity-60"></div>
				<div class="hero-content text-center text-neutral-content">
					<div class="max-w-md">
					<h1 class="mb-5 text-5xl font-bold"><?php the_title();?></h1>
					<p class="mb-5"><?php the_excerpt();?></p>
					</div>
				</div>
			</section>

			<div class="container mx-auto">

				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
					}
				?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			</div>

		<?php endwhile; ?>

	<?php endif; ?>

<?php
get_footer();
