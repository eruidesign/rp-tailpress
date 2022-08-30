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
				
				<div class="hero-content p-8 bg-rpgray-900 basis-[32rem] text-white order-1 flex items-center">
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

                    $ID_1 = get_term_by( 'slug', 'wam', 'product_cat' )->term_id;
                    $ID_2 = get_term_by( 'slug', 'sos', 'product_cat' )->term_id;

                ?>

                <?php
                    $products_categories = get_terms( 'product_cat', array(
                        'include' => array( $ID_1,$ID_2 ),
                        'hide_empty' => false,
                    ) );
                ?>

                <?php if ( ! empty( $products_categories ) && ! is_wp_error( $products_categories ) ) : ?>

                <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    
                    <?php foreach ($products_categories as $cat) : ?> 
			
                        <div class="overflow-hidden rounded-lg bg-white border border-stone-100 flex flex-col">
                            <div class="text-center flex-grow">
                                <?php
                                    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                                    $image = wp_get_attachment_image_url( $thumbnail_id, 'woocommerce_thumbnail' );
                                ?>
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo $image;?>" alt="<?php echo $cat->name;?>" class="w-full"/>
                                <?php else : ?>
                                    <div class="w-[100%] aspect-square bg-slate-400"></div>
                                <?php endif;?>
                                <h3 class="my-4 text-xl"><?php echo $cat->name;?></h3>
                                <!--<div class="text-gray-400"><?php echo $cat->description;?></div>-->
                            </div>
                            <div class="p-4 flex">
                                <a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-rpgreen-900 text-white text-center no-underline rounded p-2 justify-self-end hover:bg-rpgreen-500 transition-all">Discover <?php echo $cat->name;?><span> →</span></a>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>

                <?php endif;?>


			</div>

		<?php endwhile; ?>

	<?php endif; ?>

<?php
get_footer();
