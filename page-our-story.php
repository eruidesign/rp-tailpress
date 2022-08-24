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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header mb-4">
    <?php //the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
</header>

<div class="entry-content">
    <?php the_content(); ?>


    <?php 
        $args = array( 'post_type' => 'team-members');
        $the_query = new WP_Query( $args ); 
    ?>
    
    <?php if ( $the_query->have_posts() ) : ?>

        <h2>Mett Our Team</h2>
        
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>




        <div class="max-w-3xl mx-auto z-10">
            <div class="flex flex-col">
                <div class="bg-white border border-white shadow-lg  rounded-3xl p-4 m-4">
                    <div class="flex-none sm:flex">
                        <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                            <?php the_post_thumbnail('thumbnail');?>
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

                                            <details class="question">

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



    <?php
        wp_link_pages(
            array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            )
        );
    ?>
</div>

</article>

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
