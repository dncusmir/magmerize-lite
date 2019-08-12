<?php
/**
 * Template part for displaying recommended posts in single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

$args = array();
$id = get_the_ID();
$title = get_the_title();

/**
 * Search posts after post name. Return most relevant
 **/
$args = array(
    'post__not_in'        => array( $id ),
    's'                   => $title,
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'nopaging'            => false,
    'posts_per_page'      => 3,
    'orderby'             => 'relevance',
    'ignore_sticky_posts' => 1
);

/**
 * Find out if post has tags. If true then we get posts with first tag.
 * If no tags, we search for categories. If post has categories we get posts in the last sub category.
 * If no categories either, we get the most popular posts all around.
 **/
/*$tags = wp_get_post_tags( $id );
if( !empty( $tags ) ) {
    $tag = $tags[ 0 ];
    $args = array(
        'post__not_in'        => array( $id ),
        'tag'                 => $tag,
        'post_type'           => 'post',
    	'post_status'         => 'publish',
    	'nopaging'            => false,
        'posts_per_page'      => 3,
        'ignore_sticky_posts' => 1
    );
} else {
    $categories = get_the_category( $id );
    if( !empty( $categories ) ) {
        $cat = $categories[ count( $categories ) - 1 ];
        $args = array(
            'post__not_in'        => array( $id ),
            'category_name'       => $cat->cat_name,
            'post_type'           => 'post',
        	'post_status'         => 'publish',
        	'nopaging'            => false,
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => 1
        );
    }
}
if( empty( $args ) ) return; // no tags / categories */

$wp_query1 = new WP_Query( $args );

if( $wp_query1->have_posts() ) { ?>
    <section class="mgmr_recommended_posts mt-4">
        <h5 class="mb-3">Recommended Posts</h5>
            <div class="container">
                <div class="row">

    <?php while( $wp_query1->have_posts() ) {
        $wp_query1->the_post(); ?>

        <div class="col-4">
            <article class="mgmr_box">
                <div class="mgmr_box_top">
                    <div class="mgmr_box_img">
                        <a href="<?php the_permalink(); ?>" title="post">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </a>
                    </div><!-- mgmr_box_img -->
                    <div class="mgmr_box_category">
                        <a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>" title="<?php echo esc_html( $category[0]->cat_name ); ?>" class="bg-tertiary"><?php echo esc_html( $category[0]->cat_name ); ?></a>
                    </div><!-- mgmr_box_category -->
                    <div class="mgmr_box_meta">
                        <div class="row">
                            <div class="col-6 text-left">

                            <span class="px-2">by <a class="pl-2" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a> </span></div>
                            <div class="col-6 text-right"><span class="px-2"><?php the_time('jS F Y') ?></span></div>
                        </div>
                    </div><!-- mgmr_box_meta -->
                </div><!-- mgmr_box_top -->
                <a href="<?php the_permalink(); ?>">
                    <div class="mgmr_box_bottom m-2">
                        <h2 class="mt-3"><?php the_title(); ?></h2>
                        <p>
                            <?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?>
                        </p>
                    </div><!-- mgmr_box_bottom -->
                </a>
            </article><!-- mgmr_box -->
        </div><!-- col-4 -->
    <?php } // endwhile
    wp_reset_postdata(); ?>

                                </div><!-- row -->
                            </div><!-- container -->
                    </section><!-- mgmr_recommended_posts -->
<?php } ?>
