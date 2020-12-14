<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glass_Cannon
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php if(is_shop() || is_product()  || is_cart() || is_account_page() || is_checkout()):?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<?php
			    $custom_args = array(
			      'post_type' => 'post',
			      'cat'=>('26'),
			      'posts_per_page'=> 5,
			      	'meta_query'=> array(
				            array(
				              'key' => 'event_date',
				              'compare' => '>=',
				              'value' => date("Y-m-d", strtotime("0 day")),
				              'type' => 'DATE'	))
			    );
				$custom_query = new WP_Query( $custom_args ); ?>
				<?php if ( $custom_query->have_posts() ) : ?>
				<h2 class="widget-title">Upcoming Events</h2>
			    <table id="home-events-table">
					<tbody>
				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); $date = new DateTime(get_field('event_date')); ?>			

				<tr>
						<td><?php echo $date->format('F j, Y'); ?></td>
						<td><?php the_field('event_location'); ?></td>
				</tr>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
					</tbody>
				</table>
				<div class="more-link-wrap">
					<a href="<?php get_site_url();?>/events"><span>All GCP Events</span><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
				<?php endif; ?>


</aside><!-- #secondary -->

<?php elseif(!is_shop() ):?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<?php
			    $custom_args2 = array(
			      'post_type' => 'post',
			      'cat'=>('26'),
			      'posts_per_page'=> 5,
			      	'meta_query'=> array(
				            array(
				              'key' => 'event_date',
				              'compare' => '>=',
				              'value' => date("Y-m-d", strtotime("0 day")),
				              'type' => 'DATE'	))
			    );
				$custom_query2 = new WP_Query( $custom_args2 ); ?>
				<?php if ( $custom_query2->have_posts() ) : ?>
				<h2 class="widget-title">Upcoming Events</h2>
			    <table id="home-events-table">
					<tbody>
				<?php while ( $custom_query2->have_posts() ) : $custom_query2->the_post(); $date = new DateTime(get_field('event_date')); ?>			

				<tr>
						<td><?php echo $date->format('F j, Y'); ?></td>
						<td><?php the_field('event_location'); ?></td>
				</tr>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
					</tbody>
				</table>
				<div class="more-link-wrap">
					<a href="<?php get_site_url();?>/events"><span>All GCP Events</span><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
				<?php endif; ?>


</aside><!-- #secondary -->

<?php endif;?>