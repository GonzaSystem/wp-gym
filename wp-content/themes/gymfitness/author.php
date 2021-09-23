<?php get_header(); ?>
	<main class="page section no-sidebars container">
		<?php 
			$author = get_queried_object(); 
		?>
		<h2 class="text-center primary-text">Autor: <?php echo $author->data->display_name; ?></h2>
		<p class="text-center"><?php echo get_the_author_meta( 'description', $author->data->ID ); ?></p>
		<ul class="blog-list">
			<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
		</ul>
	</main>
<?php get_footer(); ?>