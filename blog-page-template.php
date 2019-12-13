<?php
/**
 * Template Name: Blog Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Signoi
 */

get_header();
?>
<div class="mailing-list-trigger fixed">
<div class="mailing-list-text">Subscribe</div>
<i class="far fa-envelope"></i></div>
<section class="blog-page-header-area">
<div class="row blog-header-inner">
<div class="col half blog-search"><?php dynamic_sidebar( 'blog-search' ); ?></div>
<div class="col half blog-categories"><?php dynamic_sidebar( 'blog-categories' ); ?></div>
</div>
</section>
<section class="no-sidebar">
	<div id="primary" class="content-area full-width row">
		<main id="main" class="site-main col full">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</section>
<section class="mailing-list-sign-up blog-footer">
<div class="row">
<div class="col full mailing-list-inner">
<div class="mailing-list-icon"><img class="alignnone wp-image-1640" src="http://new.signoi.com/wp-content/uploads/2019/10/signoi-logo-01-150x150.png" alt="" width="55" height="55" srcset="http://new.signoi.com/wp-content/uploads/2019/10/signoi-logo-01-150x150.png 150w, http://new.signoi.com/wp-content/uploads/2019/10/signoi-logo-01.png 300w" sizes="(max-width: 55px) 100vw, 55px"></div>
<div class="mailing-list-text">Subscribe to our newsletter and get all this great content sent directly to your inbox.</div>
<div class="mailing-list-trigger pum-trigger" style="cursor: pointer;">
<div class="button red">Sign Me Up</div>
</div>
</div>
</div>
	</section>
<?php
get_footer();
