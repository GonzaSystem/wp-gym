<?php

function gymfitness_lista_clases($quantity = -1) { ?>
	<ul class="class-list">
		<?php
			$args = array(
				'post_type' => 'gymfitness_clases',
				'posts_per_page' => $quantity,
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$clases = new WP_Query( $args );

			while( $clases->have_posts() ): $clases->the_post(); ?>
				<li class="clase card gradient">
					<?php the_post_thumbnail('large'); ?>
					<div class="content">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
						</a>

						<?php
							$start_hour = get_field('hora_inicio');
							$end_hour = get_field('hora_fin');
						?>
						<p><?php the_field('dias_de_clase'); ?> - <?php echo $start_hour ?> a <?php echo $end_hour; ?></p>
					</div>
				</li>
			<?php endwhile; wp_reset_postdata(); // this is to let WP know that we're done with WP Query ?>
	</ul>
<?php }