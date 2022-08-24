<?php

/**
 * Template for displaying courses
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.5.8
 */
tutor_utils()->tutor_custom_header();

$course_filter = (bool) tutor_utils()->get_option('course_archive_filter', false);
$supported_filters = tutor_utils()->get_option('supported_course_filters', array());

$curriculum_ID = 15;
$curriculum_page = get_post($curriculum_ID);
?>

<?php if ( is_post_type_archive() ) : ?>

<section class="md:min-h-[600px] relative overflow-hidden">
	<img src="<?php echo get_the_post_thumbnail_url($curriculum_ID,'banner-1440x600');?>" class="h-[100%] w-auto max-w-fit absolute right-0">
	<div class="section-container md:absolute inset-0 z-50 md:flex md:min-h-[600px]">
	
		<div class="hero-content p-8 bg-rpgreen-900 basis-[32rem] text-white order-1 flex items-center">
			<div class="max-w-md">
				<h1 class="mb-5 text-5xl font-bold"><?php echo $curriculum_page->post_title;?></h1>
				<p class="mb-5"><?php echo $curriculum_page->post_excerpt;?></p>
			</div>
		</div>
		<svg id="shape2" viewBox="0 0 354.8 799.9" class="hidden md:block order-2 min-w-[267px] ml-[-1px]">
			<path class="st0 fill-rpgreen-900" d="M0,0l0,799.9h281.6c-13.7-17-27.4-35-41-53.8C86.9,533.8,68.2,383.8,50.1,238.7C40.3,159.8,31,85.1,0,0z"/>
			<path class="st1 fill-rpgreen-900 opacity-3" d="M256.8,734.4c16.8,23.2,33.7,45,50.7,65.5h47.3c-28.9-31.7-56-65-81.1-99.9C131.8,504,115.2,370.5,97.6,229
c-9-72.1-18.2-146.4-45-229L21.2,0C51,84.4,60.3,158.3,70,236.3C87.7,378.8,106.1,526.2,256.8,734.4z"/>
		</svg>
	</div>
</section>

<div class="container mx-auto">

	<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

</div>

<div class="container mx-auto">

	<h2 class="text-xl font-bold uppercase mb-4">Courses Categories</h2>

	<?php
		$args = array(
			'taxonomy'	=> 'course-category',
			//'exclude'	=> array(23,32), //Uncategorized, Art Courses
			'parent'   => 0,
			'hide_empty' => false,
			'order' => 'DESC',
		);
		$courses_categories = get_terms( $args );
	?>
	<div class="grid grid-cols-4 gap-4 mb-8">
	
		<?php foreach ($courses_categories as $cat) : ?> 
			<!--<div class="border rounded-lg p-4">
				<h3><?php echo $cat->name;?></h3>
				<a href="<?php echo esc_url(get_term_link($cat));?>">More in <?php echo $cat->name;?><span> →</span></a>
			</div>-->


			<div class="border overflow-hidden rounded-lg flex flex-col">
				<div class="text-center flex-grow">
						<div class="w-full aspect-[4/3] bg-gray-400">&nbsp;</div>
						<h3 class="my-8 text-xl"><?php echo $cat->name;?></h3>
					<div class="text-gray-400 p-4 text-sm text-justify"><?php echo apply_filters('the_content', $cat->description);?></div>
				</div>
				<div class="p-4 flex">
					<a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-gray-500 text-white text-center rounded p-2 justify-self-end hover:bg-gray-400">More in <?php echo $cat->name; ?><span> →</span></a>
				</div>
			</div>

		<?php endforeach;?>

	</div>

</div>

<?php // if it' not post type archive -> it's term. We list child terms and lessons ?>
<?php else : ?>
	<?php 
		$current = get_queried_object();
	?>

	<section class="hero min-h-[600px] bg-gradient-to-r from-gray-400">
		<div class="hero-overlay bg-opacity-60"></div>
		<div class="container mx-auto py-10 hero-content text-neutral-content">
			<div class="max-w-md">
				<h1 class="mb-5 text-5xl font-bold"><?php echo $current->name;?></h1>
				<p class="mb-5"><?php echo $current->description;?></p>
			</div>
		</div>
	</section>

	<div class="container mx-auto">

	<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

	</div>

	<?php
		$args = array(
			'taxonomy'	=> 'course-category',
			//'exclude'	=> array(23,32), //Uncategorized, Art Courses
			'parent'   => $current->term_id,
			'hide_empty' => false,
			'order' => 'DESC',
		);
		$child_terms = get_terms( $args );
	?>

	<div class="container mx-auto py-10">

		<?php if($child_terms) : ?>
			<?php foreach ($child_terms as $term) : ?>
				
				<h2 class="my-4 text-4xl font-bold"><?php echo $term->name;?></h2>

				<?php 
					$args = array(  
						'post_type' => 'courses',
						'tax_query' => array(
							array(
								'taxonomy' => 'course-category',
								'field' => 'slug', //can be set to ID
								'terms' => $term->name, //if field is ID you can reference by cat/term number
							)
						)

					);
					$courses = new WP_Query( $args ); 
				?>

				<?php 
					$query_args = array(
					'post_type' => 'product',
					'tax_query' => array(
						'relation' => 'OR',
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $term->name,
						),
						array(
							'taxonomy' => 'product_type',
							'field'    => 'slug',
							'terms'    => 'woosb', 
						),
						),
					);
					$products = new WP_Query($query_args);
				?>
				
				<div class="tutor-course-list tutor-grid tutor-grid-4">
					
					<?php if ( $courses->have_posts() ) : while ( $courses->have_posts() ) : $courses->the_post(); ?>
						<div class="tutor-card tutor-course-card">
							<?php tutor_load_template( 'loop.course' );?>
							<?php //the_title(); ?>
							<?php //the_excerpt(); ?>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>

						<?php if ( $products->have_posts() ) : while ( $products->have_posts() ) : $products->the_post(); ?>
							<div class="tutor-card tutor-course-card">
								<?php wc_get_template_part( 'content', 'product-course' );?>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						<?php endif;?>

					<?php else : ?>
						<p><?php _e( 'No Courses Yet!' ); ?></p>
					<?php endif;?>

				</div>
			<?php endforeach;?>
		<?php else : ?>
			<p>No child terms, just lessons</p>
		<?php endif;?>

	</div>

<?php endif;?>

<?php
tutor_utils()->tutor_custom_footer(); ?>