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
		<div class="col twothird">
		<h1><?php the_title(); ?></h1>	
		<p><?php echo $copy; ?></p>
		<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>

<section id="positions">
	<div class="row jobs-menu">
	<?php if( have_rows('positions') ): while( have_rows('positions') ): the_row(); 
$terms = get_field('job_category');
 ?>
    <ul>
    <?php if( $terms ): foreach( $terms as $term ): ?>
        <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>">View all '<?php echo esc_html( $term->name ); ?>' posts</a></li>
    <?php endforeach; else : endif; ?>
    </ul>
<?php endwhile; else : endif; ?>
	</div>
	<div class="row jobs">
	<?php if( have_rows('positions') ): while( have_rows('positions') ): the_row(); 
		$title = get_sub_field('job_title'); 
		$location = get_sub_field('location'); 
		$hours = get_sub_field('hours'); 
		$email = get_sub_field('email_address'); 

		?>
			<div class="col quarter">
				<div class="job-info">
						<h4><?php echo $title; ?></h4>
						<p><?php echo $location; ?></p>
						<p><?php echo $hours; ?></p>
						<p>email <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>

				</div>
			</div>
			<?php endwhile; else : ?>
			<p class="novacancies">We have no current vacancies at present.</p>
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
