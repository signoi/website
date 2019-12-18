<?php
/**
 * Template Name: Careers Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Signoi
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if( have_rows('above_fold') ): 
		while( have_rows('above_fold') ): the_row(); 
		$copy = get_sub_field('section_copy'); 
		$cta = get_sub_field('cta_text'); 
		$link = get_sub_field('cta_link'); 
?>		
<section id="above-fold">
	<div class="row intro">
		<div class="col half">
		<h1><?php the_title(); ?></h1>	
		<p><?php echo $copy; ?></p>
		<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php if( have_rows('positions') ): 
?>
<section id="positions">
	<div class="row jobs-menu">
		<?php $get_terms = array (
            'taxonomy' => 'job-category', //empty string(''), false, 0 don't work, and return empty array
            'orderby' => 'name',
            'order' => 'ASC',
			'hide_empty' => true, //can be 1, '1' too
	); 
	foreach( $terms as $term ) {
		$category_link = sprintf( 
			'<a href="%1$s" alt="%2$s">%3$s</a>',
			esc_url( get_category_link( $term->term_id ) ),
			esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $term->name ) ),
			esc_html( $term->name )
		);
		 
		echo '<p>' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $category_link ) . '</p> ';
	} 
	?>
	</div>
	<div class="row jobs">
		<?php while( have_rows('positions') ): the_row(); 
		$title = get_sub_field('job_title'); 
		$location = get_sub_field('location'); 
		$hours = get_sub_field('hours'); 
		$email = get_sub_field('contact'); 
		?>	
			<div class="col quarter">
				<div class="job-info">
						<h4><?php echo $title; ?></h4>
						<p><?php echo $location; ?></p>
						<p><?php echo $hours; ?></p>
						<p>email <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>

				</div>
			</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
/*-- we don't want the sidebar on the homepage
 get_sidebar(); 
 --*/
get_footer();
