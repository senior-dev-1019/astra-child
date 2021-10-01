<?php

/*
 * Template Name: High-Rollers-Sub-VIP-IBC
 * description: >-
  High-Rollers Sub VIP-IBC Page template as new Regular Design 
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header('astra'); ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_child_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->


<?php get_footer(); ?>
