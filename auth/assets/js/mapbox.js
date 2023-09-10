if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {

        var lng = position.coords.longitude;
        var lat = position.coords.latitude;

        mapboxgl.accessToken = 'pk.eyJ1IjoicHBhdWxvY2VzIiwiYSI6ImNsbWFxYWprbTBlYTMzaXA4NTJrOXFzMDcifQ.wzQmyXa6pq8Rwqid9XsaKA';

        var map = new mapboxgl.Map({
            container: 'map', // container ID
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [lng, lat], // starting center in [lng, lat]
            zoom: 5 // starting zoom
        });

        map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                // When active the map will receive updates to the device's location as it changes.
                trackUserLocation: true,
                // Draw an arrow next to the location dot to indicate which direction the device is heading.
                showUserHeading: true
            })
        );

    });
}