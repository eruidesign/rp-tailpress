<?php get_header(); ?>

<?php
    $section_1_ID = 263; //Homepage
    $section_1 = get_post($section_1_ID);
    
    $section_2_ID = 2; //About Us
    $section_2 = get_post($section_2_ID);

    $section_3_ID = 300; //Coaching
    $section_3 = get_post($section_3_ID);
    
    $section_4_ID = 15; //Curriculum
    $section_4 = get_post($section_4_ID);

    $section_5_ID = 8; //Shop
    $section_5 = get_post($section_5_ID);
?>

<section class="hero min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($section_1_ID,'banner-1440x600');?>);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
        <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        </div>
    </div>
</section>

<section class="<?php echo $section_2->post_name;?>">
    <div class="container mx-auto py-10 section-header">
        <h1 class="mb-5 text-5xl text-gray-700 uppercase font-bold"><?php echo $section_2->post_title;?></h1>
        <p class="section-description text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illo, consequatur voluptatibus iure sequi saepe earum tempora est eligendi, excepturi sint alias praesentium. Provident, modi quo minus reiciendis ipsa possimus?</p>
    </div>
    <div class="min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($section_2_ID,'banner-1440x600');?>);">
        <div class="container mx-auto">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content">
                <div class="max-w-md">
                    <p class="py-10">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                    <a href="<?php echo get_permalink($section_2_ID);?>" class="btn btn-primary bg-gray-500/50 text-white p-2 px-8 rounded hover:bg-gray-500"><?php echo $section_2->post_title;?><span> →</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="<?php echo $section_3->post_name;?>">
    <div class="container mx-auto section-header py-10">
        <h1 class="mb-5 text-5xl text-rppurple-900 uppercase font-bold"><?php echo $section_3->post_title;?></h1>
        <p class="section-description text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illo, consequatur voluptatibus iure sequi saepe earum tempora est eligendi, excepturi sint alias praesentium. Provident, modi quo minus reiciendis ipsa possimus?</p>
    </div>
    <div class="min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($section_3_ID,'banner-1440x600');?>);">
        <div class="container mx-auto">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content">
                <div class="max-w-md">
                <p class="py-10">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <a href="<?php echo get_permalink($section_3_ID);?>" class="btn btn-primary bg-rppurple-900/50 text-white p-2 px-8 rounded hover:bg-rppurple-900"><?php echo $section_3->post_title;?><span> →</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="<?php echo $section_4->post_name;?>">
    <div class="section-header container mx-auto py-10">
        <h1 class="mb-5 text-5xl text-rpgreen-900 uppercase font-bold"><?php echo $section_4->post_title;?></h1>
        <p class="section-description text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illo, consequatur voluptatibus iure sequi saepe earum tempora est eligendi, excepturi sint alias praesentium. Provident, modi quo minus reiciendis ipsa possimus?</p>
    </div>
    <div class="min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($section_4_ID,'banner-1440x600');?>);">
        <div class="container mx-auto">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content">
                <div class="max-w-md">
                <p class="py-10">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <a href="<?php echo get_permalink($section_4_ID);?>" class="btn btn-primary bg-rpgreen-900/50 text-white p-2 px-8 rounded hover:bg-rpgreen-900"><?php echo $section_4->post_title;?><span> →</span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="<?php echo $section_5->post_name;?>">
    <div class="section-header container mx-auto py-10">
        <h1 class="mb-5 text-5xl text-gray-700 uppercase font-bold"><?php echo $section_5->post_title;?></h1>
        <p class="section-description text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab illo, consequatur voluptatibus iure sequi saepe earum tempora est eligendi, excepturi sint alias praesentium. Provident, modi quo minus reiciendis ipsa possimus?</p>
    </div>
    <div class="bg-gray-800 py-20">
        <div class="container mx-auto min-h-[600px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

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
            </div>
            <div class="bg-white rounded-lg flex flex-col">
                <div class="aspect-square bg-gray-500 rounded-tl-lg rounded-tr-lg">
                </div>
                <div class="p-4 text-center flex-grow">
                    <p>Some text here</p>
                </div>
                <a href="" class="bg-gray-500 text-white text-center rounded p-2 justify-self-end m-4 mt-0 hover:bg-gray-400">Click Here<span> →</span></a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
