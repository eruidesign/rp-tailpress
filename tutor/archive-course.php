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

<section class="hero min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($curriculum_ID,'banner-1440x600');?>);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="container mx-auto py-10 hero-content text-neutral-content">
        <div class="max-w-md">
        	<h1 class="mb-5 text-5xl font-bold"><?php echo $curriculum_page->post_title;?></h1>
       		<p class="mb-5"><?php echo $curriculum_page->post_excerpt;?></p>
        </div>
    </div>
</section>

<div class="container mx-auto">

	<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

	<h2 class="text-xl font-bold uppercase mb-4">Courses Categories</h2>


	<?php
		$args = array(
			'taxonomy'	=> 'course-category',
			//'exclude'	=> array(23,32), //Uncategorized, Art Courses
			'hide_empty' => false
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
						<h3 class="my-4 text-xl"><?php echo $cat->name;?></h3>
					<div class="text-gray-400 p-4 text-sm text-justify"><?php echo apply_filters('the_content', $cat->description);?></div>
				</div>
				<div class="p-4 flex">
					<a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-gray-500 text-white text-center rounded p-2 justify-self-end hover:bg-gray-400">More in <?php echo $cat->name; ?><span> →</span></a>
				</div>
			</div>

		<?php endforeach;?>

	</div>

	<h2 class="text-xl font-bold uppercase mb-4">Featured Courses</h2>

	<?php if ($course_filter && count($supported_filters)) : ?>

		<div class="tutor-wrap tutor-courses-wrap">
			<div class="tutor-course-listing-filter tutor-filter-course-grid-2 course-archive-page">
				<div class="tutor-course-filter tutor-course-filter-container">
					<div class="tutor-course-filter-widget">
						<?php tutor_load_template('course-filter.filters'); ?>
					</div>
				</div>
				<div id="tutor-course-filter-loop-container" class="<?php tutor_container_classes(); ?> tutor-course-filter-loop-container" data-column_per_row="<?php echo esc_html(tutor_utils()->get_option( 'courses_col_per_row', 3 )); ?>"><div style="background-color: #fff;" class="loading-spinner"></div>
					<?php tutor_load_template('archive-course-init'); ?>
				</div><!-- .wrap -->
			</div>
		</div>

	<?php else : ?>

		<div class="tutor-wrap tutor-courses-wrap course-archive-page">
			<div class="<?php //tutor_container_classes(); ?>	tutor-course-filter-loop-container"><div style="background-color: #fff;" class="loading-spinner"></div>
				<?php tutor_load_template('archive-course-init'); ?>
			</div>
		</div>

	<?php endif;?>

</div>

<?php
tutor_utils()->tutor_custom_footer(); ?>