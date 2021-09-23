<?php

function gymfitness_location_shortcode( $atts ){
	$ubicacion = get_field('ubicacion');
	?>
	
	<div class="location">
		<input type="hidden" id="lat" value="<?php echo $ubicacion['lat']; ?>">
		<input type="hidden" id="lon" value="<?php echo $ubicacion['lng']; ?>">
		<input type="hidden" id="address" value="<?php echo $ubicacion['address']; ?>">
		<div id="map"></div>
	</div>

	<?php
}
add_shortcode( 'gymfitness_location', 'gymfitness_location_shortcode' );