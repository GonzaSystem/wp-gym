<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); // to bring the wp_enqueue_scripts ?> 
</head>
<body>

<header class="site-header">
	<div class="container">
		<div class="site-navbar">
			<div class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo">
			</div>

			<!-- Navbar -->
			<?php 
				$args = array(
					'theme_location' => 'main-menu', // points to the gymfitness_menu function
					'container' => 'nav', // wordpress generates the HTML,
					'container_class' => 'main-menu' // css class for styles
				);
				wp_nav_menu( $args ); 
			?>
		</div>
	</div>
</header>