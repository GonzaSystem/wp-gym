<?php get_header(); ?>
	<main class="page section no-sidebars container">
		<ul class="blog-list">
			<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
		</ul>
	</main>
<?php get_footer(); ?>