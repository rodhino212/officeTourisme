<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

@extends('accueil')
@section('liste')
<style>
    #map{width: 100%; height: 100%;}
</style>

<div id="map"></div>

<script>

    var zoom = 11;
    var map = L.map('map').setView([14.679519097900359,-61.03380032812501],zoom);
    
    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=rkSFAhgghDzlz8a5YxAk',{
        attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map);
    //var marker =L.marker([14.679519097900359,-61.03380032812501]).addTo(map);
    //marker.bindPopup("<b> Hey ! </b><br> Marker n°1").openPopup();
    //var popup = L.popup();

    /*function onMapClick(e) {
        var marker2 = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
    }

    map.on('click', onMapClick);*/






    tableCoordonnee= {};
    tableNom=[];
    var tst;
    const xhr_point =new XMLHttpRequest();
    const xhr_categorieId = new XMLHttpRequest();
    var tab_categorie;
    xhr_point.open('GET',"http://officetourisme.local/api/points");
    // xhr_point.onreadystatechange = function(ev){
    //     console.log(xhr_point.readyState);
    // }
    // onload = lors du chargement
    xhr_point.onload = () => {
        let data_point =JSON.parse(xhr_point.responseText); //on récupère en TEXT la table points(en JSON) que l'on stocke dans data_point

        // récupère le nom des attributs/colonnes de la table points
        result = Object.getOwnPropertyNames(data_point[0]);

        // on parcourt chaque ligne de résultat dans une fonction (functiontr)
        result.forEach(functiontr);

    // obj = result et i correspond au compteur (i=0; i<obj.length;i++)
        function functiontr(obj,i){
            //console.log(i+'test');
            //console.log(obj);
            
            
            if(obj=="coordonnees"){
                //console.log(obj+"if");
                data_point.forEach(func);
                function func(item,index){
                    var partie1 =item[obj].substr(0,item[obj].indexOf(',')); //récupère les informations avant la ","
                    var partie2 =item[obj].substr(item[obj].indexOf(',')+1); //récupère les informations après la ","
                    tst= L.marker([partie1,partie2]).addTo(map);
                    tst.bindPopup(item["nom"]).openPopup();
            }

            }
            
        }
        
    }
    // envoie des données.
    xhr_point.send();



</script>
@stop