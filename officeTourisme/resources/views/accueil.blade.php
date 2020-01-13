<head>
    <!--<link rel="stylesheet" href="styles/debug.css">-->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>

<header>
        <nav class="navbar has-shadow" role="navigation">
            <div class="navbar-brand">
                <div class="navbar-item">
                    <h1 class="title">Tourisme</h1>
                </div>
                <a role="button" class="navbar-burger burger" aria-label="menu" data-target="nav" aria-expanded="false" 
                onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');"><!--le onclick permet d'afficher les lien Map et Liste -->
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="nav" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="#">Map</a>
                    <a class="navbar-item" href="#">Liste</a>
                </div>
            </div>
            
        </nav>
</header>

<body class="body-color">
    <article>

        <section class="section has-background-white"> 

            <div class="columns">

                <div class="column is-one-quarter"->
                <!-- // case vide pour l'alignement-->
                </div>

                <div class="column is-one-quarter">  <!-- Liste des Catégories -->
                    <div class="select">
                        <select id="categorie">
                            <option>Select dropdown</option> 
                        </select>
                    </div>
                </div>

                <div class="column is-one-quarter">  <!-- Liste des Villes -->
                    <div class="select" >
                        <select id="ville">
                            <option>Select dropdown</option>
                            <option>With options</option>
                        </select>
                    </div>
                </div>
                <div class="column is-one-quarter"> <!-- Bar de recherche -->
                    <div class="field">
                        <p class="control has-icons-left">
                          <input class="input" type="text">
                          <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                          </span>
                        </p>
                      </div>
                </div> 
            </div>

            <br>
            <!-- ---------------------- Button modifier et supprimer ------------ -->
            <div class="div_button">
                <button class="button">
                    Modifier
                </button>
                <button class="button">
                    Supprimer
                </button>
            </div>
            
        </section>
        <!-- -------------------------- Section 2------------------------------- -->
        <div class="section_div">
            <section class="box">

            </section>
        </div>
    </article>
</body>

<!--<footer class="footer box">

</footer>-->











<script type="text/javascript">
    const xhr =new XMLHttpRequest();
    //ouvrir les catégories
    xhr.open('GET',"http://officetourisme.local/api/categories");
    xhr.onreadystatechange = function(ev){
        console.log(xhr.readyState);
    }
    // onload = lors du chargement
    xhr.onload = () => {
        let data2 =JSON.parse(xhr.responseText);
        // get l'élément par ID
        let main = document.getElementById('ok');
        data2.forEach(func);
        function func(item,index){
            var op=document.createElement("option");
            op.innerHTML= item.nom;
            document.getElementById("categorie").appendChild(op)
            //document.getElementById("categorie").options[index].innerHTML = item.nom;
        }
    }
    xhr.send();



    //villes

    const xhr2 =new XMLHttpRequest();
    //ouvrir les catégories
    xhr2.open('GET',"http://officetourisme.local/api/villes");
    xhr2.onreadystatechange = function(ev){
        console.log(xhr2.readyState);
    }
    // onload = lors du chargement
    xhr2.onload = () => {
        let data3 =JSON.parse(xhr2.responseText);
        // get l'élément par ID
        let main = document.getElementById('ok');
        data3.forEach(func);
        function func(item,index){
            var op=document.createElement("option");
            op.innerHTML= item.ville;
            document.getElementById("ville").appendChild(op)
            //document.getElementById("categorie").options[index].innerHTML = item.nom;
        }
    }
    xhr2.send();
</script>
