<?php
/**
 * Template for displaying single course
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

// Prepare the nav items
$course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), get_the_ID() );

tutor_utils()->tutor_custom_header();
do_action('tutor_course/single/before/wrap');
?>
<div class="container my-8 mx-auto">

<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="mb-8">','</div>' );
	}
?>

<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap tutor-wrap-parent'); ?>>
    <div class="tutor-course-details-page">
        <?php (isset($is_enrolled) && $is_enrolled) ? tutor_course_enrolled_lead_info() : tutor_course_lead_info(); ?>
        <div class="tutor-row tutor-gx-xl-5">
            <main class="tutor-col-xl-8">
                <?php tutor_utils()->has_video_in_single() ? tutor_course_video() : get_tutor_course_thumbnail(); ?>
	            <?php do_action('tutor_course/single/before/inner-wrap'); ?>
                <div class="tutor-course-details-tab tutor-mt-32">
                    <div class="tutor-is-sticky">
                        <?php tutor_load_template( 'single.course.enrolled.nav', array('course_nav_item' => $course_nav_item ) ); ?>
                    </div>
                    <div class="tutor-tab tutor-pt-24">
                        <?php foreach( $course_nav_item as $key => $subpage ) : ?>
                            <div id="tutor-course-details-tab-<?php echo $key; ?>" class="tutor-tab-item<?php echo $key == 'info' ? ' is-active' : ''; ?>">
                                <?php
                                    do_action( 'tutor_course/single/tab/'.$key.'/before' );
                                    
                                    $method = $subpage['method'];
                                    if ( is_string($method) ) {
                                        $method();
                                    } else {
                                        $_object = $method[0];
                                        $_method = $method[1];
                                        $_object->$_method(get_the_ID());
                                    }

                                    do_action( 'tutor_course/single/tab/'.$key.'/after' );
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
	            <?php do_action('tutor_course/single/after/inner-wrap'); ?>
            </main>

            <aside class="tutor-col-xl-4">
                <div class="tutor-single-course-sidebar tutor-mt-40 tutor-mt-xl-0">
                    <?php do_action('tutor_course/single/before/sidebar'); ?>
                    <?php //(isset($is_enrolled) && $is_enrolled) ? tutor_course_enrolled_lead_info() : tutor_course_lead_info(); ?>
                    <?php tutor_load_template('single.course.course-entry-box'); ?>
                    <?php tutor_course_requirements_html(); ?>
                    <?php tutor_course_tags_html(); ?>
                    <?php tutor_course_target_audience_html(); ?>
                    <?php do_action('tutor_course/single/after/sidebar'); ?>
                </div>
            </aside>
        </div>
    </div>
</div>

</div><!-- /.container -->
<?php

    //$post_id = get_the_ID(); 

    global $post; 

    $post_id = $post->ID; 

    $has_product_id = get_post_meta( $post_id, '_tutor_course_product_id', true );
    $product_id = get_post_meta( $post_id, '_tutor_course_product_id' );

?>

<?php if( $has_product_id ) : ?>
    <?php //$products = wc_get_product( $product_id[0] );?>
    <pre><?php //print_r($products);?></pre>
<?php
    $query = new WC_Product_Query( array(
    'p' => $product_id,
) );
?>
<?php $products = $query->get_products();?>
<pre><?php print_r($products);?></pre>
<?php while ( $products->have_posts() ) : ?>
		<?php $products->the_post(); ?>
		<?php wc_get_template_part( 'content', 'single-product' ); ?>
	<?php endwhile; // end of the loop. ?>

<?php endif;?>

<?php do_action('tutor_course/single/after/wrap'); ?>

<?php
tutor_utils()->tutor_custom_footer();
