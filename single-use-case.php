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
		$copy = get_sub_field('intro_copy'); 
		$cta = get_sub_field('cta_text'); 
		$link = get_sub_field('cta_link'); 
?>		
<section id="above-fold" class="use-case">
	<div class="row">
		<div class="col twothird">
		<h1><?php the_title(); ?></h1>	
		<div class="intro-copy"><?php echo $copy; ?></div>
		<button class="button red" onclick="window.location.href = '<?php echo $link; ?>';"><?php echo $cta; ?></button>
		</div>
		<div class="col third"><img class="abovefoldimage" src="http://new.signoi.com/wp-content/uploads/2019/12/signoi-logo-cropped-07.svg"></div>
	</div>
</section>
<?php endwhile; else : endif; ?>

<section id="use-cases-menu">
	<div class="row">
		<div class="col full">
		<h2>Use Cases</h2>
		<nav class="footermenu"><?php wp_nav_menu( array( 'theme_location' => 'usecases-menu', 'container_class' => 'usecases-menu' ) ); ?></nav>
		</div>
		</div>	
</section>
<?php if( have_rows('main_content') ): 
		while( have_rows('main_content') ): the_row(); 
?>

	<?php if( have_rows('content_row') ): 
				while( have_rows('content_row') ): the_row(); 
				$title = get_sub_field('section_title');
				$copy = get_sub_field('section_copy');
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
				<section class="use-case-content even">
					<div class="signoi-logo-background"><img src="http://new.signoi.com/wp-content/uploads/2019/12/signoi-logo-grey-full-04.svg"></div>
				<div class="row even">
				<div class="col half image-col"><img src="<?php echo esc_url($fullimage); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
		<div class="col half text-col">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $copy; ?></p>
		</div>
			</div>
				</section>
			<?php } else { ?>
				<section class="use-case-content odd">
			<div class="row odd">
		<div class="col half text-col">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $copy; ?></p>
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
?>
<section id="callback-cta">
	<div class="row">
		<div class="col full">
			<h3><?php echo $title; ?></h3>	
			<p><?php echo $copy; ?></p>
			<button class="button white" onclick="window.location.href = '#opencallform';">Schedule A Call</button>
		</div>
	</div>
</section>	
<?php endwhile; else : endif; ?>

<?php
$args = array(
    'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
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
  <div class="blog-image"><img width="400" height="284" src="<?php echo $image[0]?>" alt="<?php echo $alt[0]?>"></div>
	<div class="blog-text-area">
  <div class="blog-category"><?php the_category( ' | ' ); ?></div>
  <div class="reading-time"><i class="fal fa-clock" aria-hidden="true"></i> <?php echo $readingtime ?> min read</div>
  <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
  <div class="blog-meta"><span class="blog-author">by <?php echo $author ?></span> <span class="blog-date"><?php the_date(); ?></span></div>
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
