<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magmerize_Lite
 */

?>

<article id="mgmr_post" itemscope itemtype="http://schema.org/Article">
    <header id="mgmr_post_header" class="text-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php
                    $category = get_the_category();
                    foreach ($category as $cat) {
                        $cat_name = $cat->cat_name;
                        $cat_id = get_cat_ID( $cat_name );
                        $cat_link = get_category_link( $cat_id );
                        echo '<li class="breadcrumb-item"><a href="' . esc_url( $cat_link ) . '" title="' . esc_html( $cat_name ) . '">' . esc_html( $cat_name ) . '</a></li>';
                    }
                ?>
            </ol><!-- breadcrumb -->
        </nav><!-- aria -->
        <h1 itemprop="headline"><?php the_title(); ?></h1>
        <p>
            <?php the_excerpt(); ?>
        </p>
        <div class="mgmr_social mgmr_short_border_bottom text-center mb-0 mgmr_mx-after-a">
            <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&amp;t=<?php echo urlencode( get_the_title() ); ?>"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://twitter.com/share?url=<?php echo urlencode( get_permalink() ); ?>&amp;text=<?php echo urlencode( get_the_title() ); ?>"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>"><i class="fab fa-linkedin-in"></i></a>
                </li>
            </ul>
        </div><!-- mgmr_social -->
        <div class="mgmr_post_header_meta1 text-center mt-3" itemprop="author publisher" itemscope itemtype="http://schema.org/Organization">
                <?php if( get_avatar( get_the_author_meta( 'ID' ) ) ) {
                    echo get_avatar( get_the_author_meta( 'ID' ), 100, '', '', array( 'extra_attr' => 'itemprop="image logo"' ) );
                } ?>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" itemprop="name" class="mt-2 mb-1"><?php echo get_the_author(); ?></a>
                <span><i class="far fa-clock pr-1"></i><time itemprop="dateCreated datePublished"><?php echo get_the_date() ?></time> <a href="<?php comments_link(); ?>"><i class="far fa-comments pr-1 pl-4"></i><?php comments_number(); ?></a></span>
        </div><!-- mgmr_post_header_meta1 -->
    </header><!-- mgmr_post_header -->
    <section id="mgmr_post_body" itemprop="articleBody" class="mt-5">
        <?php the_post_thumbnail('large', array( 'class' => 'mb-2' ) ); ?>
        <?php echo get_the_content(); ?>
    </section>
    <section id="mgmr_post_about" class="my-4">
        <h5 class="mb-3">About The Author</h5>
        <div class="row">
            <div class="col-4 text-center" itemprop="author publisher" itemscope itemtype="http://schema.org/Organization">
                <?php if( get_avatar( get_the_author_meta( 'ID' ) ) ) {
                    echo get_avatar( get_the_author_meta( 'ID' ), 100, '', '', array( 'extra_attr' => 'itemprop="image logo"' ) );
                } ?>
                <h3 itemprop="name" class="mt-2"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></h3>
                <div class="mgmr_social">
                    <ul class="list-unstyled list-inline mgmr_footer_social">
                        <?php if( !empty( get_the_author_meta( 'facebook' ) ) ) { ?>
                        <li class="list-inline-item">
                            <a href="<?php the_author_meta( 'facebook' ); ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <?php } ?>
                        <?php if( !empty( get_the_author_meta( 'twitter' ) ) ) { ?>
                        <li class="list-inline-item">
                            <a href="<?php the_author_meta( 'twitter' ); ?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <?php } ?>
                        <?php if( !empty( get_the_author_meta( 'linkedin' ) ) ) { ?>
                        <li class="list-inline-item">
                            <a href="<?php the_author_meta( 'linkedin' ); ?>" title="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div><!-- mgmr_social -->
            </div><!-- col-4 -->
            <div class="col-8">
                <p>
                    <?php echo get_the_author_meta( 'user_description' ); ?>
                </p>
            </div><!-- col-8 -->
        </div><!-- row -->
    </section><!-- mgmr_post_about -->
</article><!-- post -->
