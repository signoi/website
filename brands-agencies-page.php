<?php
/**
 * Template Name: Signoi For Brands / Agencies
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		$copy = get_sub_field('intro_copy'); 
?>		
<section id="above-fold">
	<div class="row intro">
		<div class="col twothird">
		<h1><?php the_title(); ?></h1>	
		<div><?php echo $copy; ?></div>
		</div>
	</div>
	<div class="row blurbs">
	<?php if( have_rows('section_blurbs') ): 
		while( have_rows('section_blurbs') ): the_row(); 
		$blurbtitle = get_sub_field('blurb_title');
		$blurbcopy = get_sub_field('blurb_copy');
		$image = get_sub_field('blurb_icon'); 
		if( $image ):

			// Image variables.
			$url = $image['url'];
			$imagetitle = $image['title'];
			$alt = $image['alt'];
		
			// Thumbnail size attributes.
			$size = 'large';
			$fullimage = $image['sizes'][ $size ];
		endif;
		?>
		<div class="col third">
			<div class="blurb-inner">
				<img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" />	
				<h3><?php echo $blurbtitle; ?></h3>
				<p><?php echo $blurbcopy; ?></p>	
			</div>
		</div>
		<?php endwhile; else : endif; ?>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php
$args = array(
    'post_type' => 'use-case',
	'post_status' => 'publish',
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) : 
	$post = $posts[0]; $c=0; ?>
<section id="use-cases">
	<div class="row">
		<div class="col full"><h2>Use Cases</h2>
		</div>	

	</div>
	<div class="row">
		<div class="col full"> <div class="carousel usecases">
		<div class="flipster"><ul>
		<?php
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	$thumb_id = get_post_thumbnail_id();
	$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
	$slug = get_post_field( 'post_name', get_post() );
?>
		<li data-flip-title="<?php the_title(); ?>">
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?> 
			<div class="report-featured-image"><img src="<?php echo $image[0]?>"></div>
			<button class="button red" onclick="window.location.href = '<?php the_permalink(); ?>';">Read More</button>
	</li>
	<?php endwhile; ?>
	</ul></div>
	</div></div>
	</div>
</section>
<?php 
endif;
wp_reset_postdata();
?>

<section id="case-studies">
	<div class="row intro">
		<div class="col full">
			<div class="header-with-image"><img class="inline logo" src="/wp-content/uploads/2019/12/Signoi-Website-HOME-template-3d-CS6-02.svg"><h2>Case Studies</h2></div>
		</div>
	</div>
	<div class="row tabs">
		<?php if( have_rows('case_studies') ): 		
		?>		
		<div class="col full case-study-tabs">
		<div id="tabs">
		<ul>
		<?php while( have_rows('case_studies') ): the_row(); 
				$title = get_sub_field('title'); 
				$copy = get_sub_field('copy'); 		
		?>	
			<li><a href="#slide-<?php echo get_row_index(); ?>"><?php echo $title ?></a></li>
		<?php endwhile; ?>
			</ul>
			<div class="tab-content-area">
		<?php while( have_rows('case_studies') ): the_row(); 
			$title = get_sub_field('title'); 
			$copy = get_sub_field('copy'); 		
		?>	
			<div class="tab" id="slide-<?php echo get_row_index(); ?>">
			<h3><?php echo $title ?></h3>
			<?php echo $copy ?>
			</div>
		<?php endwhile; ?>
			</div>
		</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<section id="callback-cta">
	<div class="row">
		<div class="col full">
			<h3>Get in Touch</h3>	
<div class="book-demo-button onpage"><!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<a class="button yellow" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/signoi/demo'});return false;">Schedule a call</a>
<!-- Calendly link widget end --></div>
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
