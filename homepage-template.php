<?php
/**
 * Template Name: Homepage Template
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
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
		$cta = get_sub_field('cta_text'); 
		$link = get_sub_field('cta_link'); 
		$image = get_sub_field('background_image'); 
		$backgroundcolor = get_sub_field('background_colour'); 
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
<section id="above-fold" style="background-color: <?php echo $backgroundcolor; ?>;">
<div class="background-image"  style="background-image: url(http://new.signoi.com/wp-content/uploads/2019/12/Signoi-Website-HOME-template-3d-CS6-03.svg);"></div>
	<div class="row">
		<div class="col full">
		<h2><?php echo $title; ?></h2>	
		<p><?php echo $copy; ?></p>
		<button class="button yellow" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  //Carousel initialization
  var options = {
	indicators: false,
		duration: 300,
		numVisible: 3,
		dist: -100,
		shift: -500,
		padding: 20 
  };
  var elems = document.querySelectorAll('.carousel');
  var instances = M.Carousel.init(elems, options);

})
 jQuery(document).ready(function(){
	jQuery('.slide-prev').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            jQuery('.carousel.usecases').carousel('prev')
        });
	jQuery('.slide-next').click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		jQuery('.carousel.usecases').carousel('next')
	});
	
	jQuery('.usecases-menu li a').on("click", function() {
		jQuery('.usecases-menu li a.active').not(this).removeClass('active');
		jQuery(this).toggleClass('active');
		var elem = document.querySelector('.carousel');
		var instance = M.Carousel.getInstance(elem);
		var move_to = jQuery(this).data("slidenumber")
		instance.set(move_to);
   }); 
   
  });
</script>
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
			<div class="background-slide"></div> <!-- ugh but I can't work out how to hide the back slides otherwise because I had to use !important to override the opacity -->
		<ul class="usecases-menu">
			<?php while ( $arr_posts->have_posts() ) : 
					$arr_posts->the_post();
					$slug = get_post_field( 'post_name', get_post() );
					?>
					<li data-slidenumber="<?php echo $c ?>"><a class="usecase post<?php $c++; if($c == 1) { echo ' active'; } ?>" id="<?php echo $slug; ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>

			</ul>
        <div class="carousel-fixed-item center pagination">
            <a class="slide-prev">Prev</a>
            <a class="slide-next">Next</a>
        </div>
		<?php
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	$thumb_id = get_post_thumbnail_id();
	$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
	$slug = get_post_field( 'post_name', get_post() );
?>
		<div class="carousel-item">
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?> 
			<div class="report-featured-image"><img src="<?php echo $image[0]?>"></div>
			<button class="button red" onclick="window.location.href = '<?php the_permalink(); ?>';">Read More</button>
		</div>
	<?php endwhile; ?>
	</div></div>
	</div>
</section>
<?php 
endif;
wp_reset_postdata();
?>
<?php if( have_rows('customer_comments') ): 
		while( have_rows('customer_comments') ): the_row(); 
		$title = get_sub_field('section_title'); 
?>
<script type="text/javascript">
jQuery(window).load(function() {
	    //slider for testimonials
  jQuery('.flexslider.comments').flexslider({
    animation: "slide",
   slideshow: false,
	  animationSpeed: 1000
  });
});
</script>
<section id="customer-comments">
	<div class="row">
		<div class="col full">
		<h2><?php echo $title; ?></h2>
		<?php if( have_rows('comments') ): ?>
			<div class="flexslider comments"><ul class="slides">	
			<?php while( have_rows('comments') ): the_row(); 
				$comment = get_sub_field('comment');
				?>
				<li><div class="quote-before"></div><div class="comment"><?php echo $comment; ?></div><div class="quote-after"></div></li>
		<?php endwhile; ?>	
		</ul></div>	
		<?php endif; ?>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>

<?php if( have_rows('call_back_cta') ): 
		while( have_rows('call_back_cta') ): the_row(); 
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
		$backgroundcolor = get_sub_field('background_colour'); 
?>
<section id="callback-cta" style="background-color: <?php echo $backgroundcolor; ?>;">
	<div class="row">
		<div class="col full">
			<h2><?php echo $title; ?></h2>	
			<p><?php echo $copy; ?></p>
			<div class="phone-form">
				<form>
					<input type="text" placeholder="phone number" name="phonenumber">
         			<input type="submit" class="button grey" value="send">
      			</form>
			</div>
		</div>
	</div>
</section>	
<?php endwhile; else : endif; ?>

<?php if( have_rows('quantitative_semiotics') ): 
		while( have_rows('quantitative_semiotics') ): the_row(); 
		$image = get_sub_field('section_image'); 
		if( $image ):

			// Image variables.
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
		
			// Thumbnail size attributes.
			$size = 'large';
			$fullimage = $image['sizes'][ $size ];
		endif;

?>
<section id="quantitative-semiotics">
	<div class="row">
		<div class="col full"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
	</div>
	<div class="row">
	<?php if( have_rows('section_blurbs') ): 
				while( have_rows('section_blurbs') ): the_row(); 
				$title = get_sub_field('blurb_title');
				$copy = get_sub_field('blurb_copy');
				?>
		<div class="col half">
			<h3><?php echo $title; ?></h3>
			<p><?php echo $copy; ?></p>
		</div>
		<?php endwhile; else : endif; ?>
	</div>
</section>
<?php endwhile; else : endif; ?>

<?php if( have_rows('about') ): 
		while( have_rows('about') ): the_row(); 
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
		$cta = get_sub_field('cta_text'); 
		$link = get_sub_field('cta_link'); 
		$backgroundcolor = get_sub_field('background_colour'); 
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
<section id="about" style="background-color: <?php echo $backgroundcolor; ?>">
	<div class="row">
		<div class="col half">
		<h2><?php echo $title; ?></h2>
		<p><?php echo $copy; ?></p>
		<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
		<div class="col half">
		<div class="round-image"><img src="<?php echo esc_url($imagesquare); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>

<script type="text/javascript">
jQuery(window).load(function() {
	    //slider for reports
  jQuery('.flexslider.reports').flexslider({
    animation: "slide",
   slideshow: false,
	  animationSpeed: 1000
  });
});
</script>
<?php
$args = array(
    'post_type' => 'report',
    'post_status' => 'publish',
    'posts_per_page' => 4,
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) : ?>
<section id="reports">
<div class="row"><div class="col full">
 <div class="flexslider reports"><ul class="slides">	
	 <?php
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	$thumb_id = get_post_thumbnail_id();
	$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
?>
				<li><div class="report row">
					<div class="col half"><div class="report-featured-image" style="background-image: url(<?php echo $image[0]?>);"></div></div>
					<div class="col half">
						<h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
					</div>
				</div></li>

<?php
	endwhile; ?>
</ul></div>	
</div></div>
</section>
<?php 
endif;
wp_reset_postdata();
?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/*-- we don't want the sidebar on the homepage
 get_sidebar(); 
 --*/
get_footer();
