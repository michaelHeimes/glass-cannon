<?php
/**
 * Template Name: Androids & Aliens
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Glass_Cannon
 */

get_header(); ?>

	 <h1 class="big-title"><?php the_title();?></h1>
	 
	 <div id="podcast-intro">
	 	<?php
		while ( have_posts() ) : the_post();
		the_content();
		endwhile; // End of the loop.
		?>
	 </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">			

		<?php
		  // set up or arguments for our custom query
		  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		  $query_args = array(
		    'post_type' => 'post',
		    'category_name' => 'androidsandaliens',
		    'posts_per_page' => 7,
		    'paged' => $paged
		  );
		  		$classes = array(
					'podcast-preview',
					'wow',
					'slideInUp',
				);
		  // create a new instance of WP_Query
		  $the_query = new WP_Query( $query_args );
		?>
		
		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
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
						<p class="podcast-episode-number"><span>Episode <?php the_field('episode_number'); ?></span></p> • <p class="podcast-episode-date"><span><?php echo get_the_date('F j, Y'); ?></span></p>
						</div><!-- .entry-meta -->
						<?php the_content(); ?>
					</div>
					<a class="podcast-listen-button" href="<?php the_permalink()?>">Listen <i class="fa fa-play" aria-hidden="true"></i></a>			
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
		<?php endwhile; ?>
		
		<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			<nav id="page_numbers" class="wow fadeIn" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".3"><?php
			$big = 999999999; // need an unlikely integer
			
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'show_all' => false,
				'end_size' => 3,
				'mid_size' => 3,
				'prev_next' => false,
				'prev_text' => false,
				'current' => max( 1, get_query_var('paged') ),
				'total' => $the_query->max_num_pages
			) );
			?>
			</nav>
		<nav  id="archive-navigation">
		    <div id="pod-nav-previous" class="blog-nav-link wow slideInLeft">
		      <?php echo get_next_posts_link( '<i class="fa fa-angle-double-left" aria-hidden="true"></i>Older', $the_query->max_num_pages ); // display older posts link ?>
		    </div>
		    <div id="pod-nav-next" class="blog-nav-link wow slideInRight">
		      <?php echo get_previous_posts_link( '<i class="fa fa-angle-double-right" aria-hidden="true"></i>Newer' ); // display newer posts link ?>
		    </div>
		</nav>
		<?php } ?>
		
		<?php else: ?>
		  <article>
		    <h1>Sorry...</h1>
		    <p><?php _e('nothing is here!'); ?></p>
		  </article>
		<?php endif; ?>		
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
