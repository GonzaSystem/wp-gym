jQuery(document).ready(function($) {
	$('.site-header .main-menu .menu').slicknav({
		label: '',
		appendTo: '.site-header'
	});

	// bxSlider
    if($('.testimonials-list').length > 0 ) {
        $('.testimonials-list').bxSlider({
            auto: true, 
            mode: 'horizontal', 
            controls: false
        });
    }  

	// Leaftlet
	if(document.querySelector('#lat') != null) {
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
	}

	checkNavbar();
});

// Fixed header when scrolling
window.onscroll = checkNavbar;

function checkNavbar() {
	const scroll = window.scrollY;
	const headerNav = document.querySelector('.site-navbar');
	const documentBody = document.querySelector('body');

	if(scroll > 300) {
		headerNav.classList.add('fixed-top');
		documentBody.classList.add('active-ft');
	} else {
		headerNav.classList.remove('fixed-top');
		documentBody.classList.remove('active-ft');
	}
}