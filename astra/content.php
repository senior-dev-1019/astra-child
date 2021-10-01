<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<?php astra_entry_before(); ?>
<style type="text/css">
	.ast-separate-container #primary {
	    padding:  0 !important;
	}
    #primary {
        margin:  0 !important;
    }
</style>

<header class="entry-front-header" style='background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/01-bg-min.jpg); text-align: right;'>
    <div class="astra-child-title">
        <h2 class="entry-child-title child_title_front"><span class="child_title_front_first">Sports Betting</span><br /><span class="child_title_front_second">Winners!</span><br /><hr style="height: 2px; width: 3rem; background-color: #fff; float: right;margin-bottom: 0;"></h2>
        <br />
        <p>Sports betting or betting, is much more than just a</p><p>game of luck! It takes lots of analysis, research,</p><p>preparation, and a little bit of dedication too.
        </p><p>We ought to reat it as an investment in order to be</p><p>able to take it as seriously as we should.</p>
        <br />
        <div class="div_front_explore"><a href="#" class="btn_front_explore">EXPLORE</a></div>
        
    </div>
</header>

<article style="background-color: #91FF30;"
<?php

		echo astra_attr(
			'article-content',
			array(
				'id'    => 'post-' . get_the_id(),
				'class' => join( ' ', get_post_class() ),
			)
		);
		?>
>
	<?php astra_entry_top(); ?>


		<?php
		// astra_the_title(
		// 	sprintf(
		// 		'<h2 class="entry-title" ' . astra_attr(
		// 			'article-title-content',
		// 			array(
		// 				'class' => '',
		// 			)
		// 		) . '><a href="%s" rel="bookmark">',
		// 		esc_url( get_permalink() )
		// 	),
		// 	'</a></h2>'
		// );
		?>


	<div class="entry-content clear" 
	<?php
				echo astra_attr(
					'article-entry-content',
					array(
						'class' => '',
					)
				);
				?>
	>

		<?php astra_entry_content_before(); ?>

		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						__( 'Continue reading %s', 'astra' ) . ' <span class="meta-nav">&rarr;</span>',
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
			?>

		<?php astra_entry_content_after(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html( astra_default_strings( 'string-single-page-links-before', false ) ),
					'after'       => '</div>',
					'link_before' => '<span class="page-link">',
					'link_after'  => '</span>',
				)
			);
			?>
	</div><!-- .entry-content .clear -->

	<footer class="entry-footer">
		<?php astra_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php astra_entry_bottom(); ?>

</article><!-- #post-## -->

<?php astra_entry_after(); ?>
