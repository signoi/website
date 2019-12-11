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
			  // getting slide number attribute
			var elem = document.querySelector('.carousel');
			var instance = M.Carousel.getInstance(elem);
			var move_to = jQuery(this).data("slidenumber");
		jQuery('.usecases-menu li a.active').not(this).removeClass('active');
		jQuery(this).toggleClass('active');
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
					<li><a data-slidenumber="<?php echo $c ?>" class="usecase post<?php $c++; if($c == 1) { echo ' active'; } ?>" id="<?php echo $slug; ?>"><?php the_title(); ?></a></li>
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