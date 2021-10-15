<?php get_header( 'front' ); ?>

<section class="welcome text-center section">
	<h2 class="primary-text"><?php the_field('welcome_heading'); ?></h2>
	<p><?php the_field('welcome_text'); ?></p>
</section>

<div class="areas-section">
	<div class="areas-container">
		<li class="area">
			<?php
				$area1 = get_field('area_1');
				$imagen = wp_get_attachment_image_src($area1['area_imagen'], 'customMedium')[0];
			?>
			<img src="<?php echo esc_attr( $imagen ); ?>">
			<p><?php echo esc_html( $area1['area_texto'] ); ?></p>
		</li>
		<li class="area">
			<?php
				$area2 = get_field('area_2');
				$imagen = wp_get_attachment_image_src($area2['area_imagen'], 'customMedium')[0];
			?>
			<img src="<?php echo esc_attr( $imagen ); ?>">
			<p><?php echo esc_html( $area2['area_texto'] ); ?></p>
		</li>
		<li class="area">
			<?php
				$area3 = get_field('area_3');
				$imagen = wp_get_attachment_image_src($area3['area_imagen'], 'customMedium')[0];
			?>
			<img src="<?php echo esc_attr( $imagen ); ?>">
			<p><?php echo esc_html( $area3['area_texto'] ); ?></p>
		</li>
		<li class="area">
			<?php
				$area4 = get_field('area_4');
				$imagen = wp_get_attachment_image_src($area4['area_imagen'], 'customMedium')[0];
			?>
			<img src="<?php echo esc_attr( $imagen ); ?>">
			<p><?php echo esc_html( $area4['area_texto'] ); ?></p>
		</li>
	</div>
</div>

<section class="classes">
	<div class="container section">
		<h2 class="text-center primary-text">Nuestras Clases</h2>

		<?php gymfitness_lista_clases(4); ?>

		<div class="button-container">
			<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Nuestras Clases' ) ) ); ?>" class="btn btn-primary">Ver todas las clases</a>
		</div>
	</div>
</section>

<section class="instructors">
	<div class="container section">
		<h2 class="text-center primary-text">Nuestros Instructores</h2>
		<p class="text-center">Instructores profesionales para que logres tus objetivos</p>

		<ul class="instructors-list">
			<?php
				$args = array(
					'post_type' => 'instructores',
					'posts_per_page' => 30,
				);

				$instructors = new WP_Query( $args );

				while( $instructors->have_posts() ) : $instructors->the_post();
			?>

			<li class="instructor">
				<?php the_post_thumbnail('customMedium'); ?>
				<div class="content text-center">
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<div class="specialties">
						<?php 
							$esp = get_field( 'especialidad' ); 
							foreach($esp as $e): ?>
								<span class="etiqueta"><?php echo esc_html( $e ); ?></span>
						<?php
							endforeach;
						?>
					</div>
				</div>
			</li>

			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
</section>

<section class="testimonials">
	<h2 class="text-center text-white">Testimoniales</h2>

	<div class="testimonials-container">
		<ul class="testimonials-list">
			<?php
				$args = array(
					'post_type' => 'testimonials',
					'posts_per_page' => 10,
				);
				$testimonials = new WP_Query( $args );
				while( $testimonials->have_posts() ) : $testimonials->the_post(); 
			?>
			<li class="testimonial text-center">
				<blockquote>
					<?php the_content(); ?>
				</blockquote>

				<footer class="testimonial-footer">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<p><?php the_title(); ?></p>
				</footer>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
</section>

<section class="blog container section">
	<h2 class="text-center primary-text">Nuestro Blog</h2>
	<p class="text-center">Aprende tips de nuestros instructores</p>
	
	<ul class="blog-list">
		<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4,
			);

			$blog = new WP_Query( $args );

			while( $blog->have_posts() ) : $blog->the_post();
				get_template_part( 'template-parts/loop', 'blog' );
			endwhile; wp_reset_postdata(); 
		?>
	</ul>
</section>

<?php get_footer(); ?>