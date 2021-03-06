<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-single' );

	// ---------------------------------AFFICHAGE TAXONOMIES---------------------------------
	the_terms( $post->ID, 'developpeur', 'Développeur : ' ); echo"<br/>";
	the_terms( $post->ID, 'consoles', 'Disponible sur : ' ); echo"<br/>";
	the_terms( $post->ID, 'genres', 'Genre(s) : ' ); echo"<br/>";



	//---------------------------------AFFICHAGE CUSTOM FIELDS---------------------------------
	echo "Version : " . get_post_meta($post->ID, 'Version', true);
	echo "<br/>Age : " . get_post_meta($post->ID, 'Age', true);
	echo "<br/>Date : " . get_post_meta($post->ID, 'Date', true);
	echo "<br/>Players : " . get_post_meta($post->ID, 'Players', true);


	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	$twentytwentyone_next_label     = esc_html__( 'Next post', 'twentytwentyone' );
	$twentytwentyone_previous_label = esc_html__( 'Previous post', 'twentytwentyone' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.

get_footer();
