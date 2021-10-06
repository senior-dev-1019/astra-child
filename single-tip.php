<?php
/**
 * The Template for displaying all single posts
 */

get_header();
the_core_header_image();
$the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
?>
<section class="fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="https://schema.org/Blog">
	<div class="fw-container">
		<div class="fw-row fw-letter-no-caps clearfix postlist postlist-grid">
			<div class="fw-content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
				<div class="fw-col-inner">
					<?php if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'templates/content-tip', 'single' );

						if ( comments_open() ) comments_template();
						break;
					endwhile; ?>
				</div><!-- /.inner -->
			</div><!-- /.content-area -->

			<?php get_sidebar(); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>