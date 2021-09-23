<?php while( have_posts() ) : the_post(); ?>
	<li class="card gradient">
		<?php the_post_thumbnail( 'customMedium' ); ?>
		<?php the_category(); //get all related categories ?>
		<div class="content">
			<a href="<?php the_permalink(); ?>">
				<h3><?php the_title(); ?></h3>
			</a>
			<p class="meta">
				<span>Por: </span>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); // link to the user that made the post to show all the other entries ?>">
					<?php echo get_the_author_meta( 'display_name' ); // as security advice, needs to fill user names and use it as display name?>
				</a>

				
			</p>
			<p class="meta">
				<span>Fecha: </span>
				<?php the_time( get_option( 'date_format' ) ); // Date of the post ?>
			</p>
		</div>
	</li>
<?php endwhile; ?>