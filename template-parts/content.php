<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Glass_Cannon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<?php
	if ( has_post_thumbnail() && !in_category('gcp-event') ):
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'title_bg' );?>
	<header class="entry-header" style="background-image: url('<?php echo $thumb['0'];?>')">
	<?php elseif(!in_category('gcp-event')): ?>
	<header class="entry-header" style="background: #a1a1a1">
	<?php endif?>
	
	
	<?php
	// vars	
	$mask = get_field('image_mask');
	// check
	if( $mask ): ?>
	<div id="entry-header-mask"></div>
	<?php endif; ?>
		
		<?php
		if ( is_singular() ) : ?>
		
		<?php if(in_category('blog-post')):?>
		<div class="entry-meta">
<!-- 			<?php glass_cannon_posted_on(); ?> -->
			<?php the_author_posts_link(); ?> • <?php the_date();?>
		</div><!-- .entry-meta -->
				<?php
		endif; ?>
		
		<?php if(in_category('podcast')): ?>
					<div class="podcast-preview-entry-meta">
					<p class="podcast-episode-number"><span>Episode <?php the_field('episode_number'); ?></span></p> • <p class="podcast-episode-date"><span><?php echo get_the_date('F j, Y'); ?></span></p>
					</div><!-- .entry-meta -->		<?php endif; ?>		
		<?php the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title">','</h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		

		

		<?php
		endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php if(in_category('gcp-event')): ?>
		<p><?php the_field('event_location'); ?></p>
		<a class="event-more-link" href="<?php the_field('event_pin_link'); ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>Event Info</span></a>
	<?php endif;?>
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'glass-cannon' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glass-cannon' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if(in_category('podcast')): ?>
		<?php the_field('blubrry_embed'); ?>
		<?php
		$galleryshortcode = get_field( 'podcast_gallery_shortcode' ); 
	    echo do_shortcode("$galleryshortcode");?>
	<?php endif;?>
	
	
	<?php if(!in_category('gcp-event')): ?>
	<footer class="entry-footer">
	<?php if(!in_category('podcast')): ?>
		<?php glass_cannon_entry_footer(); ?>
	<?php endif; ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
	
	
	
	
</article><!-- #post-<?php the_ID(); ?> -->
