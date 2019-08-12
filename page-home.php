<?php
/**
 * Template Name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

get_header();
?>

<?php get_template_part( 'template-parts/content', 'slider' ); ?>


    <!-- +++ Main Articles +++ -->
    <div class="container">
        <div class="row mt-5" id="primary">

            <?php get_template_part( 'template-parts/content', 'hlatest' ); ?>

            <?php get_sidebar(); ?>



        </div><!-- row primary -->
    </div><!-- container -->

    <?php get_template_part( 'template-parts/content', 'full-width-boxes' ); ?>
    <?php get_template_part( 'template-parts/content', '1big-4small' ); ?>




<?php
get_footer();
