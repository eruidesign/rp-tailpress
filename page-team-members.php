<?php get_header(); ?>

<?php
	$page_ID = get_queried_object_id();
	$page = get_post($page_ID);
?>

<section class="hero min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($page_ID,'banner-1440x600');?>);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
        	<h1 class="mb-5 text-5xl font-bold"><?php echo $page->post_title;?></h1>
       		<p class="mb-5"><?php echo $page->post_excerpt;?></p>
        </div>
    </div>
</section>

<div class="container mx-auto my-8">

	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>


    <?php 
        $args = array( 'post_type' => 'team-member');
        $the_query = new WP_Query( $args ); 
    ?>
    
    <?php if ( $the_query->have_posts() ) : ?>
        
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
        <h2><?php the_title(); ?></h2>
    
        <div class="entry-content">
            <?php the_excerpt(); ?> 
        </div>
        
        <?php endwhile;
        wp_reset_postdata(); ?>
    
    <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

</div>

<?php
get_footer();