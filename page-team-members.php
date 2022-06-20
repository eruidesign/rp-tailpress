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
                            <div  class="w-32 h-32 object-cover rounded-2xl bg-gray-500 text-white"><?php the_title(); ?></div>
                        </div>
                        
                        <div class="flex-auto sm:ml-5 justify-evenly">
                            <div class="flex items-center justify-between sm:mt-2">
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <h2 class="w-full flex-none text-lg text-gray-800 font-bold leading-none"><?php the_title(); ?></h2>
                                        <div class="flex-auto text-gray-500 my-1">
                                            <span class="mr-3 "><?php the_excerpt(); ?> </span>
                                        </div>
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

    <div class="app min-h-screen bg-grey-lightest font-sans overflow-hidden">

  <div class="h-32 flex items-center justify-center bg-indigo">
    <h1 class="text-2xl text-white -mt-8">Details &amp; Summary</h1>
  </div>

  <div class="wrapper border-b-2 -mt-8 bg-white overflow-hidden mx-auto max-w-md rounded shadow-lg">

    <h3 class="bg-grey-lightest px-8 py-6 font-semibold">Frequently Asked Questions</h3>

    <div class="question-wrap mx-8 mt-2">
      <details class="question py-4 border-b border-grey-lighter">

        <summary class="flex items-center font-bold">My childhoood
          <button class="ml-auto">
          <svg class="fill-current opacity-75 w-4 h-4 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </button>
        </summary>

        <div class="mt-4 leading-normal text-md ">I lived near lake Eerie and I really miss sunsets over the water. Fuga perspiciatis quidem sunt animi.  We can all grab at the chance to be handsome farmers. YEAH you can have 21 sons that'll be blood when they marry my daughters. And the pain that we left at the station will stay in a jar behind us. We can pickle the pain into blue ribbon winners at county contests....
        Gosh. I loved her to bits</div>
      </details>

      <details class="question py-4 border-b border-grey-lighter">

        <summary class="flex items-center">Ex nihilo nihil
          <button class="ml-auto">
          <svg class="fill-current opacity-75 w-4 h-4 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </button>
        </summary>

        <div class="mt-4 leading-normal text-md">
 <p>ništavilo se vraća sebi kao sve u svemu</p>
        </div>
      </details>

      <details class="question py-4 border-b border-grey-lighter">

        <summary class="flex items-center">Estuarij iznad rijeke [r]iverice
          <button class="ml-auto">
          <svg class="fill-current opacity-75 w-4 h-4 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
        </button>
        </summary>

        <div class="mt-4 leading-normal text-md ">Zašto pitaš mene? Pitaj šulasice. Question remains - should I invest in a bycicle? ! 
          Estuarij iznad rijeke Iverice [riverice].</div>
      </details>
    </div>

  </div>
  
</div>

</div>

<?php
get_footer();