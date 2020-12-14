<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Glass_Cannon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<?php
	if ( has_post_thumbnail() ):
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'title_bg' );?>
	<header class="entry-header" style="background-image: url('<?php echo $thumb['0'];?>')">
	<?php else: ?>
	<header class="entry-header" style="background: #a1a1a1">
	<?php endif?>

	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	<?php
	// vars	
	$mask = get_field('image_mask');
	// check
	if( $mask ): ?>
	<div id="entry-header-mask"></div>
	<?php endif; ?>	
		
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glass-cannon' ),
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
							__( 'Edit <span class="screen-reader-text">%s</span>', 'glass-cannon' ),
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
