<?php
/**
 * The tip template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink    = get_permalink();
$the_core_post_options = the_core_listing_post_options($post->ID);
$the_core_blog_title   = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
$fields = get_field_objects();

$tipster_id = get_field('tipster', false, false);
$bookmaker_id = get_field('bookmaker', false, false);

$banner_image = get_field('banner_image');
$banner_url = get_field('banner_url');

$betslip = get_field('betslip');

$preview_image = get_field('preview_image');

$league_label = $fields['league']['label'];
if($fields['league_type']) {
	$league_label = get_field('league_type');
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-1 fw-content-area" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<div class="fw-row">
		<<?php echo ($the_core_blog_title); ?> class="entry-title fw-col-sm-9" itemprop="headline">
			<?php if ( is_sticky() ) : ?>
				<i class="sticky-icon"></i>
			<?php endif; ?>
			<span><?php the_title(); ?></span>
		</<?php echo ($the_core_blog_title); ?>>
		<div class="fw-col-sm-3 text-right">
			<?php if( $tipster_id ): ?>
				<a href="<?php echo get_the_permalink($tipster_id); ?>" target="_self" class="fw-btn fw-btn-md fw-btn-1" style="outline: none; background-color: #257dc0;" hidefocus="true">
				<span><?php echo get_the_title($tipster_id); ?></span>
				</a>
			<?php endif; ?>
		</div>
		</div>
	</header>

	<div class="entry-content">
			<div class="fw-row">
				<div class="fw-col-sm-2">
					<div>
						<strong class=""><?php echo $fields['prediction_id']['label'] ?>:</strong> 
						<?php the_field('prediction_id'); ?>
					</div>	
					<div>
						<strong><?php echo $fields['tipster']['label'] ?>:</strong> 
						<?php if( $tipster_id ): ?>
						<a href="<?php echo get_the_permalink($tipster_id); ?>"><?php echo get_the_title($tipster_id); ?></a>
						<?php endif; ?>
					</div>	
					<div>
						<strong><?php echo $fields['stake']['label'] ?>:</strong> 
						<?php the_field('stake'); ?>
					</div>
					<div>
						<strong><?php echo $fields['odds']['label'] ?>:</strong> 
						<?php the_field('odds'); ?>
					</div>
				</div>
				<div class="fw-col-sm-3">
					<div>
						<strong><?php echo $fields['start_date']['label'] ?>:</strong>
						<?php the_field('start_date'); ?>
					</div>	
					<div>
						<strong><?php echo $league_label ?>:</strong>
						<?php the_field('league'); ?>
					</div>	
					<div>
						<strong><?php echo $fields['category']['label'] ?>:</strong>
						<?php the_field('category'); ?>
					</div>
					<div>
						<strong><?php echo $fields['bookmaker']['label'] ?>:</strong> 
						<?php if( $bookmaker_id ): ?>
						<a href="<?php echo get_the_permalink($bookmaker_id); ?>"><?php echo get_the_title($bookmaker_id); ?></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="fw-col-sm-2">
					<div>
						<strong><?php echo $fields['added_date']['label'] ?>:</strong>
						<?php the_field('added_date'); ?>
					</div>	
					<div style="color: red">
						<strong><?php echo $fields['prediction_text']['label'] ?>:</strong><br/>
						<?php the_field('prediction_text'); ?>
					</div>	
					<div>
						<?php if( $fields['result']['value'] ): ?>
						<strong><?php echo $fields['result']['label'] ?>:</strong>
						<?php the_field('result'); ?>
						<?php endif; ?>
					</div>
					<div>
						<?php if( $fields['profit']['value'] ): ?>
						<strong><?php echo $fields['profit']['label'] ?>:</strong>
						<?php the_field('profit'); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="fw-col-sm-3">
					<?php if( $banner_image ): ?>
					<a href="<?php echo $banner_url; ?>" target="_blank">
					<?php echo wp_get_attachment_image( $banner_image, 'medium' ); ?>
					</a>
					<?php endif; ?>
				</div>
				<div class="fw-col-sm-2">
					<?php if( $betslip ): ?>
					<a href="<?php echo wp_get_attachment_image_url($betslip, 'full'); ?>" data-rel=prettyPhoto title="" rel=prettyPhoto>
					<?php echo wp_get_attachment_image( $betslip, 'thumbnail' ); ?>
					</a>
					<?php endif; ?>
				</div>
			</div>
	</div>

	<div class="entry-content clearfix" itemprop="text">
		<?php if( $preview_image ): ?>
		<div>
		<?php echo wp_get_attachment_image( $preview_image, 'full' ); ?>
		</div>
		<?php endif; ?>
		<?php 
		    //remove_filter( 'the_content', 'wpautop' );
			//remove_filter( 'the_content', 'shortcode_unautop' );
			
			//add_filter( 'the_content', 'wpautop',100);
			//add_filter( 'the_content', 'shortcode_unautop',101);
			the_content();
		?>
		<?php //echo wpautop(get_the_content()); ?>
	</div><!-- /.artikel-content -->
</article>