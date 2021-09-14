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

<article
<?php
		echo astra_attr(
			'article-content',
			array(
				'id'    => 'post-' . get_the_id(),
				'class' => join( ' ', get_post_class() ),
			)
		);

    	$template_path = explode(".", basename( get_page_template() ));
		?>
>
	<?php astra_entry_top(); ?>

	<header class="entry-header <?php astra_entry_header_class(); ?>" style='background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/<?php echo $template_path[0] ?>.jpg); background-repeat: round; text-align: right;'>
		<?php

		astra_child_the_title(
			sprintf(
				'<div class="astra-child-title"><h2 class="entry-child-title child-title-right" ' . astra_attr(
					'article-title-content',
					array(
						'class' => '',
					)
				) . '><a href="%s" rel="bookmark">',
				esc_url( get_permalink() )
			),
			'</a><br /><hr style="height: 2px; width: 5rem; background-color: #fff;margin-top: 20px; float: right;"></h2></div>'
		);
		?>

	</header><!-- .entry-header -->

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
