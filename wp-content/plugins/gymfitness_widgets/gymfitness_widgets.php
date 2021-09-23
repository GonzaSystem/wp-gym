<?php
/*
	Plugin Name: Gym Fitness - Widgets
	Plugin URI:
	Description: Añade Widgets al sitio Gym Fitness
	Version: 1.0.0
	Author: Gonzalo Gomez
	Author URI: https://ggcode.com.ar
	Text Domain: gymfitness
*/
if( ! defined( 'ABSPATH' )) die();

/**
 * Adds GymFitness_Clases_widget widget.
 */
class GymFitness_Clases_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'GymFitness Clases', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Agrega las clases como widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$quantity = $instance['quantity'] != '' ? $instance['quantity'] : 3;
		?>

		<ul>
			<?php 
				// Querying clases
				$args = array(
					'post_type' => 'gymfitness_clases',
					'posts_per_page' => $quantity,
					'orderby' => 'rand',
				);

				$clases = new WP_Query( $args );
				while( $clases->have_posts() ): $clases->the_post();
			?>

				<li class="class-sidebar">
					<div class="image">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
					</div>

					<div class="class-content">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
						</a>
						<?php
							$start_hour = get_field('hora_inicio');
							$end_hour = get_field('hora_fin'); ?>
						<p><?php the_field('dias_de_clase'); ?> - <?php echo $start_hour ?> a <?php echo $end_hour; ?></p>
					</div>
				</li>
				
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>

		<?php
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__('¿Cuántas Clases deseas mostrar?', 'gymfitness' ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('quantity') ); ?>">
				<?php esc_attr_e( '¿Cuántas Clases deseas mostrar?', 'gymfitness' ); ?>
			</label>
			<input 
				id="<?php echo esc_attr( $this->get_field_id('quantity') ); ?>" 
				class="widefat" 
				name="<?php echo esc_attr( $this->get_field_name('quantity') ); ?>"
				type="number" 
				step="1"
				value="<?php echo esc_attr( $quantity ); ?>"
			/>
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_gymfitness_widget() {
    register_widget( 'GymFitness_Clases_widget' );
}
add_action( 'widgets_init', 'register_gymfitness_widget' );