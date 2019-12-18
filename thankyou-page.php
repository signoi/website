<?php
/**
 * Template Name: Thankyou Page
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
?>		
<section id="above-fold">
	<div class="row intro">
		<div class="col half">
		<h1><?php the_title(); ?></h1>	
		<p><?php echo $copy; ?></p>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php if( have_rows('report') ): 
		while( have_rows('report') ): the_row(); 
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
		$cta = get_sub_field('cta_text'); 
		$link = get_sub_field('cta_link'); 
		$image = get_sub_field('section_image'); 

		if( $image ):

			// Image variables.
			$url = $image['url'];
			$imagetitle = $image['title'];
			$alt = $image['alt'];
		
			// Thumbnail size attributes.
			$size = 'medium';
			$fullimage = $image['sizes'][ $size ];
		endif;
?>	
<section id="report-overview">
	<div class="row">
		<div class="col half">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $copy; ?></p>
			<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
		<div class="col half">
		<img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" />
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php if( have_rows('report_detail') ): 
		while( have_rows('report_detail') ): the_row(); 
		$learn = get_sub_field('what_youll_learn'); 
		$audience = get_sub_field('who_report_for'); 
?>	
<section id="report-detail">
	<div class="row">
		<div class="col half">
			<ul>
			<?php if( have_rows('what_youll_learn') ): 
		while( have_rows('what_youll_learn') ): the_row(); 
		$item = get_sub_field('item'); 
			?>
			<li><?php echo $item; ?></li>
			<?php endwhile; else : endif; ?>
			</ul>
		</div>
		<div class="col half">
			<ul>
			<?php if( have_rows('who_report_for') ): 
		while( have_rows('who_report_for') ): the_row(); 
		$item = get_sub_field('item'); 
			?>
			<li><?php echo $item; ?></li>
			<?php endwhile; else : endif; ?>
			</ul>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
/*-- we don't want the sidebar on the homepage
 get_sidebar(); 
 --*/
get_footer();
