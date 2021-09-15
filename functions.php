<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'astra_child_content_loop', 'child_loop_markup' );
add_action( 'astra_child_content_page_loop', 'child_loop_markup_page' );

// Template Parts.
add_action( 'astra_child_page_template_parts_content', 'child_template_parts_page' );
add_action( 'astra_child_page_template_parts_content', 'child_template_parts_comments', 15 );
add_action( 'astra_child_template_parts_content', 'child_template_parts_post' );
add_action( 'astra_child_template_parts_content', 'child_template_parts_search' );
add_action( 'astra_child_template_parts_content', 'child_template_parts_default' );
add_action( 'astra_child_template_parts_content', 'child_template_parts_comments', 15 );

// Template None.
add_action( 'astra_child_template_parts_content_none', 'child_template_parts_none' );
add_action( 'astra_child_template_parts_content_none', 'child_template_parts_404' );
add_action( 'astra_child_404_content_template', 'child_template_parts_404' );

// Content top and bottom.
add_action( 'astra_child_template_parts_content_top', 'child_template_parts_content_top' );
add_action( 'astra_child_template_parts_content_bottom', 'child_template_parts_content_bottom' );

// Add closing and ending div 'ast-row'.
add_action( 'astra_child_template_parts_content_top', 'astra_child_templat_part_wrap_open', 25 );
add_action( 'astra_child_template_parts_content_bottom', 'astra_child_templat_part_wrap_close', 5 );
add_action( 'astra_child_content_bottom', 'child_content_bottom' );
add_action( 'astra_child_footer', 'astra_child_footer_markup' );

function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

function astra_child_content_page_loop() {
    do_action( 'astra_child_content_page_loop' );
}

function child_loop_markup_page() {
    child_loop_markup( true );
}

/**
 * Template part loop
 *
 * @param  boolean $is_page Loop outputs different content action for content page and default content.
 *         if is_page is set to true - do_action( 'astra_page_template_parts_content' ); is added
 *         if is_page is false - do_action( 'astra_template_parts_content' ); is added.
 * @since 1.2.7
 * @return void
 */
function child_loop_markup( $is_page = false ) {
    ?>
    <main id="main" class="site-main">
        <?php 
        if ( have_posts() ) :
            do_action( 'astra_child_template_parts_content_top' );

            while ( have_posts() ) :
                the_post();

                if ( true === $is_page ) {
                    do_action( 'astra_child_page_template_parts_content' );
                } else {
                    do_action( 'astra_child_template_parts_content' );
                }

                endwhile;
            do_action( 'astra_child_template_parts_content_bottom' );
            else :
                do_action( 'astra_child_template_parts_content_none' );
            endif; 
            ?>
    </main><!-- #main -->
    <?php
}

function child_template_parts_content_top() {

}

function child_template_parts_content_bottom() {
    
}

function child_template_parts_page() {
    $template_path = explode(".", basename( get_page_template() ));
    get_template_part( 'astra/'.$template_path[0].'-content', 'page' );
}

function child_template_parts_comments() {
    if ( is_single() || is_page() ) {
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    }
}

function child_template_parts_post() {
    if ( is_single() ) {
        get_template_part( 'template-parts/content', 'single' );
    }
}

function child_template_parts_search() {
    if ( is_search() ) {
        get_template_part( 'template-parts/content', 'blog' );
    }
}

function child_template_parts_default() {
    if ( ! is_page() && ! is_single() && ! is_search() && ! is_404() ) {
        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/content', astra_get_post_format() );
    }
}

function child_template_parts_none() {
    if ( is_archive() || is_search() ) {
        get_template_part( 'template-parts/content', 'none' );
    }
}

function child_template_parts_404() {
    if ( is_404() ) {
        get_template_part( 'template-parts/content', '404' );
    }
}

function astra_child_templat_part_wrap_open() {
    if ( is_archive() || is_search() || is_home() ) {
        echo '<div class="ast-row">';
    }
}

function astra_child_templat_part_wrap_close() {
    if ( is_archive() || is_search() || is_home() ) {
        echo '</div>';
    }
}


function astra_child_the_title( $before = '', $after = '', $post_id = 0, $echo = true ) {

    $title             = get_the_title();

    $title_array = explode(" ", $title, 2);
    $template_path = explode(".", basename( get_page_template() ));
    $class_name = "child_title_first";
    if(strpos($template_path[0], "sub")){
        $class_name .= "_sub";
    }
    $title = $before . "<span class='$class_name'>". $title_array[0] . "</span><br /><span class='child_title_second'>" . $title_array[1] ."</span>" . $after; 

    if(strpos($template_path[0], "vipibc") || strpos($template_path[0], "betibc") || strpos($template_path[0], "accex") || strpos($template_path[0], "neteller")){
        $title = "";
    }

    if ( $echo ) {
        echo $title; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    } else {
        return $title;
    }
}

function astra_child_content_bottom() {
    do_action( 'astra_child_content_bottom' );
}

function child_content_bottom() {
?> 
<div class="content_bottom">
    <div class="content_bottom_text_area">
        <h2>A TEXT HERE</h2>
        <hr style="height: 2px; width: 5rem; background-color: #fff;margin-top: 20px;">
        <p>Our website is designed for both experienced and Indexperienced punters.</p>
        <p>This being said, be sure to check our our full reviews and to also navigate across the different sections. We are convinced you'll find great value in what we share!</p>
    </div>
</div>
<?php
}

function astra_child_footer() {
    do_action( 'astra_child_footer' );
}


/**
 * Function to get site Footer
 */
if ( ! function_exists( 'astra_child_footer_markup' ) ) {

    /**
     * Site Footer - <footer>
     *
     * @since 1.0.0
     */
    function astra_child_footer_markup() {
        ?>

        <footer
        <?php
                echo astra_attr(
                    'footer',
                    array(
                        'id'    => 'colophon',
                        'class' => join( ' ', astra_get_footer_classes() ),
                    )
                );
        ?>
        >

            <?php astra_footer_content_top(); ?>

            <?php astra_footer_content(); ?>

            <?php astra_footer_content_bottom(); ?>

        </footer><!-- #colophon -->
        <?php
    }
}