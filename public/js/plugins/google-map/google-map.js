	window.onload = loadScript;

	function loadScript() {
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD0uEp6CyKxpfDPvS4deOiXq9SKAooEbds&sensor=true&' +
			'callback=initialize';
		document.body.appendChild(script);
	}

	var geocoder, map;
	
	function initialize() {
		geocoder = new google.maps.Geocoder();

		var styles = [
			{
				"stylers": [
					{ "visibility": "on" }
				]
			},
			{
				"featureType": "landscape.natural",
					"stylers": [
						{ "visibility": "simplified" },
						{ "color": "#f0f0f0" }
					]
			},
			{
				"featureType": "water",
				"stylers": [
					{ "visibility": "simplified" },
					{ "color": "#C2E7F5" }
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
					{ "visibility": "simplified" },
					{ "color": "#ffffff" }
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry.stroke",
				"stylers": [
					{ "visibility": "off" }
				]
			},
			{
				"featureType": "road.local",
				"elementType": "labels.icon",
				"stylers": [
					{ "visibility": "off" }
				]
			},
			{
				"elementType": "labels.text.fill",
				"stylers": [
					{ "visibility": "on" },
					{ "color": "#646464" }
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry.fill",
				"stylers": [
					{ "visibility": "on" },
					{ "weight": 1 },
					{ "color": "#ffffff" }
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry.fill",
				"stylers": [
					{ "lightness": 90 },
					{ "color": "#d7d7d7" },
					{ "visibility": "off" }
				]
			},
			{
				"featureType": "transit",
				"elementType": "geometry",
				"stylers": [
					{ "visibility": "on" },
					{ "color": "#ffffff" }
				]
			},
			{
				"featureType": "road.local",
				"elementType": "labels.text.fill",
				"stylers": [
					{ "visibility": "on" },
					{ "color": "#b8b8b8" }
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry",
				"stylers": [
					{ "visibility": "on" },
					{ "lightness": 60 },
					{ "saturation": -90 },
					{ "gamma": 0.90 }
				]
			}
		];
		
		var styledMap = new google.maps.StyledMapType(styles, {
			name: "Styled Map"
		});
			
		var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			panControl: false,
			scaleControl: false,
			mapTypeControlOptions: {
				mapTypeIds: []
			}
		};
		
		var mapPlaceholder = document.getElementById('custom-map-canvas');

		if(mapPlaceholder) {
			customMap = new google.maps.Map(mapPlaceholder, mapOptions);
			customMap.mapTypes.set('map_style', styledMap);
			customMap.setMapTypeId('map_style');
			codeAddress(customMap);
		}

		mapPlaceholder = document.getElementById('map-canvas');

		if(mapPlaceholder) {
			defaultMap = new google.maps.Map(mapPlaceholder, mapOptions);
			codeAddress(defaultMap);
		}
	}



