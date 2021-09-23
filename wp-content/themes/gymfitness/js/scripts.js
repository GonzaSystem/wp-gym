jQuery(document).ready(function($) {
	$('.site-header .main-menu .menu').slicknav({
		label: '',
		appendTo: '.site-header'
	});


	// Leaftlet
	const lat = document.querySelector('#lat').value,
		  long = document.querySelector('#lon').value,
		  address = document.querySelector('#address').value;

	if(lat && long && address) {
		var map = L.map('map').setView([lat, long], 15);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		L.marker([lat, long]).addTo(map)
			.bindPopup(address)
			.openPopup();
	}
});