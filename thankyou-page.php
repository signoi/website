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
		<div class="col half report-content">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $copy; ?></p>
			<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
		<div class="col half report-image">
		<img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" />
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php if( have_rows('report_detail') ): 
		while( have_rows('report_detail') ): the_row(); 
		$lefttitle = get_sub_field('left_column_heading'); 
		$righttitle = get_sub_field('right_column_heading'); 

?>	
<section id="report-detail">
	<div class="row">
		<div class="col half">
			<h2><?php echo $lefttitle; ?></h2>
			<ul>
			<?php if( have_rows('left_column_list') ): 
		while( have_rows('left_column_list') ): the_row(); 
		$item = get_sub_field('item'); 
			?>
			<li><span><?php echo $item; ?></span></li>
			<?php endwhile; else : endif; ?>
			</ul>
		</div>
		<div class="col half">
		<h2><?php echo $righttitle; ?></h2>
			<ul>
			<?php if( have_rows('right_column_list') ): 
		while( have_rows('right_column_list') ): the_row(); 
		$item = get_sub_field('item'); 
			?>
			<li><span><?php echo $item; ?></span></li>
			<?php endwhile; else : endif; ?>
			</ul>
		</div>
	</div>
</section>
<?php endwhile; else : endif; ?>
<?php
$args = array(
    'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'ignore_sticky_posts' => true,
);
$arr_posts = new WP_Query( $args );
 
if ( $arr_posts->have_posts() ) : 
	$post = $posts[0]; $c=0; ?>
<section id="recent-posts">
<div class="row">
	<div class="col full"><h2>Read our latest content...</h2></div>
</div>
<div class="row">
<?php while ( $arr_posts->have_posts() ) : 
					$arr_posts->the_post();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog' );
					$thumb_id = get_post_thumbnail_id();
					$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					$slug = get_post_field( 'post_name', get_post() );
					$readingtime = types_render_field( 'reading-time', array() );
					$author = types_render_field( 'author-name', array() );
					
					?>

<div class="col third">
<div class="single-blog-item">
  <div class="blog-inner">
    <a class="blog-link" href="<?php the_permalink(); ?>"></a>
  <div class="blog-image"><img src="<?php echo $image[0]?>" alt="<?php echo $alt[0]?>"></div>
	<div class="blog-text-area">
  <div class="blog-category"><?php the_category( ' | ' ); ?></div>
  <div class="reading-time"><i class="fal fa-clock" aria-hidden="true"></i> <?php echo $readingtime ?> min read</div>
  <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
  <div class="blog-meta">
  <?php if(	(empty($author)) ) { ?><span class="blog-author">by <?php the_author(); } ?></span> 
  <?php if(	(!empty($author)) ) {  ?><span class="blog-author">by <?php echo $author; } ?></span> 
 <span class="blog-date"><?php the_date(); ?></span></div>
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
