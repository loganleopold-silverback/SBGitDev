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
