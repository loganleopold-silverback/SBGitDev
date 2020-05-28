<?php
/**
 * Template part for displaying page content in general.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mainstreetbank
 */

?>
<!-- page -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 

$post_id = $post->ID;
$header_img;

if (get_the_post_thumbnail_url($post_id, 'large') == false) {
	$header_img = "https://msbdev.wpengine.com/wp-content/themes/mainstreetbank/mainstreetbank/images/page_header_img.png";
} else {
	$header_img = get_the_post_thumbnail_url($post_id, 'large');
}

?>
	<header class="entry-header" style="background-image: url('<?php echo $header_img; ?>')">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mainstreetbank' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<div class="page_relatedlinks"> 

		<?php 	

			$link_1_title = pods_field('page_link_set', 11057, 'link_1_title', true);

			$link_2_title = pods_field('page_link_set', 11057, 'link_2_title' , true);

			$link_1_description = pods_field('page_link_set', 11057, 'link_1_description' , true);

			$link_2_description = pods_field('page_link_set', 11057, 'link_2_description' , true);

			$link_1_link_text = pods_field('page_link_set', 11057, 'link_1_link_text' , true);

			$link_2_link_text = pods_field('page_link_set', 11057, 'link_2_link_text' , true);

			$link_1_link = pods_field('page_link_set', 11057, 'link_1_link' , true);

			$link_2_link = pods_field('page_link_set', 11057, 'link_2_link' , true);

		?>

		<div class="link_group">
			
			<h2> <?php echo $link_1_title; ?> </h2>
			<p> <?php echo $link_1_description; ?> </p>
			<div class="link_and_arrow">

				<a href="<?php echo $link_1_link; ?>"> <?php echo $link_1_link_text ?> </a>
				<img>

			</div>

		</div>

		
		<div class="link_group">

			<h2> <?php echo $link_2_title; ?> </h2>
			<p> <?php echo $link_2_description; ?> </p>
			<div class="link_and_arrow">

				<a href="<?php echo $link_2_link; ?>"> <?php echo $link_2_link_text ?> </a>
				<img>

			</div>
		
		</div>

	</div> 

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mainstreetbank' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
