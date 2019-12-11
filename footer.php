<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Signoi
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="row"><div class="col full">
		<div class="footer-socials">
			<a target="_blank" href="https://twitter.com/hellosignoi"><i class="fab fa-twitter"></i></a>
			<a target="_blank" href="https://www.instagram.com/hellosignoi/"><i class="fab fa-instagram"></i></a>
			<a target="_blank" href="https://www.linkedin.com/company/signoi/"><i class="fab fa-linkedin"></i></a>
		</div>
			<nav class="footermenu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu' ) ); ?></nav>
				<div class="site-info">
				(c) 2019 Signoi Ltd. Registered office: 20-22 Wenlock Road, London, N1 7GU, Company number: 10978985
				</div><!-- .site-info -->
		</div></div><!-- .row and column-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/jquery.flexslider-min.js"></script> <!-- customer comment and report sliders on homepage -->
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/materialize.min.js"></script> <!-- use cases slider -->
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/jquery.waypoints.js"></script>
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/inview.js"></script> <!-- not currently using -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script type="module">
import Vue from 'https://cdn.jsdelivr.net/npm/vue';
import Carousel3d from '/wp-content/themes/signoi-theme/js/vue-carousel-3d/src/index.js';

Vue.use(Carousel3d);
</script>
</body>
</html>
