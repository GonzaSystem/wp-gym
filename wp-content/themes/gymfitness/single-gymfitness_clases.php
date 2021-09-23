<?php get_header(); ?>
	<main class="container page section with-sidebar">
		<div class="main-content">
			<?php get_template_part( 'template-parts/pages' ); ?>
		</div>

		<?php get_sidebar( 'clases' ); ?>
	</main>
<?php get_footer(); ?>