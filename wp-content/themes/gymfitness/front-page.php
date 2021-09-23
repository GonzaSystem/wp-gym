<?php get_header( 'front' ); ?>

<section class="welcome text-center section">
	<h2 class="primary-text"><?php the_field('welcome_heading'); ?></h2>
	<p><?php the_field('welcome_text'); ?></p>
</section>

<?php get_footer(); ?>