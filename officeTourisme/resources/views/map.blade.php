<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
@extends('accueil')
@section('liste')
<style>
    #map{width: 100%; height: 100%;}
</style>

<div id="map"></div>

<script>
    var zoom = 10;
    var map = L.map('map').setView([14.679519097900359,-61.03380032812501],zoom);
    
    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=rkSFAhgghDzlz8a5YxAk',{
        attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);
    var marker =L.marker([14.679519097900359,-61.03380032812501]).addTo(map);
    marker.bindPopup("<b> Hey ! </b><br> Marker n°1").openPopup();
</script>
@stop