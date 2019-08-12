<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magmerize_Lite
 */

?>


<?php wp_footer(); ?>

<!-- +++ Footer +++ -->
<footer class="mt-5 site-footer">
	<div class="container">
		<div class="row">

			<div class="col-md-6">
				<?php
					wp_nav_menu( array(
						'theme_location'	=>	'footer_menu',
						'container'			=>	'nav',
						'container_class'	=>	'mgmr_footer_nav text-center text-md-left',
						'container_id'		=>	'',
						'menu_class'		=>	'list-unstyled list-inline'
					) );
				?>
			</div><!-- col-md-6 -->
			<div class="col-md-6 text-center text-md-right">
				<?php
					wp_nav_menu( array(
						'theme_location'	=>	'footer_social_menu',
						'container'			=>	'div',
						'container_class'	=>	'',
						'container_id'		=>	'',
						'menu_class'		=>	'list-unstyled list-inline mgmr_footer_social'
					) );
				?>
				<p>
					<?php echo get_theme_mod( 'copyright_text', 'Copyright &copy; ' . date( 'Y' ) . '. All rights reserved.' ); ?>
				</p>
			</div><!-- col-md-6 -->

		</div><!-- row -->
	</div><!-- container -->
</footer>

<!-- JS Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
