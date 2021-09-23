<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); // to bring the wp_enqueue_scripts ?> 
</head>
<body <?php body_class(); //generates unique classes for the body ?>>

<header class="site-header">
	<div class="container header-grid">
		<div class="site-navbar">
			<div class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo">
			</div>

			<!-- Navbar register -->
			<?php 
				$args = array(
					'theme_location' => 'main-menu', // points to the gymfitness_menu function
					'container' => 'nav', // wordpress generates the HTML,
					'container_class' => 'main-menu' // css class for styles
				);
				wp_nav_menu( $args ); 
			?>
		</div>
		<!-- .site-navbar -->
		<div class="tagline text-center">
			<h1><?php the_field('hero_header'); ?></h1>
			<p><?php the_field('hero_content'); ?></p>
		</div>
	</div>
</header>