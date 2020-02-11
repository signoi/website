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

<!-- mailing list sign-up --> 
<div class="pop-up">
<div class="sign-up-form">
<div class="form-title"><h3>Sign Up</h3></div>
<div class="form-content">
		<form id="_form_15_" class="_form _form_15 _inline-form _dark" action="https://signoi.activehosted.com/proc.php" method="POST" novalidate="">
		<input name="u" type="hidden" value="15" data-name="u"><input name="f" type="hidden" value="15" data-name="f"><input name="s" type="hidden" data-name="s"><input name="c" type="hidden" value="0" data-name="c"><input name="m" type="hidden" value="0" data-name="m"><input name="act" type="hidden" value="sub" data-name="act"><input name="v" type="hidden" value="2" data-name="v">
		<div class="_form-content">
		<div class="_form_element _x56438194 _full_width _clear">
		<div class="_form-title">Subscribe to the Signoi Newsletter to get new articles delivered straight to your inbox</div>
		</div>
		<div class="_form_element _field21 _full_width ">
		<div class="_row"><label class="_form-label">Please select all that apply*</label></div>
		<input name="field[21][]" type="hidden" value="~|" data-name="email_options">
		<div class="_row _checkbox-radio"><input id="field_21The Signoi Blog" class="any" name="field[21][]" required="" type="checkbox" value="The Signoi Blog" data-name="email_options"><label for="field_21The Signoi Blog">The Signoi Blog</label></div>
		<div class="_row _checkbox-radio"><input id="field_21Signoi Monthly Newsletter" name="field[21][]" type="checkbox" value="Signoi Monthly Newsletter" data-name="email_options"><label for="field_21Signoi Monthly Newsletter">Signoi Monthly Newsletter</label></div>
		</div>
		<div class="mailing-list-name-email">
		<div class="_form_element _x09653339 _full_width ">
		<label class="_form-label">Full Name</label>
		<div class="_field-wrapper"><input name="fullname" type="text" placeholder="Type your name" data-name="fullname"></div>
		</div>
		<div class="_form_element _x99976564 _full_width">
		<label class="_form-label">Email*</label>
		<div class="_field-wrapper"><input name="email" required="" type="text" placeholder="Type your email" data-name="email"></div>
		</div>
		</div>
		<div class="_form_element _field3 _full_width ">
		<div class="_row">
			<label class="_form-label">Please confirm that we may contact you via email:</label>
		</div>
		<input name="field[3][]" type="hidden" value="~|" data-name="marketing_permissions">
		<div class="_row _checkbox-radio"><input id="field_3Email" name="field[3][]" required="" type="checkbox" value="Email" data-name="marketing_permissions"><label for="field_3Email">Email*</label></div>
		</div>
		<div class="_button-wrapper _full_width"><button id="_form_15_submit" class="_submit" type="submit">Sign Me Up</button></div>
		<div class="_clear-element"></div>
		</div>
		<div class="_form-thank-you" style="display: none;"></div>
		<input type="hidden" name="pum_form_popup_id" value="1564"></form>
		<p><script type="text/javascript">
		window.cfields = {"21":"email_options","3":"marketing_permissions"};
		window._signoiForm("_form_15_");
		</script></p>
</div>
<button type="button yellow" class="form-close" aria-label="Close">CLOSE</button>
</div>
</div>

<?php wp_footer(); ?>
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/jquery.flexslider-min.js"></script> <!-- customer comment and report sliders on homepage -->
<!--  <script type="text/javascript" src="/wp-content/themes/signoi-theme/js/materialize.min.js"></script> not currently using -->
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/jquery.waypoints.js"></script>
<!-- <script type="text/javascript" src="/wp-content/themes/signoi-theme/js/inview.js"></script> not  currently using -->
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/jquery.flipster.min.js"></script> <!-- use cases slider --> 
<script type="text/javascript" src="/wp-content/themes/signoi-theme/js/jquery-ui.min.js"></script> <!-- vertical tabs --> 
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script> <!-- scrollmagic for platform parallax --> 
<!-- <script <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script> indicators for scrollmagic --> 
</body>
</html>
