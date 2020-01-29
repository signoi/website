<?php
/**
 * Template Name: About Page
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
		<div class="col eighty">
		<h1><?php the_title(); ?></h1>	
		<?php echo $copy; ?>
		<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php if( have_rows('meet_our_team') ): 
		while( have_rows('meet_our_team') ): the_row(); 
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
		$image = get_sub_field('section_image'); 

		if( $image ):

			// Image variables.
			$url = $image['url'];
			$imagetitle = $image['title'];
			$alt = $image['alt'];
		
			// Thumbnail size attributes.
			$size = 'square';
			$imagesquare = $image['sizes'][ $size ];
		endif;

?>
<section id="about">
	<div class="row">
		<div class="col half">
		<h2><?php echo $title; ?></h2>
		<?php echo $copy; ?>
		</div>
		<div class="col half">
		<div class="round-image"><img src="<?php echo esc_url($imagesquare); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
		</div>
	</div>
</section>
	<?php endwhile; else : endif; ?>

<section id="callback-cta">
	<div class="row">
		<div class="col full">
			<h3>Careers</h3>	
			<p>We are always looking for new members of our team.</p>
			<button class="button red" onclick="window.location.href = '/careers';">Browse our current positions</button>
		</div>
	</div>
</section>	

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
/*-- we don't want the sidebar on the homepage
 get_sidebar(); 
 --*/
get_footer();
