<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

get_header();
?>



		<div class="container">
				<div class="row mt-5" id="primary">

					<main class="col-sm-8 mt-3" id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="mgmr_main_title page-title">', '</h1>' ); ?>
				<div class="mgmr_separator_solid my-3"></div><!-- mgmr_separator_solid -->
				<?php the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
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
