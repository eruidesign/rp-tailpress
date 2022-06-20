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
        $args = array( 'post_type' => 'team-members');
        $the_query = new WP_Query( $args ); 
    ?>
    
    <?php if ( $the_query->have_posts() ) : ?>
        
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>




        <div class="max-w-3xl mx-auto z-10">
            <div class="flex flex-col">
                <div class="bg-white border border-white shadow-lg  rounded-3xl p-4 m-4">
                    <div class="flex-none sm:flex">
                        <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                            <div  class="w-32 h-32 object-cover rounded-2xl bg-gray-500 text-white p-4"><?php the_title(); ?></div>
                        </div>
                        
                        <div class="flex-auto sm:ml-5 justify-evenly">
                            <div class="flex items-center justify-between sm:mt-2">
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <h2 class="w-full flex-none text-lg text-gray-800 font-bold leading-none"><?php the_title(); ?></h2>
                                        <div class="flex-auto text-gray-500 my-1">
                                            <span class="mr-3 "><?php the_excerpt(); ?> </span>
                                        </div>

                                        <?php if ( get_the_content() ) :?>

                                            <details class="question py-4 border-b">

                                                <summary class="flex items-center text-rppurple-500">More
                                                <button>
                                                <svg class="fill-rppurple-500 opacity-75 w-4 h-4 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                                                </button>
                                                </summary>

                                                <div class="mt-4 leading-normal text-md "><?php the_content();?></div>
                                            </details>

                                        <?php endif;?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php endwhile;
        wp_reset_postdata(); ?>
    
    <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

   
  
</div>

<?php
get_footer();