<?php
/**
 * Template part for displaying full width boxes section in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

$posts_args = array(
    'post_type'           => 'post',
	'post_status'         => 'publish',
	'nopaging'            => false,
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true
);
$wp_query1 = new WP_Query( $posts_args );

if( $wp_query1->have_posts() ) { ?>

    <!-- +++ Separator +++ -->
    <div class="container">
        <div class="mgmr_separator_dashed my-3"></div><!-- mgmr_separator_dashed -->
    </div><!-- container -->

    <!-- +++ Full Width Boxes +++ -->
    <section class="mrpd_fw_boxes mt-5">

        <div class="container">
            <div class="row">

    <?php while( $wp_query1->have_posts() ):
        $wp_query1->the_post(); ?>

        <div class="col-4">
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
                    <div class="mgmr_box_meta">
                        <div class="row">
                            <div class="col-6 text-left">

                            <span class="px-2">by <a class="pl-2" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a> </span></div>
                            <div class="col-6 text-right"><span class="px-2"><?php the_time('jS F Y') ?></span></div>
                        </div>
                    </div><!-- mgmr_box_meta -->
                </div><!-- mgmr_box_top -->
                <div class="mgmr_box_bottom m-2">
                    <h2 class="mt-3"><?php the_title(); ?></h2>
                    <p>
                        <?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?>
                    </p>
                </div><!-- mgmr_box_bottom -->
            </article><!-- mgmr_box -->
        </div><!-- col-4 -->

    <?php endwhile;
    wp_reset_postdata(); ?>

        </div><!-- row -->
    </div><!-- container -->

</section><!-- mrpd_fw_boxes -->
<?php } ?>
