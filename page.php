<?php
/**
 * The template for displaying all pages
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
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php if(is_cart() || is_account_page() || is_checkout() ):?>
			<div id="back-to-store-link-wrap" class="back-to-store-link-wrap-no-pad">
				<a id="back-to-store-link" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ));?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span>Back To Store</span></a>
			</div>
			<?php endif;?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
