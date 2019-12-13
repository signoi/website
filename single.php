<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Signoi
 */

get_header();
?>
<section>
	<div id="primary" class="content-area row">
		<main id="main" class="site-main col">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
?>
<section class="mailing-list-sign-up blog-footer">
<div class="row mailing-list-inner">
<div class="col full">
<div class="mailing-list-icon"><img class="alignnone wp-image-1640" src="http://new.signoi.com/wp-content/uploads/2019/10/signoi-logo-01-150x150.png" alt="" width="55" height="55" srcset="http://new.signoi.com/wp-content/uploads/2019/10/signoi-logo-01-150x150.png 150w, http://new.signoi.com/wp-content/uploads/2019/10/signoi-logo-01.png 300w" sizes="(max-width: 55px) 100vw, 55px"></div>
<div class="mailing-list-text">Subscribe to our newsletter and get all this great content sent directly to your inbox.</div>
<div class="mailing-list-trigger pum-trigger" style="cursor: pointer;">
<div class="mailing-list-button">Sign Me Up</div>
</div>
</div>
</div>
</section>

<?php
get_footer();
?>
