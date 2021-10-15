<?php get_header(); ?>
	<main class="page section no-sidebars container">
		<ul class="blog-list">
			<?php while( have_posts() ) : the_post();
				get_template_part( 'template-parts/loop', 'blog' );
			endwhile; ?>
		</ul>
	</main>
<?php get_footer(); ?>