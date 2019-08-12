<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

get_header();
?>

	<!-- +++ Main Articles +++ -->
	<div class="container">
		<div class="row mt-5" id="primary">

			<main class="col-sm-8 mt-3" id="content" role="main">

				<h1 class="mgmr_main_title">Latest Articles</h1>
				<div class="mgmr_separator_solid my-3"></div><!-- mgmr_separator_solid -->

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>


			</main><!-- content -->

			<?php get_sidebar(); ?>

	</div><!-- row primary -->
</div><!-- container -->

<?php
get_footer();
