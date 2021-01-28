
<script src="<?=RUTA_RES?>assets/js/pace.js"></script>
<script src="<?=RUTA_RES?>assets/libs/popper/popper.js"></script>
<script src="<?=RUTA_RES?>assets/js/bootstrap.js"></script>
<script src="<?=RUTA_RES?>assets/js/sidenav.js"></script>
<script src="<?=RUTA_RES?>assets/js/layout-helpers.js"></script>
<script src="<?=RUTA_RES?>assets/js/material-ripple.js"></script>

<script src="<?=RUTA_RES?>assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?=RUTA_RES?>assets/libs/datatables/datatables.js"></script>
<script src="<?=RUTA_RES?>assets/libs/numeral/numeral.js"></script>
<script src="<?=RUTA_RES?>assets/libs/nouislider/nouislider.js"></script>

<script src="<?=RUTA_RES?>assets/js/demo.js"></script><script src="<?=RUTA_RES?>assets/js/analytics.js"></script>
<script src="<?=RUTA_RES?>assets/js/pages/tables_datatables.js"></script>
<script src="<?=RUTA_RES?>assets/js/pages/ui_notifications.js"></script>

<script src="<?=RUTA_RES?>assets/js/tail.select-full.min.js"></script>

<script>
var data;
        let marker = new mapboxgl.Marker();

        mapboxgl.accessToken = 'pk.eyJ1Ijoiem9yZW0iLCJhIjoiY2tja3N0MjJhMXl1MTJ1bzVycm05ZmhnZyJ9.XQxL7kVaULUYHgezBkq36Q';
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-75.7301207038783, -14.069620264427215], // starting position
            zoom: 12 // starting zoom
        });

        map.on('mousemove', function (e) {
            //document.getElementById('info').innerHTML = JSON.stringify(e.lngLat.wrap());
            data=e.lngLat.wrap();
        });

        parent.addEventListener('click', function() {
		//parent.style.background = 'skyblue';
        console.log(data['lng']);
        console.log(data['lat']);
        marker.remove();
        marker = new mapboxgl.Marker()
        .setLngLat([data['lng'], data['lat']])
        .addTo(map);
	    });
</script>