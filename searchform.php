<?php
/**
 * The template for displaying the searh form in the header
 *
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Magmerize_Lite
 */
?>


 <form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline mgmr-search ml-2">
    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    <input class="form-control" type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" aria-label="Search">
</form>
