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
<article style="background-color: #91FF30;"
<?php
		echo astra_attr(
			'article-blog',
			array(
				'id'    => 'post-' . get_the_id(),
				'class' => join( ' ', get_post_class() ),
			)
		);
		?>
>
	<?php astra_entry_top(); ?>
	<?php astra_entry_content_blog(); ?>
	<?php astra_entry_bottom(); ?>
</article><!-- #post-## -->
<?php astra_entry_after(); ?>
