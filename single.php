<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Magmerize_Lite
 */

get_header();
?>

	<!-- +++ Main Article +++ -->
	<div class="container">
		<div class="row mt-5" id="primary">

			<main class="col-sm-8 mt-3" id="content" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();


			get_template_part( 'template-parts/content', 'recommended-posts' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- content -->

		<?php get_sidebar(); ?>

	</div><!-- row primary -->
</div><!-- container -->

<?php

get_footer();
