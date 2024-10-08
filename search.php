<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package 2HatsLogic
 */

get_header();
?>

	<main class="page-wrap py-5">
	<section class="search-results relative pt-100 xs:pt-60 pb-100 md:pb-60 " id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container relative z-1">
         <div class="title w-100 flex justify-between sm:wrap">
                <h1 class="h1-sml w-100 sm:mb-20">
                    <?php /* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'hatslogic' ), '<span>' . get_search_query() . '</span>' );
						?></h1>
                <div class="flex w-100 justify-end gap-20 align-end">
                    <div class="form-group max-w-58 md:max-w-100">
                        <form role="search" method="get" id="searchform" class="searchform"
                            action="<?php echo home_url('/'); ?>">
                            <input type="search" class="form-control lined" placeholder="Search Blog here"
                                value="<?php echo get_search_query(); ?>" name="s" id="s" aria-label="Search">
                            <input type="hidden" name="post_type" value="post">
                        </form>
                    </div>
                </div>
            </div>
		

			<div class="content mt-60 sm:mt-40 xs:mt-30 align-start md:wrap flex gap-40">
                <div class="w-70 md:w-100 md:w-100">
                    <div class="grid grid-2 md:grid-2 xs:grid-1 cg-30 rg-50 md:rg-30 w-100 grid grid-2 md:grid-2 xs:grid-1 cg-40 rg-60 md:rg-40">
                <?php if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
		</div>
		<div class="w-30 md:w-100 pl-30 b-0 bl-1 solid bc-hash md:pl-20 md:b-1 solid bc-hash md:p-30 sticky top-120 md:mt-30">
                    <div class="w-100 mb-60 md:mb-30">
                        <div class="title mb-20">
                            <h2 class="h4">Most popular</h2>

                        </div>
                        <div class="content">
                            <ul class="fs-16 no-bullets">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 4,
                                    'orderby' => 'meta_value_num',
                                    'order' => 'DESC',
                                );
                                $popular_posts = new WP_Query($args);
                                if ($popular_posts->have_posts()):
                                    while ($popular_posts->have_posts()):
                                        $popular_posts->the_post();
                                        ?>
                                        <li class="b-0 bb-1 solid bc-hash mb-20 pb-10">
                                            <a href="<?php the_permalink(); ?>" class="no-decoration"><?php the_title(); ?></a>
                                        </li>
                                        <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="title mb-20">
                            <h2 class="h4">Categories</h2>

                        </div>
                        <div class="content">
                            <ul class="list no-bullets flex wrap cg-20 rg-5">
                                <?php
                                $categories = get_categories();
                                foreach ($categories as $category):
                                    ?>
                                    <li><a href="<?php echo get_category_link($category->term_id); ?>"
                                            class="no-decoration fs-16"><?php echo $category->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
		</div>	
		</div>
        <div class="bg-shape absolute z-0 right-0 top-0 w-60  h-px-500 md:w-80">
            <picture class="shape w-100 absolute -top-10">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.webp 2x" media="(min-width: 768px)" type="image/webp">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 2x" media="(max-width: 767px)" type="image/webp">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x" media="(min-width: 768px)" type="image/jpg">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 2x" media="(max-width: 767px)" type="image/jpg">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" alt="search" width="100" height="100">
            </picture>
        </div>
    </section>
	</main><!-- #main -->

<?php

get_footer();
