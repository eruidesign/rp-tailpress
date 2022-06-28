<?php get_header(); ?>

<?php
    $section_1_ID = 263; //Homepage
    $section_1 = get_post($section_1_ID);
    
    $section_2_ID = 2; //About Us
    $section_2 = get_post($section_2_ID);

    $link_1_ID = 380; //Meet our team
    $link_1 = get_post($link_1_ID);

    $section_3_ID = 15; //Coaching
    $section_3 = get_post($section_3_ID);
    
    $section_4_ID = 300; //Curriculum
    $section_4 = get_post($section_4_ID);

    $section_5_ID = 8; //Shop
    $section_5 = get_post($section_5_ID);
?>

<section class="hero min-h-[600px] flex items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url($section_1_ID,'banner-1440x600');?>);">
    <div class="container mx-auto py-10 hero-content text-neutral-content">
        <div class="max-w-md">
        <?php echo apply_filters('the_content', $section_1->post_content);?>
        </div>
    </div>
</section>

<section class="<?php echo $section_2->post_name;?>">
    <div class="container mx-auto py-10 section-header">
        <h1 class="mb-5 text-5xl text-gray-700 uppercase font-bold"><?php echo $section_2->post_title;?></h1>
        <div class="section-description text-gray-500 font-reenie text-4xl"><?php echo apply_filters('the_content', $section_2->post_excerpt);?></div>
    </div>
    <div class="md:min-h-[600px] relative overflow-hidden">
        <img src="<?php echo get_the_post_thumbnail_url($section_2_ID,'banner-1440x600');?>" class="h-[100%] w-auto max-w-fit">
        <div class="section-container md:absolute inset-0 z-50 md:flex flex-row-reverse md:min-h-[600px]">
            <div class="p-8 order-3 shrink text-center">
                Walking through the forest<br>
                Comforted by the shade<br>
                Sunshine breaks through<br>
                Beauty beheld<br>

                So the ARTIST…<br>
                In the darkness<br>
                Imagination takes flight<br>
                Rhythms woven together<br>
                Form new stories.<br>
            </div>
            
                <svg id="shape1" viewBox="0 0 354.8 799.9" class="hidden md:block order-2 min-w-[267px]">
                    <path class="cls-1 fill-rpgray-900" d="M304.7,238.7c-18.1,145.1-36.7,295.1-190.5,507.4c-13.6,18.8-27.3,36.7-41,53.8h281.6V0
                    C323.8,85.1,314.5,159.8,304.7,238.7z"/>
                    <path class="cls-2 fill-rpgray-900" d="M284.8,236.3c9.7-78,18.9-151.9,48.7-236.3h-31.4c-26.8,82.6-36,156.9-45,229c-17.6,141.5-34.2,275-176.1,470.9
                    c-26.8,37-53.6,70.1-81.1,100h47.3c17-20.5,33.9-42.3,50.7-65.5C248.7,526.2,267.1,378.8,284.8,236.3z"/>
                </svg>
            
            <div class="hero-content p-8 bg-rpgray-900 basis-[32rem] text-white order-1">
                <?php echo apply_filters('the_content', $section_2->post_content);?>
                <a href="<?php echo get_permalink($link_1_ID);?>" class="btn btn-primary bg-white text-black p-2 px-8 rounded hover:bg-gray-500"><?php echo $link_1->post_title;?><span> →</span></a>
            </div>
        </div>
    </div>
</section>

<section class="<?php echo $section_3->post_name;?>">
    <div class="container mx-auto section-header py-10">
        <h1 class="mb-5 text-5xl text-rpgreen-900 uppercase font-bold"><?php echo $section_3->post_title;?></h1>
        <div class="section-description text-gray-500 font-reenie text-4xl"><?php echo apply_filters('the_content', $section_3->post_excerpt);?></div>
    </div>

    <div class="md:min-h-[600px] relative overflow-hidden">
        <img src="<?php echo get_the_post_thumbnail_url($section_3_ID,'banner-1440x600');?>" class="h-[100%] w-auto max-w-fit absolute right-0">
        <div class="section-container md:absolute inset-0 z-50 md:flex md:min-h-[600px]">
        
            <div class="hero-content p-8 bg-rpgreen-900 basis-[32rem] text-white order-1">
                <?php echo apply_filters('the_content', $section_3->post_content);?>
                <a href="<?php echo get_permalink($section_3_ID);?>" class="btn btn-primary bg-white text-black p-2 px-8 rounded hover:bg-gray-500">See what we offer<span> →</span></a>
            </div>
            <svg id="shape2" viewBox="0 0 354.8 799.9" class="hidden md:block order-2 min-w-[267px] ml-[-1px]">
                <path class="st0 fill-rpgreen-900" d="M0,0l0,799.9h281.6c-13.7-17-27.4-35-41-53.8C86.9,533.8,68.2,383.8,50.1,238.7C40.3,159.8,31,85.1,0,0z"/>
                <path class="st1 fill-rpgreen-900 opacity-3" d="M256.8,734.4c16.8,23.2,33.7,45,50.7,65.5h47.3c-28.9-31.7-56-65-81.1-99.9C131.8,504,115.2,370.5,97.6,229
	c-9-72.1-18.2-146.4-45-229L21.2,0C51,84.4,60.3,158.3,70,236.3C87.7,378.8,106.1,526.2,256.8,734.4z"/>
            </svg>
        </div>
    </div>
</section>

<section class="<?php echo $section_4->post_name;?>">
    <div class="section-header container mx-auto py-10">
        <h1 class="mb-5 text-5xl text-rppurple-900 uppercase font-bold"><?php echo $section_4->post_title;?></h1>
        <div class="section-description text-gray-500 font-reenie text-4xl"><?php echo apply_filters('the_content', $section_4->post_excerpt);?></div>
    </div>

    <div class="md:min-h-[600px] relative overflow-hidden">
        <img src="<?php echo get_the_post_thumbnail_url($section_4_ID,'banner-1440x600');?>" class="h-[100%] w-auto max-w-fit">
        <div class="section-container md:absolute inset-0 z-50 md:flex flex-row-reverse md:min-h-[600px]">
            
            <svg id="shape1" viewBox="0 0 354.8 799.9" class="hidden md:block order-2 min-w-[267px]">
                <path class="cls-1 fill-rppurple-900" d="M304.7,238.7c-18.1,145.1-36.7,295.1-190.5,507.4c-13.6,18.8-27.3,36.7-41,53.8h281.6V0
                C323.8,85.1,314.5,159.8,304.7,238.7z"/>
                <path class="cls-2 fill-rppurple-900" d="M284.8,236.3c9.7-78,18.9-151.9,48.7-236.3h-31.4c-26.8,82.6-36,156.9-45,229c-17.6,141.5-34.2,275-176.1,470.9
                c-26.8,37-53.6,70.1-81.1,100h47.3c17-20.5,33.9-42.3,50.7-65.5C248.7,526.2,267.1,378.8,284.8,236.3z"/>
            </svg>
            
            <div class="hero-content p-8 bg-rppurple-900 basis-[32rem] text-white order-1">
                <?php echo apply_filters('the_content', $section_4->post_content);?>
                <a href="<?php echo get_permalink($section_4_ID);?>" class="btn btn-primary bg-white text-black p-2 px-8 rounded hover:bg-rppurple-500">See what we offer<span> →</span></a>
            </div>
        </div>
    </div>
</section>

<section class="<?php echo $section_5->post_name;?>">
    <div class="section-header container mx-auto py-10">
        <h1 class="mb-5 text-5xl text-gray-700 uppercase font-bold"><?php echo $section_5->post_title;?></h1>
        <div class="section-description text-gray-500 font-reenie text-4xl"><?php echo apply_filters('the_content', $section_5->post_excerpt);?></div>
    </div>
    <div class="bg-gray-800 py-20">
        <div class="container mx-auto min-h-[600px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">

            <?php
                $args = array(
                    'taxonomy'	=> 'product_cat',
                    'exclude'	=> array(23,32), //Exclude: Uncategorized, Art Courses
                    'hide_empty' => false
                );
                $products_categories = get_terms( $args );
            ?>
        
            <?php foreach ($products_categories as $cat) : ?> 
                <div class="overflow-hidden rounded-lg bg-white flex flex-col">
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
                        <div class="text-gray-400"><?php echo $cat->description;?></div>
                    </div>
                    <div class="p-4 flex">
                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-gray-500 text-white text-center rounded p-2 justify-self-end hover:bg-gray-400">More<span> →</span></a>
                    </div>
                    
                </div>
            <?php endforeach;?>

            <!--<div class="bg-white rounded-lg flex flex-col">
                <div class="aspect-square bg-gray-500 rounded-tl-lg rounded-tr-lg">
                </div>
                <div class="p-4 text-center flex-grow">
                    <p>Some text here</p>
                </div>
                <a href="" class="bg-gray-500 text-white text-center rounded p-2 justify-self-end m-4 mt-0 hover:bg-gray-400">Click Here<span> →</span></a>
            </div>
            <div class="bg-white rounded-lg flex flex-col">
                <div class="aspect-square bg-gray-500 rounded-tl-lg rounded-tr-lg">
                </div>
                <div class="p-4 text-center flex-grow">
                    <p>Some text here</p>
                </div>
                <a href="" class="bg-gray-500 text-white text-center rounded p-2 justify-self-end m-4 mt-0 hover:bg-gray-400">Click Here<span> →</span></a>
            </div>
            <div class="bg-white rounded-lg flex flex-col">
                <div class="aspect-square bg-gray-500 rounded-tl-lg rounded-tr-lg">
                </div>
                <div class="p-4 text-center flex-grow">
                    <p>Some text here</p>
                </div>
                <a href="" class="bg-gray-500 text-white text-center rounded p-2 justify-self-end m-4 mt-0 hover:bg-gray-400">Click Here<span> →</span></a>
            </div>
            <div class="bg-white rounded-lg flex flex-col">
                <div class="aspect-square bg-gray-500 rounded-tl-lg rounded-tr-lg">
                </div>
                <div class="p-4 text-center flex-grow">
                    <p>Some text here</p>
                </div>
                <a href="" class="bg-gray-500 text-white text-center rounded p-2 justify-self-end m-4 mt-0 hover:bg-gray-400">Click Here<span> →</span></a>
            </div>-->
        </div>
    </div>
</section>

<?php
get_footer();
