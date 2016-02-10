<?php
/**
 * Template Name: Left Sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package qwertyuiop
 */

get_header();
get_sidebar();
?>

	<div id="primary" class="col-sm-12 col-md-8 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();