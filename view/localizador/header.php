
<link rel="icon" type="image/x-icon" href="<?=RUTA_RES?>assets/img/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="<?=RUTA_RES?>assets/fonts/fontawesome.css">
<link rel="stylesheet" href="<?=RUTA_RES?>assets/fonts/ionicons.css">
<link rel="stylesheet" href="<?=RUTA_RES?>assets/fonts/open-iconic.css">
<link rel="stylesheet" href="<?=RUTA_RES?>assets/fonts/feather.css">



<link rel="stylesheet" href="<?=RUTA_RES?>assets/css/bootstrap-material.css">
<link rel="stylesheet" href="<?=RUTA_RES?>assets/css/shreerang-material.css">
<link rel="stylesheet" href="<?=RUTA_RES?>assets/css/uikit.css">

<link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700"
      rel="stylesheet"
    />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script>
    <link
      href="https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css"
      rel="stylesheet"
    />
    
<style>

.sidebar {
        position: -webkit-sticky;
        width: 30%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        border-right: 1px solid rgba(0, 0, 0, 0.25);
      }
      .pad2 {
        padding: 20px;
      }

      .map {
        position: fixed;
        left: 43.8%;
        width: 55%;
        height: 100%;
        top: 0;
        bottom: 0;
        right: 20%;
      }

      h1 {
        font-size: 22px;
        margin: 0;
        font-weight: 400;
        line-height: 20px;
        padding: 20px 2px;
      }

      a {
        color: #404040;
        text-decoration: none;
      }

      a:hover {
        color: #101010;
      }

      .heading {
        background: #fff;
        border-bottom: 1px solid #eee;
        min-height: 60px;
        line-height: 60px;
        padding: 0 10px;
        background-color: #6c5ce7;
        color: #fff;
      }

      .listings {
        height: 100%;
        overflow: auto;
        padding-bottom: 60px;
      }

      .listings .item {
        display: block;
        border-bottom: 1px solid #eee;
        padding: 10px;
        text-decoration: none;
      }

      .listings .item:last-child {
        border-bottom: none;
      }
      .listings .item .title {
        display: block;
        color: #6c5ce7;
        font-weight: 700;
      }

      .listings .item .title small {
        font-weight: 400;
      }
      .listings .item.active .title,
      .listings .item .title:hover {
        color: #8cc63f;
      }
      .listings .item.active {
        background-color: #f8f8f8;
      }
      ::-webkit-scrollbar {
        width: 3px;
        height: 3px;
        border-left: 0;
        background: rgba(0, 0, 0, 0.1);
      }
      ::-webkit-scrollbar-track {
        background: none;
      }
      ::-webkit-scrollbar-thumb {
        background: #6c5ce7;
        border-radius: 0;
      }

      .marker {
        border: none;
        cursor: pointer;
        height: 56px;
        width: 56px;
        background-image: url(./res/img/marker.png);
        background-color: rgba(0, 0, 0, 0);
      }

      .clearfix {
        display: block;
      }
      .clearfix:after {
        content: '.';
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
      }

      /* Marker tweaks */
      .mapboxgl-popup {
        padding-bottom: 50px;
      }

      .mapboxgl-popup-close-button {
        display: none;
      }
      .mapboxgl-popup-content {
        font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
        padding: 0;
        width: 275px;
      }
      .mapboxgl-popup-content-wrapper {
        padding: 1%;
      }
      .mapboxgl-popup-content h3 {
        background: #a29bfe;
        color: #fff;
        margin: 0;
        display: block;
        padding: 10px;
        border-radius: 3px 3px 0 0;
        font-weight: 700;
        margin-top: -15px;
      }

      .mapboxgl-popup-content h4 {
        margin: 0;
        display: block;
        padding: 10px 10px 10px 10px;
        font-weight: 400;
      }

      .mapboxgl-popup-content div {
        padding: 10px;
      }

      .mapboxgl-container .leaflet-marker-icon {
        cursor: pointer;
      }

      .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
        margin-top: 15px;
      }

      .mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
        border-bottom-color: #a29bfe;
      }
	  .text-center{
		  text-align:center
	  }
</style>