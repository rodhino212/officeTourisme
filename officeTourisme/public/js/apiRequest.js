//require('./bootstrap');



//!-----------------------------liste des catégories----------------------------------------------


const xhr_categorie =new XMLHttpRequest();
//ouvrir les catégories
xhr_categorie.open('GET',"http://officetourisme.local/api/categories");
xhr_categorie.onreadystatechange = function(ev){
    console.log(xhr_categorie.readyState);
}
// onload = lors du chargement
xhr_categorie.onload = () => {
    let data_categorie =JSON.parse(xhr_categorie.responseText);
    // get l'élément par ID
    //let main = document.getElementById('ok');
    data_categorie.forEach(func);
    function func(item,index){
        var op=document.createElement("option");
        op.innerHTML= item.nom;
        document.getElementById("categorie").appendChild(op)
        //document.getElementById("categorie").options[index].innerHTML = item.nom;
    }
}
xhr_categorie.send();



//!--------------------------------liste des villes ---------------------------------------------------

const xhr_ville =new XMLHttpRequest();
//ouvrir les catégories
xhr_ville.open('GET',"http://officetourisme.local/api/villes");
xhr_ville.onreadystatechange = function(ev){
    console.log(xhr_ville.readyState);
}
// onload = lors du chargement
xhr_ville.onload = () => {
    let data_ville =JSON.parse(xhr_ville.responseText);

    data_ville.forEach(func);
    function func(item,index){
        var op=document.createElement("option");
        op.innerHTML= item.ville;
        document.getElementById("ville").appendChild(op)
    }
}
xhr_ville.send();

