
		<footer class="site-footer container">
			<hr>
			
			<div class="footer-content">
				<!-- Navbar -->
				<?php 
					$args = array(
						'theme_location' => 'main-menu', // points to the gymfitness_menu function
						'container' => 'nav', // wordpress generates the HTML,
						'container_class' => 'main-menu' // css class for styles
					);
					wp_nav_menu( $args ); 
				?>
				<p class="copyright">Todos los derechos reservados. <?php echo get_bloginfo('name'); ?> <?php echo date('Y'); ?></p>
			</div>
		</footer>
		<?php wp_footer(); // This enables the admin bar at the top if you're logged in ?>
	</body>
</html>