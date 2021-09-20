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
	#primary {
		margin:  0 !important;
	}
</style>
<header class="entry-header" style='background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/news.jpg); text-align: center;'>
	<div class="astra-child-title">
		<h2 class="entry-child-title child_title_news">What's the news!</h2>
	</div>
</header>
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
