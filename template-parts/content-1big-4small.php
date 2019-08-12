<?php
/**
 * Template part for displaying 1 big width box and 4 small ones section in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

$posts_args = array(
    'post_type'           => 'post',
	'post_status'         => 'publish',
	'nopaging'            => false,
    'posts_per_page'      => 5,
    'ignore_sticky_posts' => true
);
$wp_query1 = new WP_Query( $posts_args );

if( $wp_query1->have_posts() ) {
    $i = 0; ?>

    <!-- +++ Separator +++ -->
    <div class="container">
        <div class="mgmr_separator my-3"></div><!-- mgmr_separator -->
    </div><!-- container -->

    <!-- +++ 1 big 4 small right +++ -->
    <section class="mrpd_fw_boxes mt-5">

        <div class="container">
            <div class="row">

    <?php while( $wp_query1->have_posts() ):
        $wp_query1->the_post(); ?>

        <?php if( $i == 0 ) { ?>
            <div class="col-6">
                <article class="mgmr_box">
                    <div class="mgmr_box_top">
                        <div class="mgmr_box_img">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('large', array( 'alt' => 'image' ) ); ?>
                            </a>
                        </div><!-- mgmr_box_img -->
                        <div class="mgmr_box_category">
                            <a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>" class="bg-tertiary" title="<?php echo esc_html( $category[0]->cat_name ); ?>"><?php echo esc_html( $category[0]->cat_name ); ?></a>
                        </div><!-- mgmr_box_category -->
                    </div><!-- mgmr_box_top -->
                    <div class="mgmr_box_bottom m-2">
                        <h2 class="mt-3"><?php the_title(); ?></h2>
                        <p>
                            <?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?>
                        </p>
                    </div><!-- mgmr_box_bottom -->
                </article><!-- mgmr_box -->
            </div><!-- col-6 -->
        <?php } ?>

        <?php if( $i == 1) { ?>
            <div class="col-6">
        <?php } ?>
        <?php if( $i == 1 || $i == 3 ) { ?>
                <div class="row">

        <?php } ?>
        <?php if( $i > 0 ) { ?>
            <div class="col-6">
                <article class="mgmr_box">
                    <div class="mgmr_box_top">
                        <div class="mgmr_box_img">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail('medium', array( 'alt' => 'image' ) ); ?>
                            </a>
                        </div><!-- mgmr_box_img -->
                        <div class="mgmr_box_category">
                            <a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>" class="bg-tertiary" title="<?php echo esc_html( $category[0]->cat_name ); ?>"><?php echo esc_html( $category[0]->cat_name ); ?></a>
                        </div><!-- mgmr_box_category -->
                    </div><!-- mgmr_box_top -->
                    <div class="mgmr_box_bottom m-2">
                        <h2 class="mt-3"><?php the_title(); ?></h2>
                    </div><!-- mgmr_box_bottom -->
                </article><!-- mgmr_box -->
            </div><!-- col-6 -->
        <?php } ?>

        <?php if( $i == 2 || $i == 4 ) { ?>
                </div><!-- row -->
        <?php } ?>
        <?php if( $i == 4) { ?>
            </div><!-- col-6 -->
        <?php }
        $i++;
    endwhile;
    wp_reset_postdata(); ?>

        </div><!-- row -->
    </div><!-- container -->

</section><!-- mrpd_fw_boxes -->
<?php } ?>
