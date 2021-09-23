<?php 
/*
* Template Name: Gallery template
*/
?>

<?php get_header(); ?>
	<main class="container page section">
		<div class="main-content">
			<?php while( have_posts() ): the_post(); ?>
				<h1 class="text-center primary-text"><?php the_title(); ?></h1>

				<?php 
					$gallery = get_post_gallery( get_the_ID(), false );
					$theImagesID = explode(',', $gallery['ids']);
				?>

				<ul class="image-gallery">
					<?php
						foreach($theImagesID as $k => $theImageID):
							$size = ($k == 3 || $k == 5) ? 'portrait' : 'square';
							$thumbnailImg = wp_get_attachment_image_src( $theImageID, $size )[0];
							$image = wp_get_attachment_image_src( $theImageID, 'full')[0];
					?>
							<li>
								<a href="<?php echo $image; ?>" data-lightbox="gallery">
									<img src="<?php echo $thumbnailImg; ?>" alt="img">
								</a>
							</li>
					<?php
						endforeach;
					?>
				</ul>
			<?php endwhile; ?>
		</div>
	</main>
<?php get_footer(); ?>