<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

		<?php $banner_url = get_the_post_thumbnail_url(get_the_ID(),'banner-1440x600');?>

		<section class="md:min-h-[600px] relative overflow-hidden">
			<img src="<?php echo $banner_url;?>" class="h-[100%] w-auto max-w-fit">
			<div class="section-container md:absolute inset-0 z-50 md:flex flex-row-reverse md:min-h-[600px]">
				
				<svg id="shape1" viewBox="0 0 354.8 799.9" class="hidden md:block order-2 min-w-[267px]">
					<path class="cls-1 fill-rpgray-900" d="M304.7,238.7c-18.1,145.1-36.7,295.1-190.5,507.4c-13.6,18.8-27.3,36.7-41,53.8h281.6V0
					C323.8,85.1,314.5,159.8,304.7,238.7z"/>
					<path class="cls-2 fill-rpgray-900" d="M284.8,236.3c9.7-78,18.9-151.9,48.7-236.3h-31.4c-26.8,82.6-36,156.9-45,229c-17.6,141.5-34.2,275-176.1,470.9
					c-26.8,37-53.6,70.1-81.1,100h47.3c17-20.5,33.9-42.3,50.7-65.5C248.7,526.2,267.1,378.8,284.8,236.3z"/>
				</svg>
				
				<div class="hero-content p-8 bg-rpgray-900 basis-[32rem] text-white order-1">
					<div class="max-w-md">
						<h1 class="mb-5 text-5xl font-bold"><?php the_title();?></h1>
						<p class="mb-5"><?php the_excerpt();?></p>
					</div>
				</div>
			</div>
		</section>


			<div class="container mx-auto">

				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
					}
				?>

				<?php get_template_part( 'template-parts/content', 'single-page' ); ?>

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
