<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mainstreetbank
 */

get_header();

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 1,
    'order'          => 'DESC'
 );

$recentHeaderPost = new WP_Query( $args );

if(empty(get_the_post_thumbnail_url())){
  $displayImage = 'https://msbdev.wpengine.com/wp-content/themes/mainstreetbank/mainstreetbank/images/banner-bg.png';
}else{
  $displayImage = get_the_post_thumbnail_url($recentHeaderPost->ID());
}
?>

<?php	while ( $recentHeaderPost->have_posts() ) : $recentHeaderPost->the_post(); ?>
<!-- <div class="block_header_wrapper" style="background:url('<__php echo $displayImage; ?>')center center/cover no-repeat;">

	<div class="container">

			<div class="row">

					<div class="col-lg-7 col-sm-9 col-xs-12 left_text">

							<div class="mini_header">

									<img src="<__php echo get_template_directory_uri() . "/images/header_diamond.svg" ?>">

									<h3> <__php echo get_field('subtitle'); ?> </h3>

							</div>

							<h1> <__php the_title(); ?> </h1>

							<a href="<__php echo the_permalink(); ?>"> Read More </a>

					</div>
					<div class="col-lg-4 col-sm-3 col-xs-12">
					</div>

			</div>

	</div>

</div> -->


<?php while ( $recentHeaderPost->have_posts() ) : $recentHeaderPost->the_post(); ?>
<div class="header-img-elements-wrapper"> 

    <div 
    style="background:url('<?php echo $displayImage; ?>')center center/cover no-repeat;">> </div>


    <div class="blog_header"> 

        <div class="elements">
    
            <div class="subtitle_header">
                <img src="<?php echo get_template_directory_uri() . "/images/header_diamond_blue.svg" ?>">
                <h3> <?php echo get_field('subtitle'); ?> </h3>
            </div>

            <h1> <?php the_title(); ?> ?> </h1> 

            <a href="<?php echo the_permalink(); ?>"> 
                Read More
            </a>

        </div>

    </div> 

</div>


<?php endwhile ?>






<!-- <div class="container"> -->
	<div id="primary" class="content-area ">
		<main id="main" class="site-main">
			<div class="container">
				<div class="blog__filter">
				<h2>Filter</h2>
				<div class="category__filter">
					<div class="filter_flex">
						<div id="filter_title" class="filter_title_desktop desktop">
							<img src="<?php echo get_template_directory_uri(); ?>/images/filter-icon.svg" alt="Filter Icon"> Filter By:
						</div>
						<div class="right_filter">
              <div class="filter_title_mobile mobile">Filter</div>
							<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
								<?php
								if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name', 'exclude' => get_cat_ID('all') ) ) ) :

									foreach ( $terms as $term ) :
								echo '<label class="category ' . $term->slug . ' in_loop"><input type="checkbox" name="category-' . $term->slug . '" value="' . $term->term_id . '" />' . $term->name . '</label>';

							endforeach; ?>
							<label class="clear_category"> <input type="checkbox" name="category-all" value="8">x Clear Filters</label>
					<?php	endif;
					?>
					<input type="hidden" name="action" value="myfilter">
					</form>
					<div class="search">
						<?php get_search_form();?>
					</div>
						</div>

					</div>
				</div>
			</div>
			</div><!--.container -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- </div> -->

<!-- Loop for all posts -->

<?php
$args2 = array(
    'post_type'      => 'post',
    'posts_per_page' => 13,
    'order'          => 'DESC',
    'paged'          => get_query_var( 'paged' )
 );

$wp_query = new WP_Query( $args2 ); ?>
<div class="blog__archive" id="response">
      <?php
      if ( $wp_query->have_posts() ){ ?>
        <div class="row">
          <!-- Serve different styles based on the index of the blog post-->
          <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
                  $index = $wp_query->current_post + 1;
            ?>

          <?php if($index == 1 || $index == 2 || $index == 3 || $index == 6 || $index == 7 || $index == 8 || $index == 9 || $index == 10 || $index == 11){ ?>
            <div class="blog__three_column" id="<?php echo 'blog-' .$index; ?>">
              <?php get_template_part( 'template-parts/content', 'blog-col-three' ); ?>
            </div>
          <?php } ?>

          <?php if($index == 4 || $index == 5 || $index == 12 || $index == 13){ ?>
            <div class="blog__two_column" id="<?php echo 'blog-' .$index; ?>">
              <?php get_template_part( 'template-parts/content', 'blog-col-two' ); ?>
            </div>
          <?php } ?>

      <?php endwhile; ?>
    </div>

      <?php

      wp_reset_postdata();
    } ?>

</div>
<div class="pagination">

<?php
$path = get_template_directory_uri() ;
$total = $wp_query->max_num_pages;
// Only paginate if we have more than one page
  if ( $total > 1 )  {
       // Get the current page
       if ( !$current_page = get_query_var('paged') )
            $current_page = 1;
       // Structure of “format” depends on whether we’re using pretty permalinks
       $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
       echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => $format,
            'current' => $current_page,
            'total' => $total,
            'mid_size' => 4,
            'type' => 'list',
            'prev_text' => '<img src="'. $path .'/images/left-arrow.svg"\'/>',
            'next_text' => '<img src="'. $path .'/images/right-arrow.svg"\'/>'
       ));
  }
?>
</div>

<?php
get_footer();
