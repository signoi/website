<?php
/**
 * Template Name: Contact Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Signoi
 */

get_header();
?>
<div id="book-call-trigger" class="fixed" style="cursor: pointer;">
  <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<a href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/signoi/demo'});return false;"><div class="mailing-list-text">Schedule a call <i class="fal fa-phone" aria-hidden="true"></i></div></a>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php if( have_rows('above_fold') ): 
		while( have_rows('above_fold') ): the_row(); 
		$copy = get_sub_field('section_copy'); 
		$title = get_sub_field('title'); 
?>		
<section id="above-fold">
	<div class="row intro">
		<div class="col full">
		<h1><?php echo $title; ?></h1>	
		<p><?php echo $copy; ?></p>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php $contact = get_field('contact_form'); ?>
<section id="contact">
	<div class="row">
<div class="col twothird">
<?php echo $contact; ?>
</div>
<?php if( have_rows('page_sidebar') ): 
		while( have_rows('page_sidebar') ): the_row(); 
		$title = get_sub_field('subhead'); 
		$image = get_sub_field('section_image'); 
		$name = get_sub_field('name'); 
		$jobtitle = get_sub_field('title'); 
		$twitter = get_sub_field('twitter_profile'); 
		$linkedin = get_sub_field('linkedin_profile'); 
		$map = get_sub_field('google_maps_link'); 
		$email = get_sub_field('email_address'); 
		if( $image ):

			// Image variables.
			$url = $image['url'];
			$imagetitle = $image['title'];
			$alt = $image['alt'];
		
			// Thumbnail size attributes.
			$size = 'square-small';
			$fullimage = $image['sizes'][ $size ];
		endif;
?>	
<div class="col third">
	<div class="meet-andy">
		<h3><?php echo $title; ?></h3>
		<div class="person-image"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
		<div class="name"><?php echo $name; ?></div>
		<div class="jobtitle"><?php echo $jobtitle; ?></div>
		<div class="socials"><a target="_blank" href="<?php echo $twitter; ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a><a target="_blank"  href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a></div>
	</div>
	<div class="book-demo-button onpage"><!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<a class="button red" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/signoi/demo'});return false;">Schedule a call</a>
<!-- Calendly link widget end --></div>
	<div class="address">
		<h3>Address</h3>
		<?php if( have_rows('address') ): 
				while( have_rows('address') ): the_row(); 
				$addressline = get_sub_field('address_line');
				?>
			<div class="addressline"><?php echo $addressline; ?></div>
		<?php endwhile; else : endif; ?>
		<div class="maplink"><a target="_blank" href="<?php echo $map; ?>"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>  Open in Google Maps</a></div>
		<div class="email"><a href="mailto:<?php echo $email; ?>"><i class="far fa-envelope" aria-hidden="true"></i> <?php echo $email; ?></a></div>
	</div>
</div>
	<?php endwhile; else : endif; ?>
</div>
</section>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
/*-- we don't want the sidebar on the homepage
 get_sidebar(); 
 --*/
get_footer();
