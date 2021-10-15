<?php get_header(); ?>
	<main class="page section no-sidebars container">
		<?php 
			$category = get_queried_object(); 
		?>
		<h2 class="text-center primary-text">
			Categor&iacute;a: <?php echo $category->name; ?>
		</h2>
		<ul class="blog-list">
			<?php while( have_posts() ) : the_post();
				get_template_part( 'template-parts/loop', 'blog' );
			endwhile; ?>
		</ul>
	</main>
<?php get_footer(); ?>