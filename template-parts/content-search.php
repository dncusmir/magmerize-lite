<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'mgmr_article', 'my-3' ) ); ?>>
	<div class="row">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="mgmr_article_media col-3">
			<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php get_the_title(); ?>"><?php the_post_thumbnail('small', array( 'alt' => get_the_title() ) ); ?></a>
			<a href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>" title="<?php echo esc_html( $category[0]->cat_name ); ?>" class="bg-tertiary"><span><?php echo esc_html( $category[0]->cat_name ); ?></span></a>
		</div><!-- col-3 -->
		<?php endif; ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="col-9">
		<?php else: ?>
		<div class="col-12">
		<?php endif; ?>
			<?php the_title( '<h2 class="entry-title mgmr_article_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . get_the_title() . '">', '</a></h2>' ); ?>
			<div class="mgmr_article_meta mb-1 entry-meta">
				<span>Posted by: <?php the_author_posts_link(); ?> on <?php the_time('jS F Y') ?></span>
			</div><!-- mgmr_article_meta -->
			<p class="mgmr_article_snippet">
				<?php echo wp_trim_words( get_the_content(), 30, '...' ); ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>"> continue reading &raquo;</a>
			</p>

	</div><!-- row -->
</article><!-- mgmr_article -->
