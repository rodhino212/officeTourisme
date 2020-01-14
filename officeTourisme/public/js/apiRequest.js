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



//!----------------------------------------liste des points ---------------------------------------


const xhr_point =new XMLHttpRequest();
//ouvrir les catégories
xhr_point.open('GET',"http://officetourisme.local/api/points");
xhr_point.onreadystatechange = function(ev){
    console.log(xhr_point.readyState);
}
// onload = lors du chargement
xhr_point.onload = () => {
    let data_point =JSON.parse(xhr_point.responseText); //on récupère en TEXT la table points(en JSON) que l'on stocke dans data_point

    // récupère le nom des attributs/colonnes de la table points
    result = Object.getOwnPropertyNames(data_point[0]);

    // on parcourt chaque ligne de résultat dans une fonction (functiontr)
    result.forEach(functiontr);

   // obj = result et i correspond au compteur (i=0; i<obj.length;i++)
    function functiontr(obj,i){
        //
        if(i>0){
            //création de l'élément <td></td> (colonne)
            var td=document.createElement("td");

            //on parcourt chaque ligne de data_point qui est la table points dans une fonction (func)
            data_point.forEach(func);

            //item = obj et index = au compteur (index=0;index<item.length;index++)
            function func(item,index){

                //création de l'élément <tr></tr> donc ligne 
                var tr=document.createElement("tr"); 

                //on ajoute la valeur d'item[obj] dans la ligne tr ( la variable tr prend la valeur de item[obj])
                tr.innerHTML=item[obj];
                //la variable td prend comme enfant la variable tr
                td.appendChild(tr);
            }
            // recherche l'élement par ID qui est "list_points" et on ajoute comme enfant la variable td
            document.getElementById("list_points").appendChild(td);
        }
        
    }
}
// envoie des données.
xhr_point.send();