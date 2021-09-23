<?php while( have_posts() ): the_post(); ?>
	<h1 class="text-center primary-text"><?php the_title(); ?></h1>
	<?php 
		if( has_post_thumbnail() ) :
			the_post_thumbnail('blog', array('class' => 'featured-image')); 
		endif;
	?>

	<?php
		// if post type is class
		if( get_post_type() == 'gymfitness_clases' ) {
			$start_hour = get_field('hora_inicio');
			$end_hour = get_field('hora_fin'); ?>
			<p class="class-info"><?php the_field('dias_de_clase'); ?> - <?php echo $start_hour ?> a <?php echo $end_hour; ?></p>
	<?php } ?>

	<?php the_content(); ?>
<?php endwhile; ?>