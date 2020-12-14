<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Glass_Cannon
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );?>
			
			<?php if(in_category('podcast')): ?>
			<p id="patreon-pitch">Become a supporter of the podcast at our <a href="http://www.patreon.com/glasscannon">Patreon Page</a>. You can help us unlock goals for the future while unlocking fun GCP exclusive rewards for yourself!</p>
			<?php endif; ?>
			
			<?php if(in_category('the-glass-cannon')): ?>
			<nav id="post-navigation">
			 <?php
			$prev_post = get_previous_post(true, array(5,8));
			if (!empty( $prev_post )): ?>
			  <a id="pod-nav-previous" href="<?php echo $prev_post->guid ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span>Previous Episode<br><?php echo $prev_post->post_title ?></span></a>
			<?php endif; ?>
				
			<?php
			$next_post = get_next_post(true, array(5,8));
			if (!empty( $next_post )): ?>
			  <a id="pod-nav-next" href="<?php echo $next_post->guid ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>Next Episode<br><?php echo $next_post->post_title ?></span></a>
			<?php endif; ?>
			</nav>
			
			<?php elseif(in_category('cannon-fodder')): ?>
			<nav id="post-navigation">
			 <?php
			$prev_post = get_previous_post(true, array(4,8));
			if (!empty( $prev_post )): ?>
			  <a id="pod-nav-previous" href="<?php echo $prev_post->guid ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span>Previous Episode<br><?php echo $prev_post->post_title ?></span></a>
			<?php endif; ?>
				
			<?php
			$next_post = get_next_post(true, array(4,8));
			if (!empty( $next_post )): ?>
			  <a id="pod-nav-next" href="<?php echo $next_post->guid ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>Next Episode<br><?php echo $next_post->post_title ?></span></a>
			<?php endif; ?>
			</nav>
			
			<?php elseif(in_category('podcast-3')): ?>
			<nav id="post-navigation">
			 <?php
			$prev_post = get_previous_post(true, array(4,5));
			if (!empty( $prev_post )): ?>
			  <a id="pod-nav-previous" href="<?php echo $prev_post->guid ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span>Previous Episode<br><?php echo $prev_post->post_title ?></span></a>
			<?php endif; ?>
				
			<?php
			$next_post = get_next_post(true, array(4,5));
			if (!empty( $next_post )): ?>
			  <a id="pod-nav-next" href="<?php echo $next_post->guid ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>Next Episode<br><?php echo $next_post->post_title ?></span></a>
			<?php endif; ?>
			</nav>
			
			
			
			<?php elseif(in_category('blog-post')): ?>
			<nav id="post-navigation">
			 <?php
			$prev_post = get_previous_post(true);
			if (!empty( $prev_post )): ?>
			  <a id="pod-nav-previous" href="<?php echo $prev_post->guid ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span>Previous Blog Post<br><?php echo $prev_post->post_title ?></span></a>
			<?php endif; ?>
				
			<?php
			$next_post = get_next_post(true);
			if (!empty( $next_post )): ?>
			  <a id="pod-nav-next" href="<?php echo $next_post->guid ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>Next Blog Post<br><?php echo esc_attr( $next_post->post_title ); ?></span></a>
			<?php endif; ?>
			</nav>
			<?php endif;?>


			<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
