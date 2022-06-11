<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header mb-4">
		<?php //the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>


        <?php
            $postid = get_the_ID();
            $pages = get_pages( array( 'child_of' => $postid, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );
        ?>
        <?php if($pages) : ?>
            <div class="grid grid-cols-4 gap-4 mb-8">
                <?php foreach ($pages as $page) : ?> 
                    <div class="border rounded-lg p-4">
                        <h3><?php echo $page->post_title; ?></h3>
                        <a href="<?php echo get_page_link( $page->ID ); ?>">More in <?php echo $page->post_title; ?><span> →</span></a>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>

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
