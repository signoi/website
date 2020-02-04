<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Signoi
 */

get_header();
?>
<section class="no-sidebar">
	<div id="primary" class="content-area full-width row">
		<main id="main" class="site-main col full">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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
