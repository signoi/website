<?php if( have_rows('team_members') ): 	?>	
<section id="team">
	<div class="row team-members">
		<?php while( have_rows('team_members') ): the_row(); 
				$name = get_sub_field('name'); 
				$job = get_sub_field('job_title'); 
				$email = get_sub_field('email_address'); 
				$image = get_sub_field('image'); 

				if( $image ):
		
					// Image variables.
					$url = $image['url'];
					$imagetitle = $image['title'];
					$alt = $image['alt'];
				
					// Thumbnail size attributes.
					$size = 'square-small';
					$imagesquare = $image['sizes'][ $size ];
				endif;	
		?>	
			<div class="col quarter">
				<div class="team-member">
					<div class="team-image"><img src="<?php echo esc_url($imagesquare); ?>" alt="<?php echo esc_attr($alt); ?>" /></div>
					<div class="team-info">
						<h4><?php echo $name; ?></h4>
						<p><?php echo $job; ?></p>
						<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>	