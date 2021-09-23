<?php 
// Declaring template
/*
* Template Name: Centered (No sidebars)
*/
?>
<?php get_header(); ?>
	<main class="container page section no-sidebar">
		<div class="main-content">
			<?php get_template_part( 'template-parts/pages' ); ?>
		</div>
	</main>
<?php get_footer(); ?>