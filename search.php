<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				<h1 class="mgmr_main_title page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'magmerize' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
				<div class="mgmr_separator_solid my-3"></div><!-- mgmr_separator_solid -->
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
