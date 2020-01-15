//!----------------------------------------liste des points ---------------------------------------


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
        console.log(obj);

        
        if(i>0){
            var title = document.createElement("th");
            title.innerHTML=obj;
            document.getElementById("list_title").appendChild(title);
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