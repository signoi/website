<?php
/**
 * The template for displaying all use cases
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
<section id="above-fold" class="use-case">
	<div class="row">
		<div class="col full">
		<h1><?php the_title(); ?></h1>	
		<p><?php echo $copy; ?></p>
		<button class="button yellow" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
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
<section id="use-cases-menu">
	<div class="row">
		<div class="col full">
		<ul class="usecases-menu">
			<?php while ( $arr_posts->have_posts() ) : 
					$arr_posts->the_post();
					$slug = get_post_field( 'post_name', get_post() );
					?>
					<li><class="usecase post<?php $c++; if($c == 1) { echo ' active'; } ?>" id="<?php echo $slug; ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>

			</ul>
		</div>
		</div>	
</section>
<?php 
endif;
wp_reset_postdata();
?>
<?php if( have_rows('main_content') ): 
		while( have_rows('main_content') ): the_row(); 
?>

<section id="use-case-content">
	<?php if( have_rows('content_row') ): 
				while( have_rows('content_row') ): the_row(); 
				$title = get_sub_field('blurb_title');
				$copy = get_sub_field('blurb_copy');
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
				if( get_row_index() % 2 == 0 ){
				?>
			<div class="row">
		<div class="col half">
			<h3><?php echo $title; ?></h3>
			<p><?php echo $copy; ?></p>
		</div>
		<div class="col half"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
			</div>
			<?php } else { ?>
				<div class="row">
				<div class="col half"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
		<div class="col half">
			<h3><?php echo $title; ?></h3>
			<p><?php echo $copy; ?></p>
		</div>
			</div>
		<?php } endwhile; else : endif; ?>
</section>
<?php endwhile; else : endif; ?>

<?php if( have_rows('cta_section') ): 
		while( have_rows('cta_section') ): the_row(); 
		$title = get_sub_field('section_title'); 
		$copy = get_sub_field('section_copy'); 
?>
<section id="subscribe-cta">
	<div class="row">
		<div class="col full">
			<h3><?php echo $title; ?></h3>	
			<p><?php echo $copy; ?></p>
			<div class="phone-form">
				<form>
					<input type="text" placeholder="email address" name="phonenumber">
         			<input type="submit" class="button grey" value="subscribe">
      			</form>
			</div>
		</div>
	</div>
</section>	
<?php endwhile; else : endif; ?>

<?php
$args = array(
    'post_type' => 'post',
	'post_status' => 'publish',
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) : 
	$post = $posts[0]; $c=0; ?>
<section id="recent-posts">
<div class="row">
<?php while ( $arr_posts->have_posts() ) : 
					$arr_posts->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog' );
					$thumb_id = get_post_thumbnail_id();
					$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					$slug = get_post_field( 'post_name', get_post() );
					?>

<div class="col third">
<div class="single-blog-item">
  <div class="blog-inner">
    <a class="blog-link" href="<?php the_permalink(); ?>"></a>
  <div class="blog-image"><img width="400" height="284" src="<?php echo $image[0]?>" alt="<?php echo $alt[0]?>"></div>
	<div class="blog-text-area">
  <div class="blog-category"><a href="http://new.signoi.com/category/discover-signoi/">Discover Signoi</a><span class="separator"> | </span><a href="http://new.signoi.com/category/discover-signoi/universal-energies/">Universal Energies</a></div>
  <div class="reading-time"><i class="fal fa-clock" aria-hidden="true"></i> 2 min read</div>
  <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
  <div class="blog-meta"><span class="blog-author">by Andy Dexter</span> <span class="blog-date">January 29, 2019</span></div>
 </div>
    </div>
</div>
</div>
<?php endwhile; ?>
</div>
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
