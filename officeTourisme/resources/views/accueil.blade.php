<head>
    <!--<link rel="stylesheet" href="styles/debug.css">-->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="{{asset('js/apiRequest.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>

<header>
        <nav class="navbar has-shadow" role="navigation">
            <div class="navbar-brand">
                <div class="navbar-item">
                    <h1 class="title">Matini'Tour</h1>
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
                            <option disabled selected>Selectionner une catégorie</option> 
                        </select>
                    </div>
                </div>

                <div class="column is-one-quarter">  <!-- Liste des Villes -->
                    <div class="select" >
                        <select id="ville">
                            <option disabled selected>Selectionner une ville</option>
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
        <!---------------------------- Section 2------------------------------- -->
        <div class="section_div">
            <section class="box">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th title="coordonnées">Coordonnées</th>
                            <th title="nom">Nom</th>
                            <th title="ville">Ville</th>
                            <th title="description">Description</th>
                            <th title="agent">Agent</th>
                            <th title="date saisie">Date saisie</th>
                            <th title="catégorie">Catégorie</th>
                        </tr>
                    </thead>
                    <tbody id="list_points">
                    </tbody>
                </table>
            </section>
        </div>
    </article>
</body>

<!--<footer class="footer box">

</footer>-->


