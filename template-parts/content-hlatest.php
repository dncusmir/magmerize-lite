<?php
/**
 * Template part for displaying latest articles section in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

$posts_args = array(
    'post_type'           => 'post',
	'post_status'         => 'publish',
	'nopaging'            => false,
    'posts_per_page'      => 6,
    'orderby'             => 'ID',
    'order'               => 'desc',
    'ignore_sticky_posts' => true
);
$wp_query1 = new WP_Query( $posts_args ); ?>

<main class="col-sm-8 mt-3" id="content" role="main">

    <h1 class="mgmr_main_title">Latest Articles</h1>
    <div class="mgmr_separator_solid my-3"></div><!-- mgmr_separator_solid -->

<?php if( $wp_query1->have_posts() ) {
    $i = 0; ?>
    <?php while( $wp_query1->have_posts() ):
        $wp_query1->the_post();

        if( $i == 0 ) { ?>
            <article class="mgmr_article" id="mgmr_article_highlight">
                <div class="mgmr_article_media">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('large', array( 'id' => 'mgmr_article_highlight_img', 'alt' => 'image' ) ); ?>
                    </a>
                </div><!-- mgmr_article_media -->
                <div>
                    <h2 class="mgmr_article_title"><a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'><?php the_title(); ?></a></h2>
                    <p class="mgmr_article_snippet">
                        <?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
                    </p>
                </div><!-- col-9 -->
                <div id="mgmr_article_highlight_meta" class="pb-1">
                    <span><?php the_time('jS F Y') ?> <a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>" class="bg-tertiary" title="<?php echo esc_html( $category[0]->cat_name ); ?>"><?php echo esc_html( $category[0]->cat_name ); ?></a> </span>
                </div><!-- mgmr_article_highlight_meta -->
            </article><!-- mgmr_article -->
        <?php }
        if( $i > 0 ) { ?>
            <div class="mgmr_article my-3">
                <div class="row">

                    <div class="mgmr_article_media col-3">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium', array( 'alt' => 'image' ) ); ?></a>
                        <a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>" title="<?php echo esc_html( $category[0]->cat_name ); ?>" class="bg-tertiary"><span><?php echo esc_html( $category[0]->cat_name ); ?></span></a>
                    </div><!-- col-3 -->
                    <div class="col-9">
                        <h2 class="mgmr_article_title"><a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'><?php the_title(); ?></a></h2>
                        <div class="mgmr_article_meta mb-1">
                            <span>Posted by: <?php the_author_posts_link(); ?> on <?php the_time('jS F Y') ?></span>
                        </div><!-- mgmr_article_meta -->
                        <p class="mgmr_article_snippet">
                            <?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?>
                        </p>
                    </div><!-- col-9 -->

                </div><!-- row -->
            </div><!-- mgmr_article -->
        <?php }
        $i++;
    endwhile;
    wp_reset_postdata();
} ?>

</main><!-- content -->
