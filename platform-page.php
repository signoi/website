<?php
/**
 * Template Name: Platform Page
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
$subtitle = get_sub_field('subheading'); 
?>		
<section class="stick" id="above-fold">
	<div class="row intro">
		<div class="col twothird">
		<h1><?php the_title(); ?></h1>	
		<p class="subheading"><?php echo $subtitle; ?></p>
		<?php echo $copy; ?>
		</div>
		<div class="col third"><img class="abovefoldimage" src="http://new.signoi.com/wp-content/uploads/2019/12/signoi-logo-cropped-07.svg"></div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php if( have_rows('page_content') ): 
		while( have_rows('page_content') ): the_row(); 

		if( have_rows('section') ): 
			while( have_rows('section') ): the_row(); 
			$title = get_sub_field('section_title'); 			
			$copy = get_sub_field('section_copy'); 
			$subtitle = get_sub_field('subheading'); 
			$image = get_sub_field('section_image'); 
		if( $image ):

			// Image variables.
			$url = $image['url'];
			$imagetitle = $image['title'];
			$alt = $image['alt'];
		
			// Thumbnail size attributes.
			$size = 'large';
			$fullimage = $image['sizes'][ $size ];
		endif;
		if( get_row_index() % 2 == 0 ){
?>	
<section class="platform-section even stick">
<div class="row even">
		<div class="col half image-col"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
		<div class="col half platform-text">
		<p class="subheading"><?php echo $subtitle; ?></p>
			<h2><?php echo $title; ?></h2>
			<?php echo $copy; ?>
		</div>
</div>	
</section>
<?php } else { ?>
	<section class="platform-section odd">
<div class="row odd">
<div class="col half platform-text">
		<p class="subheading"><?php echo $subtitle; ?></p>
			<h2><?php echo $title; ?></h2>
			<?php echo $copy; ?>
		</div>
		<div class="col half image-col"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
</div>	
</section>
<?php } endwhile; else : endif; ?>
<?php endwhile; else : endif; ?>
<?php if( have_rows('cta_section') ): 
		while( have_rows('cta_section') ): the_row(); 
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
		$cta = get_sub_field('cta_text'); 
		$link = get_sub_field('cta_link'); 
?>
<section id="callback-cta">
	<div class="row">
		<div class="col full">
			<h3><?php echo $title; ?></h3>	
			<p><?php echo $copy; ?></p>
			<div class="book-demo-button onpage"><!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<a class="button red" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/signoi/demo'});return false;">Schedule a call</a>
<!-- Calendly link widget end --></div>
			</div>
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
