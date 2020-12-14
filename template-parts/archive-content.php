<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Glass_Cannon
 */

?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".3">
					<div class="podcast-preview-wrap-corners-left"></div>
					<div class="podcast-preview-wrap-corners-right"></div>		
				<div class="podcast-preview-wrap">
					<div class="podcast-preview-left">	
						<h2 class="podcast-preview-title"><?php echo get_the_title(); ?></h2>
						<div class="podcast-preview-thumb-wrap under-tab">	
						<?php if ( has_post_thumbnail()): ?>
					<?php the_post_thumbnail('podcast_preview');?>
					<?php else :?>
						<img src="http://glass-cannon-2.local/wp-content/uploads/2017/07/no-thumb.png" ?>
						<?php endif; ?>
						</div>
						<div class="podcast-preview-content">
							<div class="podcast-preview-entry-meta">
							<?php if(is_category('blog-post')):?>
							<p class="podcast-episode-number"><span>By <?php the_author(); ?></span></p> • <?php endif;?><p class="podcast-episode-date"><span><?php echo get_the_date('F j, Y'); ?></span></p>
							</div><!-- .entry-meta -->
							<?php the_excerpt(); ?>
						</div>
						<a class="podcast-listen-button" href="<?php the_permalink()?>">Read</a>			
					</div>
		
					<div class="podcast-preview-right">	
						<div class="podcast-preview-thumb-wrap over-tab">	
						<?php if ( has_post_thumbnail()): ?>
					<?php the_post_thumbnail('podcast_preview');?>
					<?php else :?>
						<img src="http://glass-cannon-2.local/wp-content/uploads/2017/07/no-thumb.png" ?>
			<?php endif; ?>
						</div>
					</div>			
				</div>	
			</article>

