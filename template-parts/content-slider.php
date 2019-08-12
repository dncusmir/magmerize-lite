<?php
/**
 * Template part for displaying the slider in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

$posts_args = array(
    'post_type'           => 'post',
	'post_status'         => 'publish',
	'nopaging'            => false,
    'posts_per_page'      => 4,
    'orderby'             => 'ID',
    'order'               => 'asc',
    'ignore_sticky_posts' => true
);
$wp_query1 = new WP_Query( $posts_args );

if( $wp_query1->have_posts() ) {
    $i = 0; ?>

    <!-- +++ Slider +++ -->
    <section class="mgmr-slider mt-3">

        <div class="container">
            <div class="row no-gutters">

    <?php while( $wp_query1->have_posts() ) {
        $wp_query1->the_post();

        if( $i == 0 ) { ?>
            <div class="col-12 col-md-8">
                <div class="mgmr-slider-card">
                    <a class="mgmr-slider-link" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium_large', array( 'class' => 'mgmr-slider-img mgmr-slider-img-big' ) ); ?>
                        <div class="mgmr-slider-details px-3">
                            <h1><?php the_title(); ?></h1>
                            <p class="lead"><?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?></p>
                        </div><!-- mgmr-slider-details -->
                    </a>
                </div><!-- mgmr-slider-card -->
            </div><!-- col-12 -->
        <?php } else {
            if( $i == 1 ) { ?>
                <div class="col-12 col-md-4">
                    <div class="row no-gutters">
            <?php } ?>

            <div class="col-12 col-sm-4 col-md-12">
                <div class="mgmr-slider-card">
                    <a class="mgmr-slider-link" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array( 'class' => 'mgmr-slider-img' ) ); ?>
                        <div class="mgmr-slider-details px-3 w-100">
                            <h2 class="font-weight-light"><?php the_title(); ?></h2>
                        </div><!-- mgmr-slider-details -->
                    </a>
                </div><!-- mgmr-slider-card -->
            </div><!-- col-12 -->

            <?php if( $i == 3 ) { ?>
                </div><!-- row -->
            </div><!-- col-12 -->
            <?php }
        }

        $i++;
    } // end while
    wp_reset_postdata(); ?>

            </div><!-- row -->
        </div><!-- container -->

    </section><!-- mgmr-slider -->

<?php } ?>
