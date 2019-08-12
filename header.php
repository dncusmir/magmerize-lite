<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magmerize_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- gooogle fonts -->
    <link href="https://fonts.googleapis.com/css?family=Heebo:200,300,400,700|Open+Sans|Roboto:300,400&display=swap" rel="stylesheet">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Header -->
    <header class="site-header" role="banner">

        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php
						wp_nav_menu( array(
							'theme_location'	=>	'header_social_menu',
							'container'			=>	'',
							'container_class'	=>	'',
							'container_id'		=>	'navbarSupportedContent',
							'menu_class'		=>	'navbar-nav ml-auto'
						) );
					?>
                    <?php get_search_form( true ); ?>
                </div><!-- collapse -->
            </div><!-- container -->
        </nav><!-- navbar -->

        <nav class="navbar navbar-expand-sm navbar-light bg-secondary">
            <div class="container">

		<?php
			wp_nav_menu( array(
				'theme_location'	=>	'primary',
				'container'			=>	'div',
				'container_class'	=>	'collapse navbar-collapse',
				'container_id'		=>	'navbarSupportedContent1',
				'menu_class'		=>	'navbar-nav w-100 nav-justified'
			) );
		?>

            </div><!-- container -->
        </nav><!-- nav -->

    </header>
