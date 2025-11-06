<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>

    <!-- Navbar -->
    <header id="navbar" class="navbar">
        <div class="container">

            <!-- Logo -->
            <div class="logo">
                <a href="#">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Afriba">
                </a>
            </div>

            <!-- Drapeau dans la navbar -->
            <div class="header-flag" id="flagToggle">
                <a href="#">
                    <img src="{{asset('assets/images/drap.png')}}" alt="CI" class="flag">
                    <span>CI <span class="globe"></span></span>
                </a>
                <!-- Menu flottant -->
                <div class="flag-dropdown" id="flagMenu">
                    <h4>Sélectionnez un pays</h4>
                    <p>Choisissez votre pays pour personnaliser l’expérience Afriba.</p>

                    <!-- Sélection pays -->
                    <label>Pays</label>
                    <div class="custom-select">
                        <div class="selected">
                            <img src="https://flagcdn.com/w20/ci.png" alt="">
                            <span class="text">Côte d’Ivoire</span>
                            <span class="arrow"></span>
                        </div>

                        <div class="options">
                            <div data-value="ci"><img src="https://flagcdn.com/w20/ci.png" alt=""> Côte d’Ivoire</div>
                            <div data-value="sn"><img src="https://flagcdn.com/w20/sn.png" alt=""> Sénégal</div>
                            <div data-value="ml"><img src="https://flagcdn.com/w20/ml.png" alt=""> Mali</div>
                            <div data-value="bj"><img src="https://flagcdn.com/w20/bj.png" alt=""> Bénin</div>
                        </div>
                    </div>

                    <!-- Sélection Langue -->
                    <label>Langue</label>
                    <div class="custom-select" data-type="langue">
                        <div class="selected" role="button" aria-expanded="false">
                            <span class="text">Français</span>
                            <span class="arrow" aria-hidden="true"></span>
                        </div>
                        <div class="options" role="listbox">
                            <div class="option" data-value="fr" role="option"><span>Français</span></div>
                            <div class="option" data-value="en" role="option"><span>Anglais</span></div>
                            <div class="option" data-value="ar" role="option"><span>Arabe</span></div>
                        </div>
                    </div>

                    <!-- Sélection Devise -->
                    <label>Devise</label>
                    <div class="custom-select" data-type="devise">
                        <div class="selected" role="button" aria-expanded="false">
                            <span class="text">XOF - Franc CFA</span>
                            <span class="arrow" aria-hidden="true"></span>
                        </div>
                        <div class="options" role="listbox">
                            <div class="option" data-value="xof" role="option"><span>XOF - Franc CFA</span></div>
                            <div class="option" data-value="eur" role="option"><span>EUR - Euro</span></div>
                            <div class="option" data-value="usd" role="option"><span>USD - Dollar US</span></div>
                        </div>
                    </div>

                    <button class="btn-orange">🌍 Sauvegarder</button>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const headerFlag = document.getElementById("flagToggle");
                    const flagMenu = document.getElementById("flagMenu");
                    // Ouvrir/fermer le menu parent
                    headerFlag.addEventListener("click", (e) => {
                        e.preventDefault();
                        e.stopPropagation(); // très important pour ne pas fermer immédiatement
                        headerFlag.classList.toggle("open");
                        flagMenu.style.display = headerFlag.classList.contains("open") ? "block" :
                            "none";
                    });
                    // Fermer menu si clic à l'extérieur
                    document.addEventListener("click", () => {
                        headerFlag.classList.remove("open");
                        flagMenu.style.display = "none";
                        document.querySelectorAll(".custom-select").forEach(s => s.classList.remove(
                            "open"));
                        document.querySelectorAll(".custom-select .options").forEach(o => o.style
                            .display = "none");
                    });
                    // ======== Custom Selects ========
                    document.querySelectorAll(".custom-select").forEach(select => {
                        const selected = select.querySelector(".selected");
                        const options = select.querySelector(".options");
                        // Clic sur selected → ouvre menu interne
                        selected.addEventListener("click", (e) => {
                            e.stopPropagation(); // bloque fermeture menu parent
                            // fermer les autres menus internes
                            document.querySelectorAll(".custom-select").forEach(s => {
                                if (s !== select) {
                                    s.classList.remove("open");
                                    const opts = s.querySelector(".options");
                                    if (opts) opts.style.display = "none";
                                }
                            });
                            select.classList.toggle("open");
                            options.style.display = select.classList.contains("open") ?
                                "block" : "none";
                        });
                        // Clic sur option
                        options.querySelectorAll("div").forEach(option => {
                            option.addEventListener("click", (e) => {
                                e.stopPropagation();
                                // --- Si c'est Pays ---
                                if (select.previousElementSibling && select
                                    .previousElementSibling.textContent.trim() ===
                                    "Pays") {
                                    const img = option.querySelector("img");
                                    const text = option.textContent.trim();
                                    selected.innerHTML = `
                        <img src="${img.src}" alt="">
                        <span class="text">${text}</span>
                        <span class="arrow"></span>
                    `;
                                }
                                // Langue / Devise
                                else {
                                    const textContainer = selected.querySelector(
                                        ".text");
                                    textContainer.textContent = option.textContent
                                    .trim();
                                }
                                // Fermer le menu interne après sélection
                                select.classList.remove("open");
                                options.style.display = "none";
                            });
                        });
                    });
                });
            </script>

            <!-- Barre de recherche -->

            <div class="header-center">
                <div class="search-bar">
                    <input type="text" placeholder="Que cherchez-vous ?" id="searchInput">
                    <button id="searchToggle"><i class="fas fa-search"></i></button>

                    <!-- Dropdown recherche -->
                    <div class="search-dropdown" id="searchMenu">
                        <div class="search-section">
                            <strong>Recherches récentes</strong>
                            <ul>
                                <li>Robe africaine</li>
                                <li>Boubou homme</li>
                                <li>Bijoux artisanaux</li>
                            </ul>
                        </div>
                        <div class="search-section">
                            <strong>Suggestions populaires</strong>
                            <ul>
                                <li>Chaussures traditionnelles</li>
                                <li>Paniers en osier</li>
                                <li>Tissus Wax</li>
                            </ul>
                        </div>
                        <a href="#" class="advanced-search">Recherche avancée</a>
                    </div>
                </div>
            </div>
            <script>
                const searchInput = document.getElementById('searchInput');
                const searchMenu = document.getElementById('searchMenu');
                const searchBar = document.querySelector('.search-bar');
                const searchButton = document.getElementById('searchToggle');
                // Clic sur l'input → ouvre dropdown
                searchInput.addEventListener('click', (e) => {
                    e.stopPropagation(); // empêche la fermeture immédiate
                    searchMenu.classList.add('show');
                });
                // Empêche que cliquer dans le dropdown le ferme
                searchMenu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
                // Clic n'importe où ailleurs → fermer dropdown
                document.addEventListener('click', () => {
                    searchMenu.classList.remove('show');
                });
                // Bouton recherche → ne touche pas au dropdown
                searchButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    console.log("Recherche lancée :", searchInput.value);
                });
                // Scroll effect pour navbar
                window.addEventListener('scroll', () => {
                    const navbar = document.querySelector('.navbar');
                    if (window.scrollY > 20) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                });
            </script>

            <!-- Icônes à droite -->
            <div class="header-right">

                <div class="header-option-wrapper">
                    <div class="header-option" id="orderListToggle">
                        <!-- Icône liste de commande -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                        </svg>
                    </div>

                    <div class="order-dropdown" id="orderListMenu">
                        <div class="empty-order">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="empty-icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h18M9 8h6m-7 4h8m-6 4h4m-5 4h6" />
                            </svg>
                            <p>Aucune commande trouvée</p>
                            <a href="#" class="start-shopping">🛍️ Commencer mes achats</a>
                        </div>
                    </div>
                </div>

                <!-- Icône de livraison -->
                <div class="header-option" id="deliveryToggle">
                    <i class="fas fa-shipping-fast"></i>
                </div>

                <div class="delivery-dropdown" id="deliveryMenu">
                    <h4>Suivi de livraison</h4>

                    <div class="delivery-item">
                        <i class="fas fa-box"></i>
                        <div class="delivery-text">
                            <p>Votre colis est en préparation 📦</p>
                            <span>il y a 10 min</span>
                        </div>
                    </div>

                    <div class="delivery-item">
                        <i class="fas fa-truck"></i>
                        <div class="delivery-text">
                            <p>Votre colis est en cours de livraison 🚚</p>
                            <span>il y a 2h</span>
                        </div>
                    </div>

                    <div class="delivery-item">
                        <i class="fas fa-check-circle"></i>
                        <div class="delivery-text">
                            <p>Votre colis a été livré ✅</p>
                            <span>hier</span>
                        </div>
                    </div>

                    <a href="/deliveries" class="btn-orange">Voir mes livraisons</a>
                </div>

                <!-- Icône envoi -->
                <div class="header-option" id="messageToggle" style="position: relative; cursor: pointer;">
                    <i class="fas fa-paper-plane"></i>
                    <span class="msg-badge">3</span>
                </div>

                <!-- Menu flottant messagerie -->
                <div class="message-dropdown" id="messageMenu">
                    <h4>Messagerie</h4>

                    <!-- Conversation 1 -->
                    <div class="msg-item new">
                        <img src="https://via.placeholder.com/40" alt="Vendeur A">
                        <div class="msg-text">
                            <p><strong>Vendeur A</strong></p>
                            <span>Bonjour, votre commande est prête 🎁</span>
                        </div>
                        <small>10:15</small>
                    </div>

                    <!-- Conversation 2 -->
                    <div class="msg-item">
                        <img src="https://via.placeholder.com/40" alt="Vendeur B">
                        <div class="msg-text">
                            <p><strong>Vendeur B</strong></p>
                            <span>Merci pour votre achat 🙏</span>
                        </div>
                        <small>09:42</small>
                    </div>

                    <!-- Conversation 3 -->
                    <div class="msg-item">
                        <img src="https://via.placeholder.com/40" alt="Vendeur C">
                        <div class="msg-text">
                            <p><strong>Vendeur C</strong></p>
                            <span>Votre colis est en cours de livraison 🚚</span>
                        </div>
                        <small>Hier</small>
                    </div>

                    <a href="/messages" class="see-all">Voir toutes les conversations</a>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        function setupDropdown(toggleId, menuId) {
                            const toggle = document.getElementById(toggleId);
                            const menu = document.getElementById(menuId);
                            toggle.addEventListener('click', (e) => {
                                e.stopPropagation();
                                // Si un menu est déjà ouvert et ce n'est pas celui-ci, on bloque le clic
                                const anyOpen = document.querySelector('.dropdown-menu.show');
                                if (anyOpen && anyOpen !== menu) {
                                    return; // bloque l'ouverture d'un autre menu
                                }
                                // Afficher/masquer le menu actuel
                                menu.classList.toggle('show');
                            });
                            menu.addEventListener('click', (e) => e.stopPropagation());
                        }
                        // Configuration des menus
                        setupDropdown('deliveryToggle', 'deliveryMenu');
                        setupDropdown('messageToggle', 'messageMenu');
                        setupDropdown('notificationToggle', 'notificationMenu');
                        setupDropdown('orderListToggle', 'orderListMenu');
                        setupDropdown('cartToggle', 'cartMenu');
                        setupDropdown('connexionToggle', 'connexionMenu');
                        // Clic en dehors ferme tous les menus
                        document.addEventListener('click', () => {
                            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList
                                .remove('show'));
                        });
                    });
                </script>

                <!-- Menu flottant panier -->
                <!-- Icône panier unique -->
                <div class="header-option" id="cartToggle" style="position: relative; cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" width="22" height="22">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 
             1.087.835l.383 1.437M7.5 
             14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218
             c1.121-2.3 2.1-4.684 2.924-7.138
             a60.114 60.114 0 0 0-16.536-1.84
             M7.5 14.25 5.106 5.272M6 20.25a.75.75 
             0 1 1-1.5 0 .75.75 0 0 1 
             1.5 0Zm12.75 0a.75.75 0 1 1-1.5 
             0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <span class="cart-badge" id="cartBadge" style="display:none;">0</span>
                </div>
                <script>
                    const cartToggle = document.getElementById('cartToggle');
                    const cartBadge = document.getElementById('cartBadge');
                    // Redirection au panier
                    cartToggle.addEventListener('click', function() {
                        window.location.href = '/panier';
                    });
                    // Fonction pour mettre à jour le badge
                    function updateCartBadge(count) {
                        if (count > 0) {
                            cartBadge.style.display = 'block'; // affiche le badge
                            cartBadge.textContent = count;
                        } else {
                            cartBadge.style.display = 'none'; // masque le badge si 0
                        }
                    }
                    // Exemple : ajouter un article
                    // updateCartBadge(1); // badge affichera "1"
                    // updateCartBadge(0); // badge disparaît
                </script>

                <div class="header-option" id="notificationToggle" style="position: relative; cursor: pointer;">
                    <!-- Icône de notification -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6" width="26" height="26">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>

                    <!-- Badge rouge -->
                    <span class="notif-badge">3</span>

                    <!-- Menu notifications -->
                    <div class="notification-dropdown" id="notificationMenu">
                        <h4>Notifications</h4>
                        <div class="notif-item new">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="notif-text">
                                <p><strong>Nouveau message</strong> de l’administrateur</p>
                                <span>il y a 5 min</span>
                            </div>
                        </div>
                        <div class="notif-item">
                            <i class="fa-solid fa-truck"></i>
                            <div class="notif-text">
                                <p>Votre commande #1234 est <strong>expédiée</strong></p>
                                <span>il y a 2h</span>
                            </div>
                        </div>
                        <div class="notif-item">
                            <i class="fa-solid fa-user-gear"></i>
                            <div class="notif-text">
                                <p>Mise à jour disponible pour votre profil</p>
                                <span>hier</span>
                            </div>
                        </div>
                        <a href="/notifications" class="see-all">Voir toutes les notifications</a>
                    </div>
                </div>

                <!-- Bouton connexion -->
                <div class="header-connexion">
                    @if(session()->has('afriba_user'))
                    <!-- Utilisateur connecté -->
                    <button class="btn-user" id="userToggle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" width="20" height="20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 
                            0 3.75 3.75 0 0 1 7.5 0ZM4.501 
                            20.118a7.5 7.5 0 0 1 14.998 
                            0A17.933 17.933 0 0 1 12 
                            21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        {{ session('afriba_user')->nom_complet }}
                    </button>

                    <!-- Menu utilisateur connecté -->
                    <!-- Bouton utilisateur connecté -->
                    <!-- Menu utilisateur connecté -->
                    <div class="connexion-dropdown" id="userMenu">
                        @if(session()->has('afriba_user'))
                        <div class="dropdown-header" style="display:flex;align-items:center;gap:8px;">
                            <span id="salutationText"></span>
                            <img id="countryFlag" src="" alt="Pays"
                                style="width:22px;height:15px;border-radius:3px;margin-left:8px;">
                        </div>
                        @endif

                        <a href="/profile"><i class="fa fa-user-circle"></i> Mon Compte</a>
                        <a href="/orders"><i class="fa fa-box"></i> Commandes</a>
                        <a href="/messages"><i class="fa fa-envelope"></i> Messages</a>
                        <a href="/devis"><i class="fa fa-file-invoice"></i> Demandes de devis</a>
                        <a href="/favoris"><i class="fa fa-heart"></i> Favoris</a>
                        <a href="/logout" style="color:red;"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
                    </div>

                    @else
                    <!-- Utilisateur non connecté -->
                    <button class="btn-connexion" id="connexionToggle">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" width="20" height="20">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 
                0 3.75 3.75 0 0 1 7.5 0ZM4.501 
                20.118a7.5 7.5 0 0 1 14.998 
                0A17.933 17.933 0 0 1 12 
                21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Connexion
                    </button>

                    <!-- Menu déroulant connexion -->
                    <div class="connexion-dropdown" id="connexionMenu">
                        <a href="/connexion"><i class="fa fa-sign-in-alt"></i> Se connecter</a>
                        <a href="/inscription"><i class="fa fa-user-plus"></i> Créer un compte</a>
                    </div>
                    @endif
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const connexionToggle = document.getElementById("connexionToggle");
                        const connexionMenu = document.getElementById("connexionMenu");
                        const userToggle = document.getElementById("userToggle");
                        const userMenu = document.getElementById("userMenu");

                        function closeAllMenus(exceptMenu = null) {
                            [connexionMenu, userMenu].forEach(menu => {
                                if (menu && menu !== exceptMenu) menu.classList.remove("show");
                            });
                        }
                        if (connexionToggle && connexionMenu) {
                            connexionToggle.addEventListener("click", function(e) {
                                e.stopPropagation();
                                closeAllMenus(connexionMenu);
                                connexionMenu.classList.toggle("show");
                            });
                        }
                        if (userToggle && userMenu) {
                            userToggle.addEventListener("click", function(e) {
                                e.stopPropagation();
                                closeAllMenus(userMenu);
                                userMenu.classList.toggle("show");
                            });
                        }
                        if (connexionMenu) connexionMenu.addEventListener("click", e => e.stopPropagation());
                        if (userMenu) userMenu.addEventListener("click", e => e.stopPropagation());
                        document.addEventListener("click", () => closeAllMenus());
                        // --- Salutation dynamique (uniquement si utilisateur connecté) ---
                        @if(session()-> has('afriba_user'))
                        const salutationText = document.getElementById("salutationText");
                        const flag = document.getElementById("countryFlag");
                        const now = new Date();
                        const hour = now.getHours();
                        let greeting = "";
                        if (hour >= 5 && hour < 12) {
                            greeting = "Bonjour";
                        } else if (hour >= 12 && hour < 18) {
                            greeting = "Bon après-midi";
                        } else {
                            greeting = "Bonsoir";
                        }
                        // Nom complet entier
                        const userName =
                            "{{ session('afriba_user')->nom_complet ?? session('afriba_user')->nom ?? 'Utilisateur' }}";
                        if (salutationText) {
                            salutationText.textContent = `${greeting}, ${userName}`;
                        }
                        const userCountry = "{{ strtolower(session('afriba_user')->pays ?? 'CI') }}";
                        if (flag) {
                            flag.src = `https://flagcdn.com/w20/${userCountry}.png`;
                        }
                        @endif
                    });
                </script>

            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero-afriba">
        <!-- Panneau pub à gauche -->
        <div class="hero-slider">
            <div class="slide active"
                style="background-image: url('https://www.abidjan-aeroport.com/wp-content/uploads/2016/12/cote-divoire-1.jpg');">
                <div class="slide-caption"
                    data-text="Akwaba. Découvrez les paysages uniques et l’hospitalité chaleureuse."></div>
            </div>

            <div class="slide"
                style="background-image: url('https://discover-ivorycoast.com/wp-content/uploads/2019/01/basilique-Notre-Dame-de-la-Paix-de-Yamoussoukro-2.jpg');">
                <div class="slide-caption"
                    data-text="Basilique de Yamoussoukro – symbole d’architecture et culture africaine.">
                </div>
            </div>

            <div class="slide"
                style="background-image: url('https://dev.rezoivoire.net/wp-content/uploads/2018/11/mosquee-de-kong.jpg');">
                <div class="slide-caption"
                    data-text="Mosquée traditionnelle en terre, symbole du nord de la Côte d’Ivoire.">
                </div>
            </div>

            <div class="slide"
                style="background-image: url('https://discover-ivorycoast.com/wp-content/uploads/2019/01/elephant-family-2776148_960_720-1.jpg');">
                <div class="slide-caption" data-text="Les éléphants, symbole de force, sagesse et beauté africaine.">
                </div>
            </div>
        </div>

        <!-- Texte à droite -->
        <div class="hero-content">
            <h1 class="typing-text">Afriba</h1>
            <ul class="features">
                <li><span> Plongez au cœur de l’Afrique avec Afriba:</span>créations artisanales uniques, tendances mode
                    modernes,
                    trésors culturels et saveurs authentiques locales.</li>
            </ul>

            <p class="fade-text">
                Vendez et achetez en toute sécurité tout en mettant en valeur la culture africaine.
            </p>

            <a href="#shop" class="btn-hero">Découvrir Afriba</a>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const btn = document.querySelector('.btn-hero');
                    btn.addEventListener('click', function(e) {
                        e.preventDefault(); // empêche le lien #shop de sauter brutalement
                        // on cible le premier produit de la liste
                        const firstProduct = document.querySelector('.trend-card');
                        if (firstProduct) {
                            const position = firstProduct.getBoundingClientRect().top + window.scrollY -
                                100;
                            window.scrollTo({
                                top: position,
                                behavior: 'smooth'
                            });
                        }
                    });
                });
            </script>

            <div class="hero-stats-simple">
                <div class="stat">
                    <span class="number">0</span>
                    <span class="label">Produits</span>
                </div>
                <div class="stat">
                    <span class="number" id="vendeurs-count">0</span>
                    <span class="label">Vendeurs africains</span>
                </div>
                <div class="stat">
                    <span class="number">0</span>
                    <span class="label">Catégories</span>
                </div>
                <div class="stat">
                    <span class="number" id="pays-count">0</span>
                    <span class="label">Pays africains</span>
                </div>
            </div>
            <script>
document.addEventListener("DOMContentLoaded", () => {

    const vendeursCountEl = document.getElementById('vendeurs-count');
    const paysCountEl = document.getElementById('pays-count');
    const authForm = document.getElementById('authForm');
    const toast = document.getElementById('toast');
    const successMessage = document.getElementById('successMessage');
    let paysSelected = "";

    // Fonction pour afficher un toast
    function showToast(msg) {
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2500);
    }

    // 🔹 Charger les stats depuis /stats
    async function loadStats() {
        try {
            const res = await fetch("{{ route('stats') }}");
            const data = await res.json();
            vendeursCountEl.textContent = data.vendeurs;
            paysCountEl.textContent = data.pays;
        } catch (err) {
            console.error("Impossible de charger les stats", err);
        }
    }

    // Charger les stats au chargement
    loadStats();

    // =========================
    // Gestion de la sélection du pays
    // =========================
    const customSelect = document.querySelector('.custom-select');
    const selected = customSelect.querySelector('.selected');
    const optionsList = customSelect.querySelector('.options');

    customSelect.addEventListener('click', e => {
        e.stopPropagation();
        const isOpen = optionsList.style.display === 'block';
        document.querySelectorAll('.options').forEach(opt => opt.style.display = 'none');
        optionsList.style.display = isOpen ? 'none' : 'block';
    });

    optionsList.querySelectorAll('li').forEach(option => {
        option.addEventListener('click', e => {
            e.stopPropagation();
            const flag = option.querySelector("img").src;
            const text = option.textContent.trim();
            selected.innerHTML = `<img src="${flag}" alt="flag"/> ${text}`;
            paysSelected = option.dataset.code;
            optionsList.style.display = 'none';
        });
    });

    document.addEventListener('click', () => {
        optionsList.style.display = 'none';
    });

    // =========================
    // Formulaire d'inscription
    // =========================
    authForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(authForm);
        const fullname = formData.get('fullname').trim();
        const phone = formData.get('phone').trim();
        const ville = formData.get('ville').trim();
        const commune = formData.get('commune').trim();
        const password = formData.get('password');
        const confirm = formData.get('password_confirmation');
        const socialSelected = document.querySelector('.social-btn.checked');

        if (!fullname || !phone || !ville || !commune || !password) {
            showToast("Merci de remplir tous les champs");
            return;
        }

        if (password !== confirm) {
            showToast("Mots de passe différents");
            return;
        }

        if (!paysSelected) {
            showToast("Veuillez sélectionner un pays");
            return;
        }

        if (!socialSelected) {
            showToast("Veuillez sélectionner un mode de connexion sociale");
            return;
        }

        formData.append('pays', paysSelected);
        formData.append('social',
            socialSelected.classList.contains('google') ? 'google' :
            socialSelected.classList.contains('facebook') ? 'facebook' :
            'linkedin'
        );

        try {
            const response = await fetch(authForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();

            if (data.success) {
                // ✅ Mettre à jour les compteurs immédiatement
                loadStats();

                // Message succès
                successMessage.textContent = "🎉 Inscription réussie !";
                successMessage.style.display = 'block';

                setTimeout(() => {
                    window.location.href = '/login';
                }, 2500);
            } else {
                showToast(data.message || "Une erreur est survenue");
            }
        } catch (err) {
            showToast("Impossible de se connecter au serveur");
        }
    });

});
</script>


    </section>

    <div class="welcome-banner">
        <span class="afriba-text">Bienvenue sur <strong>Afriba</strong></span>
    </div>

    <!-- 🌟 Section mise en avant -->
    <section class="categorie-section">
        <!-- Bloc gauche : Catégorie -->
        <div class="categorie-card">
            <img src="https://art.societegenerale.ci/wp-content/uploads/2022/05/image_processing20211027-1-ny76mf.jpg"
                alt="Collection Catégorie">
            <h3>Collection Catégorie</h3>
            <p>Des créations uniques inspirées de la mode africaine moderne.</p>

            <ul class="categorie-list">
                <li><a href="#">👗Mode & Accessoires </a></li>
                <li><a href="#">👒 Accessoires</a></li>
                <li><a href="#">💍 Bijoux</a></li>
                <li><a href="#">👠 Chaussures</a></li>
                <li><a href="#">🕶 Lunettes</a></li>
                <li><a href="#">🕶 Lunettes</a></li>
                <li><a href="#">🕶 Lunettes</a></li>
            </ul>

        </div>

        <!-- Bloc droit : Bannière promo -->
        <div class="promo-banner">
            <div class="promo-text">
                <h2>🌍 L’Afrique à portée de main</h2>
                <p>Plongez dans l’univers vibrant et inspirant du continent africain.</p>
            </div>

            <div class="promo-image">
                <div class="slideshow">
                    <img src="https://www.cafonline.com/media/3vjbuirc/fjokotk0t0loe6f0mwln.png" alt="Pub 3">
                    <img src="https://img.lemde.fr/2020/09/11/0/0/4928/3280/664/0/75/0/8e077fe_170617370-d4s3820.jpg"
                        alt="Pub 1">
                    <img src="https://art.societegenerale.ci/wp-content/uploads/2022/05/image_processing20211027-1-ny76mf.jpg"
                        alt="Pub 2">
                </div>
            </div>

        </div>

    </section>

    <!-- ✅ BARRE FLOTTANTE RENOMMÉE -->
    <div class="afribar-toolbar">
        <div class="afribar-item notification" title="Messages">
            <i class="fas fa-paper-plane"></i>
            <span class="afrishop-alert-count">99+</span>
        </div>

        <div class="afribar-item notification" title="pays">
            <i class="fas fa-globe-africa"></i>
            <!-- ici remplacer par l’icône Afrique -->
        </div>

        <div class="afribar-item" title="Remonter en haut">
            <i class="fas fa-angle-double-up"></i>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const scrollBtn = document.querySelector('.afribar-item[title="Remonter en haut"]');
            const categorieSection = document.querySelector('.categorie-section');
            if (!scrollBtn || !categorieSection) return; // sécurité
            const sectionTop = categorieSection.offsetTop;
            // Fonction pour montrer ou cacher le bouton
            function toggleButton() {
                if (window.scrollY > sectionTop) {
                    scrollBtn.style.display = 'flex';
                } else {
                    scrollBtn.style.display = 'none';
                }
            }
            // Vérifier la position au scroll
            window.addEventListener('scroll', toggleButton);
            // Vérifier dès le chargement (utile après refresh)
            toggleButton();
            // Cliquer sur le bouton = remonter juste au-dessus de la section
            scrollBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: sectionTop - 100, // ajuste la marge avant le haut
                    behavior: 'smooth'
                });
            });
            // Le bouton est caché au départ
            scrollBtn.style.display = 'none';
        });
    </script>

    <!-- 🛍 Section Offres -->
    <section class="offre-section">
        <!-- Texte -->
        <div class="offre-texte">
            <h2>Meilleure Offre du Moment</h2>
            <p>Profitez des remises exceptionnelles sur nos pièces africaines les plus prisées.
                C’est le moment parfait pour vous offrir un style unique, moderne et enraciné dans nos traditions.</p>
        </div>

        <!-- Slider Produits -->
        <div class="offre-slider">
            <!-- Produit -->
            <div class="produit">
                <div class="image-container">
                    <img src="https://i0.wp.com/www.massaizoubeauty54.com/wp-content/uploads/2024/02/Sac-Africain-Kente.jpg?fit=1024%2C1024&ssl=1"
                        alt="Sac">
                    <span class="badge-promo">-35%</span>
                    <div class="heart-icon" onclick="this.classList.toggle('active')">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <p class="nom-produit">Sac Africain</p>
                <p class="prix"><span class="ancien">22.000 FCFA</span> <span class="promo">14.000 FCFA</span></p>
            </div>

            <div class="produit">
                <div class="image-container">
                    <img src="https://gdustyl.shop/wp-content/uploads/2025/02/3APKY4MV-large.jpg" alt="Robe">
                    <span class="badge-promo">-30%</span>
                    <div class="heart-icon" onclick="this.classList.toggle('active')">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <p class="nom-produit">Robe Pagne</p>
                <p class="prix"><span class="ancien">35.000 FCFA</span> <span class="promo">25.000 FCFA</span></p>
            </div>

            <div class="produit">
                <div class="image-container">
                    <img src="https://i.pinimg.com/474x/25/2b/ca/252bca81164467b4629a839158a9dd93.jpg" alt="Collier">
                    <span class="badge-promo">-20%</span>
                    <div class="heart-icon" onclick="this.classList.toggle('active')">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <p class="nom-produit">Collier perlé</p>
                <p class="prix"><span class="ancien">15.000 FCFA</span> <span class="promo">12.000 FCFA</span></p>
            </div>

            <div class="produit">
                <div class="image-container">
                    <img src="https://d17a17kld06uk8.cloudfront.net/products/CUAUMI4/5U38A1T5-default.jpg"
                        alt="Chaussures">
                    <span class="badge-promo">-40%</span>
                    <div class="heart-icon" onclick="this.classList.toggle('active')">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <p class="nom-produit">Chaussures Wax</p>
                <p class="prix"><span class="ancien">28.000 FCFA</span> <span class="promo">19.000 FCFA</span></p>
            </div>

            <div class="produit">
                <div class="image-container">
                    <img src="https://i.pinimg.com/736x/2c/b2/ba/2cb2bab9be988803410c91a3b753cf0e.jpg" alt="Tunique">
                    <span class="badge-promo">-25%</span>
                    <div class="heart-icon" onclick="this.classList.toggle('active')">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <p class="nom-produit">Tunique Homme</p>
                <p class="prix"><span class="ancien">30.000 FCFA</span> <span class="promo">22.500 FCFA</span></p>
            </div>

            <div class="produit">
                <div class="image-container">
                    <img src="https://www.romiesu.fr/cdn/shop/files/FullSizeRender_fcc8d96a-bcb0-4364-b8ba-b053eb92dd87_2048x.jpg?v=1695502059"
                        alt="Bracelet">
                    <span class="badge-promo">-15%</span>
                    <div class="heart-icon" onclick="this.classList.toggle('active')">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <p class="nom-produit">Bracelet ivoire</p>
                <p class="prix"><span class="ancien">10.000 FCFA</span> <span class="promo">8.500 FCFA</span></p>
            </div>
        </div>
    </section>

    <!-- interface article -->
    <section class="afrimarket-social-trends">
        <div class="trend-containe">
            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>

                    <!-- Image principale -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyd9jzlxWx-wNjLWtTIcDDdX3-8tRQ61Efpg&s"
                        alt="T-shirt Nommade" class="primary">

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQW_GZkaBf95FQthIuO_oFH6T0eRsgjNav_Ba0I9YmkjZ8U0DU55wbwmPEwhjXd179F5l4&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">T-shirt Nommade</div>
                            <div class="product-description">Confection locale • 100% coton</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 20 pièces</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 3 500 – 5 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle white"></span>
                            <span class="color-circle black"></span>
                            <span class="color-circle navy"></span>
                            <div class="color-number-standalone">12</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>5 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://sanlishop.ci/8993-home_default/croustilles-de-feves-de-cacao-125g.jpg"
                        alt="Cacao brut" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://sanlishop.ci/8990-large_default/croustilles-de-feves-de-cacao-250g.jpg"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Fèves de Cacao</div>
                            <div class="product-description">Origine Côte d’Ivoire • Qualité premium</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 10 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 1 500 – 3 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle brown"></span>
                            <span class="color-circle darkred"></span>
                            <span class="color-circle beige"></span>
                            <div class="color-number-standalone">12</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>3 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/et.png" alt="ET" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx6aTZL2zdenMwGGS_L02DDCt9rISs8A4yqBvSulM50kuROTvBjewPdj2Yqf3x7EtVdbc&usqp=CAU"
                        alt="Café éthiopien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://www.lecafeier.fr/wp-content/uploads/2022/03/cafe_pureoriginebio_ethiopie_moka_jebena_buna.jpg"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Café Arabica</div>
                            <div class="product-description">Grains torréfiés • Origine Éthiopie</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 3 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 4 000 – 6 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle black"></span>
                            <span class="color-circle brown"></span>
                            <span class="color-circle gray"></span>
                            <div class="color-number-standalone">6</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>6 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/gh.png" alt="GH" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShpFpVGkW-nL-rEtGvxGF9ZMDnCnWNhFSlSCA4moWStPmjit30yC7-jDE0-RhVjNJ_8oY&usqp=CAU"
                        alt="Tissu wax africain" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFwkidb2fny4Nqu8JRhynOuQNn91m8N2XOz9LChvlwgjqlab5FIONOtMABgCEEXyKZyEI&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Tissu Wax Africain</div>
                            <div class="product-description">100% coton • Couleurs éclatantes</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 2 pièces</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 5 000 – 12 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle red"></span>
                            <span class="color-circle yellow"></span>
                            <span class="color-circle blue"></span>
                            <div class="color-number-standalone">15</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>12 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHXOxIWkuf4FCC8IzW1klPZEzkMSn1nrSXWnXGe93gy_-EMuO1sDzqqj4-Q7wp5krtix4&usqp=CAU"
                        alt="Attiéké ivoirien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNYaDITXC2q3GGT-7AIim8t0F_3F7HxKC3-TtttecQHtnyqHWdWjnvWgSofKBD5-bY0Y8&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Attiéké Traditionnel</div>
                            <div class="product-description">Semoule de manioc • Plat typique</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 5 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 1 000 – 2 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle beige"></span>
                            <span class="color-circle yellow"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">5</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>2 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwANXN5rOnLb_XF7XEu2k6JnaWsi3CLtGIdcOWTTON4LvcHSQTaNp0YcxFtT4kzgf_lP0&usqp=CAU"
                        alt="Riz ivoirien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4TjDuYkvlg0IYM2tXnkbewc8X4DLs09cB_XlJVm4PgZA8iTaCNskU3Myz97WFXMbrt54&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Riz Local</div>
                            <div class="product-description">Riz blanc non parfumé • Origine CI</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 25 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 10 000 – 12 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle white"></span>
                            <span class="color-circle beige"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">6</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>12 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://grandexotique.com/cdn/shop/files/IMG_6790.heic?v=1749022466&width=1946"
                        alt="Huile de palme rouge" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZEYhvwapVJQfcjnz5XFZq3syouD451qPEpWrhP5EagGds2xJzMkhDpX9ipn6HrH5Lh-g&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Huile de Palme Rouge</div>
                            <div class="product-description">Pressée à froid • Qualité locale</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 5 L</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 3 000 – 5 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle red"></span>
                            <span class="color-circle orange"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">4</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>5 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8TCe5urX_opitXGeBcQgSu6PR6Gvfo_rkvALbLg-ImKBDJNxA2XPkcs_PyhC8Ni7vgRs&usqp=CAU"
                        alt="Noix de cajou" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB9pLE-Mgu1X54gNUyHKqNkXdSZGDxQQ6L8V0NCJxYc7h-G2Py1vIBvkPYK3tncRdwV70&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Noix de Cajou</div>
                            <div class="product-description">Grillées • Origine Côte d’Ivoire</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 10 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 6 000 – 8 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle beige"></span>
                            <span class="color-circle brown"></span>
                            <span class="color-circle yellow"></span>
                            <div class="color-number-standalone">9</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>8 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://s5q3y8p7.delivery.rocketcdn.me/wp-content/uploads/2018/12/00288-cacao-pur-en-poudre-bio-le-kilo-300x300.jpg"
                        alt="Poudre de cacao" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://saldac.com/wp-content/uploads/2018/12/00289-cacao-sucre-en-poudre-bio-le-kilo-1200x900.jpg"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Poudre de Cacao</div>
                            <div class="product-description">100% naturel • Non sucré</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 2 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 4 500 – 7 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle brown"></span>
                            <span class="color-circle darkred"></span>
                            <span class="color-circle black"></span>
                            <div class="color-number-standalone">8</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>7 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>

                    <img src="https://image.made-in-china.com/202f0j00VRGUeHSgIhzp/Super-Quality-Mesh-Bag-Packing-Chinese-Yellow-Whole-Fresh-Ginger.webp"
                        alt="Gingembre ivoirien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://image.made-in-china.com/2f0j00QvfiDKgCIIUa/New-Crop-Fresh-Ginger-for-Sale-Ginger-Root-Superior-Quality-From-China.webp"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Gingembre Frais</div>
                            <div class="product-description">Racine fraîche • Origine CI</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 20 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 2 000 – 3 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle beige"></span>
                            <span class="color-circle yellow"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">5</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>3 500 FCFA</div>
                    </div>
                </a>
            </div>



            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>

                    <!-- Image principale -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyd9jzlxWx-wNjLWtTIcDDdX3-8tRQ61Efpg&s"
                        alt="T-shirt Nommade" class="primary">

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQW_GZkaBf95FQthIuO_oFH6T0eRsgjNav_Ba0I9YmkjZ8U0DU55wbwmPEwhjXd179F5l4&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">T-shirt Nommade</div>
                            <div class="product-description">Confection locale • 100% coton</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 20 pièces</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 3 500 – 5 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle white"></span>
                            <span class="color-circle black"></span>
                            <span class="color-circle navy"></span>
                            <div class="color-number-standalone">12</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>5 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://sanlishop.ci/8993-home_default/croustilles-de-feves-de-cacao-125g.jpg"
                        alt="Cacao brut" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://sanlishop.ci/8990-large_default/croustilles-de-feves-de-cacao-250g.jpg"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Fèves de Cacao</div>
                            <div class="product-description">Origine Côte d’Ivoire • Qualité premium</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 10 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 1 500 – 3 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle brown"></span>
                            <span class="color-circle darkred"></span>
                            <span class="color-circle beige"></span>
                            <div class="color-number-standalone">12</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>3 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/et.png" alt="ET" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx6aTZL2zdenMwGGS_L02DDCt9rISs8A4yqBvSulM50kuROTvBjewPdj2Yqf3x7EtVdbc&usqp=CAU"
                        alt="Café éthiopien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://www.lecafeier.fr/wp-content/uploads/2022/03/cafe_pureoriginebio_ethiopie_moka_jebena_buna.jpg"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Café Arabica</div>
                            <div class="product-description">Grains torréfiés • Origine Éthiopie</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 3 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 4 000 – 6 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle black"></span>
                            <span class="color-circle brown"></span>
                            <span class="color-circle gray"></span>
                            <div class="color-number-standalone">6</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>6 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/gh.png" alt="GH" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShpFpVGkW-nL-rEtGvxGF9ZMDnCnWNhFSlSCA4moWStPmjit30yC7-jDE0-RhVjNJ_8oY&usqp=CAU"
                        alt="Tissu wax africain" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFwkidb2fny4Nqu8JRhynOuQNn91m8N2XOz9LChvlwgjqlab5FIONOtMABgCEEXyKZyEI&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Tissu Wax Africain</div>
                            <div class="product-description">100% coton • Couleurs éclatantes</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 2 pièces</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 5 000 – 12 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle red"></span>
                            <span class="color-circle yellow"></span>
                            <span class="color-circle blue"></span>
                            <div class="color-number-standalone">15</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>12 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHXOxIWkuf4FCC8IzW1klPZEzkMSn1nrSXWnXGe93gy_-EMuO1sDzqqj4-Q7wp5krtix4&usqp=CAU"
                        alt="Attiéké ivoirien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNYaDITXC2q3GGT-7AIim8t0F_3F7HxKC3-TtttecQHtnyqHWdWjnvWgSofKBD5-bY0Y8&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Attiéké Traditionnel</div>
                            <div class="product-description">Semoule de manioc • Plat typique</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 5 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 1 000 – 2 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle beige"></span>
                            <span class="color-circle yellow"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">5</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>2 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwANXN5rOnLb_XF7XEu2k6JnaWsi3CLtGIdcOWTTON4LvcHSQTaNp0YcxFtT4kzgf_lP0&usqp=CAU"
                        alt="Riz ivoirien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4TjDuYkvlg0IYM2tXnkbewc8X4DLs09cB_XlJVm4PgZA8iTaCNskU3Myz97WFXMbrt54&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Riz Local</div>
                            <div class="product-description">Riz blanc non parfumé • Origine CI</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 25 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 10 000 – 12 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle white"></span>
                            <span class="color-circle beige"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">6</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>12 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://grandexotique.com/cdn/shop/files/IMG_6790.heic?v=1749022466&width=1946"
                        alt="Huile de palme rouge" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZEYhvwapVJQfcjnz5XFZq3syouD451qPEpWrhP5EagGds2xJzMkhDpX9ipn6HrH5Lh-g&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Huile de Palme Rouge</div>
                            <div class="product-description">Pressée à froid • Qualité locale</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 5 L</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 3 000 – 5 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle red"></span>
                            <span class="color-circle orange"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">4</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>5 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8TCe5urX_opitXGeBcQgSu6PR6Gvfo_rkvALbLg-ImKBDJNxA2XPkcs_PyhC8Ni7vgRs&usqp=CAU"
                        alt="Noix de cajou" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB9pLE-Mgu1X54gNUyHKqNkXdSZGDxQQ6L8V0NCJxYc7h-G2Py1vIBvkPYK3tncRdwV70&usqp=CAU"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Noix de Cajou</div>
                            <div class="product-description">Grillées • Origine Côte d’Ivoire</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 10 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 6 000 – 8 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle beige"></span>
                            <span class="color-circle brown"></span>
                            <span class="color-circle yellow"></span>
                            <div class="color-number-standalone">9</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>8 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>
                    <img src="https://s5q3y8p7.delivery.rocketcdn.me/wp-content/uploads/2018/12/00288-cacao-pur-en-poudre-bio-le-kilo-300x300.jpg"
                        alt="Poudre de cacao" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://saldac.com/wp-content/uploads/2018/12/00289-cacao-sucre-en-poudre-bio-le-kilo-1200x900.jpg"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Poudre de Cacao</div>
                            <div class="product-description">100% naturel • Non sucré</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 2 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 4 500 – 7 000 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle brown"></span>
                            <span class="color-circle darkred"></span>
                            <span class="color-circle black"></span>
                            <div class="color-number-standalone">8</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>7 000 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="trend-card">
                <a href="#">
                    <div class="country-icon">
                        <img src="https://flagcdn.com/w40/ci.png" alt="CI" />
                    </div>
                    <div class="fav-btn">♡</div>

                    <img src="https://image.made-in-china.com/202f0j00VRGUeHSgIhzp/Super-Quality-Mesh-Bag-Packing-Chinese-Yellow-Whole-Fresh-Ginger.webp"
                        alt="Gingembre ivoirien" class="primary" />

                    <!-- Image secondaire (au survol) -->
                    <img src="https://image.made-in-china.com/2f0j00QvfiDKgCIIUa/New-Crop-Fresh-Ginger-for-Sale-Ginger-Root-Superior-Quality-From-China.webp"
                        alt="T-shirt vue arrière" class="secondary">

                    <div class="product-info">
                        <div class="product-details">
                            <div class="product-title">Gingembre Frais</div>
                            <div class="product-description">Racine fraîche • Origine CI</div>
                            <div class="product-extra">
                                <div class="moq"><i class="fa-solid fa-boxes-stacked"></i> MOQ : 20 kg</div>
                                <div class="price"><i class="fa-solid fa-tag"></i> 2 000 – 3 500 FCFA</div>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <i class="cart-icon">🛒</i>
                        </div>
                    </div>

                    <div class="price-colors-container">
                        <div class="color-options-vertical">
                            <span class="color-circle beige"></span>
                            <span class="color-circle yellow"></span>
                            <span class="color-circle brown"></span>
                            <div class="color-number-standalone">5</div>
                        </div>
                    </div>

                    <div class="bottom-info">
                        <div class="product-price"><i class="fa-solid fa-tag"></i>3 500 FCFA</div>
                    </div>
                </a>
            </div>

            <div class="grid-container">

                <div class="product-card">
                    <img src="https://cdn.prod.website-files.com/6258429f68ebead7665d57ed/625d6b9665c4f71ce1488e38_Objets-et-d%C3%A9coration.jpg" alt="Puzzle"
                        class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>1 400 FCFA <s class="old-price">5 600
                            FCFA</s></span>
                </div>

                <div class="product-card">
                    <img src="https://kaolackcreations.com/wp-content/uploads/2023/11/bracelet-africain-3-metaux-lamou-ndiaxass-3.jpg"
                        alt="Lip Balms Tray" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>2 600 FCFA <s class="old-price">6 500
                            FCFA</s></span>
                </div>

                <div class="product-card">
                    <img src="https://images.hbjo-online.com/webp/sites/constant/uploads/images/687661b517d7e67409df487fb9_ashanti.png"
                        alt="Cards" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>2 240 FCFA <s class="old-price">4 480
                            FCFA</s></span>
                </div>

                <div class="product-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpgGPZRihx61SvLToPaNYRh7t_UVF_9CT6_Q&s"
                        alt="Scrub" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>6 470 FCFA</span>
                    <span class="video-indicator">▶</span>
                </div>

                <div class="product-card">
                    <img src="https://cdn.prod.website-files.com/6258429f68ebead7665d57ed/626c04305c81c0800f8ab5bf_62627ae26fd9a427d3728938_6260850f6d2476a1f0be78e8_AC%2525E2%252580%2525A2Sacs-de-riz-recycl%2525C3%2525A9s_.jpeg"
                        alt="Spices" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>6 100 FCFA</span>
                </div>

                <div class="product-card">
                    <img src="https://mianmedia.com/wp-content/uploads/2023/02/ustanciles3.jpg" alt="Scrub"
                        class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>6 470 FCFA</span>
                    <span class="video-indicator">▶</span>
                </div>

                <div class="product-card">
                    <img src="https://pipcke.fr/idees-deco/wp-content/uploads/2023/04/salon-deco-africaine-tableaux-motifs-geometriques-poufs-en-cuir.jpeg"
                        alt="Tubes Vertical" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>5 800 FCFA</span>
                </div>

                <div class="product-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwVTIjlHg9nWODHmXVFYSgKf4FWBcVWrEwYg&s"
                        alt="Tubes Scattered" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>5 390 FCFA</span>
                </div>

                <div class="product-card">
                    <img src="https://www.luckyfind.fr/sites/luckyfind/files/classifieds/142027-623c7e1432fd2-623c7d912e672-063.jpg"
                        alt="Cards" class="image-placeholder">
                    <span class="prices"><i class="fa-solid fa-tag"></i>2 240 FCFA <s class="old-price">4 480
                            FCFA</s></span>
                </div>

            </div>





            
            <a href="autre-page.html" class="afri-see-more">Vois plus</a>

        </div>

    </section>
    <!-- Fin -->

    <section class="video-section">

        <!-- 🎥 Vidéo de fond -->
        <video id="bgVideo" autoplay muted loop playsinline>
            <source src="{{ asset('assets/images/cote.mp4') }}" type="video/mp4">
            Ton navigateur ne supporte pas la vidéo.
        </video>

        <!-- Points touristiques interactifs -->
        <a href="#">
            <div class="tourist-point" style="top:20%; left:30%;" data-city="Abidjan"
                data-description="Capitale économique, vibrante et moderne."
                data-attractions="Plateau, Île Boulay, Banco National Park, Marché de Treichville">
                <span class="city-label">Abidjan</span>
            </div>

        </a>

        <a href="#">
            <div class="tourist-point" style="top:50%; left:60%;" data-city="Yamoussoukro"
                data-description="Capitale politique et religieuse, architecture impressionnante."
                data-attractions="Basilique Notre-Dame, Lac aux caïmans, Palais présidentiel">
                <span class="city-label">Yamoussoukro</span>
            </div>

        </a>

        <a href="#">
            <div class="tourist-point" style="top:70%; left:20%;" data-city="San Pedro"
                data-description="Ville portuaire et plages paradisiaques."
                data-attractions="Plage de San Pedro, Forêt tropicale, Port de commerce">
                <span class="city-label">San Pedro</span>
            </div>
        </a>

        <a href="#">
            <div class="tourist-point" style="top:35%; left:15%;" data-city="Grand-Bassam"
                data-description="Ancienne capitale coloniale, riche en histoire."
                data-attractions="Vieille ville coloniale, Musée de Grand-Bassam, Artisanat local">
                <span class="city-label">Grand-Bassam</span>
            </div>
        </a>

        <a href="#">
            <div class="tourist-point" style="top:60%; left:80%;" data-city="Bouaké"
                data-description="Deuxième plus grande ville, commerce et culture."
                data-attractions="Marchés traditionnels, Musée de Bouaké, Parc National de la Marahoué">
                <span class="city-label">Bouaké</span>
            </div>
        </a>

        <a href="#">
            <div class="tourist-point" style="top:63%; left:45%;" data-city="Man"
                data-description="Ville de montagnes et cascades."
                data-attractions="La Dent de Man, Cascades, Artisanat, Culture Dan">
                <span class="city-label">Man</span>
            </div>
        </a>

        <a href="#">
            <div class="tourist-point" style="top:25%; left:70%;" data-city="Assinie"
                data-description="Station balnéaire prisée pour le luxe et le farniente."
                data-attractions="Plages, Resorts, Excursions en bateau, Sports nautiques">
                <span class="city-label">Assinie</span>
            </div>

        </a>

        <!-- Infobulle qui apparaît au clic -->
        <div class="city-info" id="cityInfo">
            <h3 id="infoCityName"></h3>
            <p id="infoCityDescription"></p>
            <p id="infoCityAttractions"></p>
        </div>

        <!-- Texte captivant en bas -->
        <div class="bottom-text">
            <h2>Explorez les merveilles de chaque coin.</h2>
            <!--<a href="#">Explorer</a> -->
        </div>

    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const points = document.querySelectorAll(".tourist-point");
            const cityInfo = document.getElementById("cityInfo");
            const infoCityName = document.getElementById("infoCityName");
            const infoCityDescription = document.getElementById("infoCityDescription");
            const infoCityAttractions = document.getElementById("infoCityAttractions");
            if (!points.length || !cityInfo) return; // sécurité
            points.forEach(point => {
                // ✅ Survol du point → afficher l’infobulle
                point.addEventListener("mouseenter", (e) => {
                    const city = point.dataset.city;
                    const desc = point.dataset.description;
                    const attr = point.dataset.attractions;
                    infoCityName.textContent = city;
                    infoCityDescription.textContent = desc;
                    infoCityAttractions.textContent = "À visiter : " + attr;
                    // Positionner l’infobulle à côté du point
                    const rect = point.getBoundingClientRect();
                    const sectionRect = document.querySelector(".video-section")
                        .getBoundingClientRect();
                    cityInfo.style.top = rect.top - sectionRect.top + "px";
                    cityInfo.style.left = rect.left - sectionRect.left + 40 + "px";
                    cityInfo.classList.add("show");
                });
                // ✅ Sortie de la souris → cacher
                point.addEventListener("mouseleave", () => {
                    cityInfo.classList.remove("show");
                });
            });
            // ✅ Clic ailleurs = fermer
            document.addEventListener("click", (e) => {
                if (!e.target.closest(".tourist-point")) {
                    cityInfo.classList.remove("show");
                }
            });
        });
    </script>

    <!-- ===== Section Favoris ===== -->
    <div class="afriba-section">
        <div class="afriba-grid">

            <!-- Bloc titre -->
            <div class="afriba-block afriba-title">
                <div class="afriba-title-content">
                    <p class="afriba-subtitle">Coups de cœur</p>
                    <h2>Produits Locaux Afriba</h2>
                    <a href="#">Découvrir les créateurs locaux →</a>
                </div>
            </div>

            <!-- Blocs produits avec prix en CFA -->
            <div class="afriba-block afriba-product afriba-flowers">
                <div class="afriba-image-wrapper">
                    <img src="https://www.moncolonel.fr/img/p/5/6/7/0/2/56702.jpg"
                        alt="Fauteuil africain en bois sculpté" class="afriba-product-image">
                    <span class="afriba-product-price">78 600 FCFA</span>
                </div>
            </div>

            <div class="afriba-block afriba-product afriba-jewelry">
                <div class="afriba-image-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo6g6aHyM41HIFJapFJFJ1k_phLPJfCgeqFw&s"
                        alt="Chaise artisanale africaine" class="afriba-product-image">
                    <span class="afriba-product-price">48 750 FCFA</span>
                </div>
            </div>

            <div class="afriba-block afriba-product afriba-cat">
                <div class="afriba-image-wrapper">
                    <img src="https://img.leboncoin.fr/api/v1/lbcpb1/images/7a/cc/6d/7acc6dd613a7ba0d4ff97696961c01cec94cf727.jpg?rule=ad-large"
                        alt="Tabouret africain sculpté" class="afriba-product-image">
                    <span class="afriba-product-price">35 700 FCFA</span>
                </div>
            </div>

            <div class="afriba-block afriba-product afriba-tote">
                <div class="afriba-image-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRi7B9ZgsoXpQ22Bh-4f_TffTe4MdCXGbqwAw&s"
                        alt="Table artisanale africaine" class="afriba-product-image">
                    <span class="afriba-product-price">142 000 FCFA</span>
                </div>
            </div>

            <!-- Bloc description -->
            <div class="afriba-block afriba-desc">
                <div class="afriba-image-wrapper">
                    <img src="https://www.amadeco.fr/media/.renditions/magefan_blog/deco-africaine/salon-africain-masques-sculptures.jpg"
                        alt="Mobilier africain artisanal" class="afriba-product-image">
                </div>
                <p class="afriba-desc-text">
                    Découvrez l’art du mobilier africain : chaises, tabourets et tables sculptés à la main par des
                    artisans passionnés. Des pièces uniques qui apportent chaleur et authenticité à votre intérieur.
                </p>
            </div>

        </div>
    </div>

    <!-- 🌟 Nouveaux Arrivages Premium -->
    <section class="nouveaux-arrivages">
        <div class="section-header">
            <h2>Nouveaux Arrivages</h2>
            <a href="#">Voir tous</a>
        </div>
        <p class="section-subtitle">Restez à jour avec les dernières créations artisanales</p>

        <div class="arrivages-slider">
            <!-- Carte produit 1 -->
            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://bradorshop.it/cdn/shop/files/59-579NERO1.1_2048x.jpg?v=1715643320"
                        alt="Chaussures en cuir">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Chaussures en cuir</p>
                    <span class="card-price">6 000 FCFA</span>
                    <small>MOQ: 2</small>
                </div>
            </div>

            <!-- Carte produit 2 -->
            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://i.pinimg.com/originals/88/51/0c/88510c4890d02f9dcfeb87f9b2fb4dd1.jpg"
                        alt="Calebasse décorative">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Calebasse décorative</p>
                    <span class="card-price">2 800 FCFA</span>
                    <small>MOQ: 3</small>
                </div>
            </div>

            <!-- Carte produit 3 -->
            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://essinkla.com/wp-content/uploads/2021/04/379A4196.png"
                        alt="Bijoux perles africaines">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Bijoux perles africaines</p>
                    <span class="card-price">1 500 FCFA</span>
                    <small>MOQ: 5</small>
                </div>
            </div>

            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVT2KBR6bU5l9PwP1EHvkMcdjA9LuA16XX0Q&s"
                        alt="Sac artisanal en raphia">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Sac artisanal en raphia</p>
                    <span class="card-price">4 200 FCFA</span>
                    <small>MOQ: 4</small>
                </div>
            </div>

            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTirmfPvv71ynb3WUeTkIMFPxX-AU6xCI9X1w&s"
                        alt="Panier tressé artisanal">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Panier tressé artisanal</p>
                    <span class="card-price">3 000 FCFA</span>
                    <small>MOQ: 5</small>
                </div>
            </div>

            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://png.pngtree.com/png-vector/20241204/ourmid/pngtree-hand-carved-wooden-african-stool-with-tribal-patterns-png-image_14557727.png"
                        alt="Tabouret traditionnel">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Tabouret en bois</p>
                    <span class="card-price">7 500 FCFA</span>
                    <small>MOQ: 2</small>
                </div>
            </div>
            <div class="arrivage-card">
                <div class="card-image-wrapper">
                    <img src="https://m.media-amazon.com/images/I/61IPbC8obYL.jpg" alt="Statue artisanale africaine">
                    <div class="tag-new">NOUVEAU</div>
                </div>
                <div class="card-content">
                    <p class="card-title">Statue artisanale</p>
                    <span class="card-price">12 000 FCFA</span>
                    <small>MOQ: 1</small>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== Publicite ===== -->

    <div class="recall-header">
        <h2>Quand la culture rencontre la création</h2>
        <p>Afriba, la vitrine des talents, des artisans et des événements d’Afrique.</p>
    </div>

    <div class="recall-banner">

        <!-- Colonne gauche LED -->
        <div class="led-block">
            <span class="led-label">Évènement</span>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJ0Ol_8sJ-IER_1YJx5Z6M4y62Nrxg0ns2mQ&s"
                alt="Pub 1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn7zUFBd39xhBHub80m3N6_5pFgU3YZ0lt1A&s"
                alt="Pub 2">
            <img src="https://baab.ci/wp-content/uploads/2024/11/Rap-Ivoire-Festival-BAAB.jpg" alt="Pub 3">
        </div>

        <!-- Colonne droite vidéo -->
        <div class="video-block">
            <video autoplay muted loop id="myVideo">
                <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la vidéo.
            </video>

            <!-- Bouton pause/lecture -->
            <button class="pause-btn" id="pauseBtn">
                <span class="pause-icon">||</span>
            </button>

            <!-- Texte sur la vidéo -->
            <div class="video-overlay">
                <p>Personnalisez votre article</p>
                <p>Créez un style unique pour vous ou pour offrir</p>
                <span class="start-btn">Commencer &rarr;</span>
            </div>
        </div>

    </div>

    <!-- ✅ En vedette -->

    <section class="afriba-videos">
        <div class="header">
            <h2>En vedette dans les vidéos</h2>
            <span class="video-info">🎬 Voir ce que les créateurs partagent</span>
        </div>

        <div class="scroll-arrow left"
            onclick="document.querySelector('.video-row').scrollBy({left: -300, behavior: 'smooth'})">
            &#10094;
        </div>
        <div class="scroll-arrow right"
            onclick="document.querySelector('.video-row').scrollBy({left: 300, behavior: 'smooth'})">
            &#10095;
        </div>

        <div class="video-row">
            <!-- 📦 Carte 1 -->
            <div class="video-card">
                <div class="video-frame">
                    <video src="https://www.w3schools.com/html/movie.mp4" muted playsinline loop
                        poster="poster1.jpg"></video>
                    <span class="user">@allyscart</span>
                </div>
                <div class="video-details">
                    <img src="https://images.selfridges.com/is/image/selfridges/R04462649_KHAKI_M?$PLP_ALL$"
                        alt="Produit" class="mini-img">
                    <div>
                        <span class="price"><i class="fa-solid fa-tag"></i> 12 000 FCFA</span>
                        <p class="description">Blouson Himra – Tissu imprimé africain stylé</p>
                    </div>
                </div>
            </div>

            <!-- 📦 Carte 2 -->
            <div class="video-card">
                <div class="video-frame">
                    <video src="video2.mp4" muted playsinline loop poster="poster2.jpg"></video>
                    <span class="user">@naomistyle</span>
                </div>
                <div class="video-details">
                    <img src="https://via.placeholder.com/45" alt="Produit" class="mini-img">
                    <div>
                        <span class="price"><i class="fa-solid fa-tag"></i> 8 500 FCFA</span>
                        <p class="description">Pagne Wax - 6 yards motifs traditionnels</p>
                    </div>
                </div>
            </div>

            <!-- 📦 Carte 3 -->
            <div class="video-card">
                <div class="video-frame">
                    <video src="video3.mp4" muted playsinline loop poster="poster3.jpg"></video>
                    <span class="user">@modeafrica</span>
                </div>
                <div class="video-details">
                    <img src="https://via.placeholder.com/45" alt="Produit" class="mini-img">
                    <div>
                        <span class="price"><i class="fa-solid fa-tag"></i> 15 000 FCFA</span>
                        <p class="description">Sandales en cuir artisanales - Made in Abidjan</p>
                    </div>
                </div>
            </div>

            <!-- 📦 Carte 4 -->
            <div class="video-card">
                <div class="video-frame">
                    <video src="video4.mp4" muted playsinline loop poster="poster4.jpg"></video>
                    <span class="user">@djigui</span>
                </div>
                <div class="video-details">
                    <img src="https://via.placeholder.com/45" alt="Produit" class="mini-img">
                    <div>
                        <span class="price"><i class="fa-solid fa-tag"></i> 10 000 FCFA</span>
                        <p class="description">Sac en raphia – Accessoire éthique et tendance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION INSPIRATION AFRIBA -->
    <div class="inspiration-section">
        <!-- HEADER -->
        <div class="header">
            <h2>Faites le plein d'inspiration !</h2>
            <p>Découvrez nos articles populaires et interactifs</p>
        </div>

        <!-- CAROUSEL -->
        <div class="carousel-wrapper">

            <div class="carousel-content">
                <!-- Image 1 -->
                <div class="product-vignette">
                    <img src="https://cdn.manomano.com/images/images_products/26714707/P/134256510_1.jpg"
                        alt="Armoire KALLAX">
                    <div class="af-point" style="top:60%; left:20%">
                        <div class="af-tooltip">Étagère KALLAX - 54 900 FCFA</div>
                    </div>
                    <div class="af-point" style="top:65%; left:50%">
                        <div class="af-tooltip">Tablette - 12 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:45%; left:80%">
                        <div class="af-tooltip">Décoration - 8 500 FCFA</div>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="product-vignette">
                    <img src="https://img.freepik.com/photos-premium/beau-salon-noir-violet-meubles-luxueux_7023-2429.jpg"
                        alt="Salon violet">
                    <div class="af-point" style="top:60%; left:25%">
                        <div class="af-tooltip">Canapé Luxe - 175 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:70%; left:55%">
                        <div class="af-tooltip">Table Basse - 65 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:40%; left:75%">
                        <div class="af-tooltip">Tapis - 25 000 FCFA</div>
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="product-vignette">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnq0f9_WPLXpCRMJ3anlwAWKes8vrSZAy8Dw&s"
                        alt="Armoire miroir">
                    <div class="af-point" style="top:55%; left:30%">
                        <div class="af-tooltip">Armoire Miroir - 95 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:65%; left:60%">
                        <div class="af-tooltip">Étagère Murale - 42 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:40%; left:80%">
                        <div class="af-tooltip">Lampe - 20 000 FCFA</div>
                    </div>
                </div>

                <!-- Image 4 -->
                <div class="product-vignette">
                    <img src="https://m.media-amazon.com/images/I/51slI1uFIbL._UF1000,1000_QL80_.jpg" alt="Meuble noir">
                    <div class="af-point" style="top:60%; left:25%">
                        <div class="af-tooltip">Meuble TV - 80 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:50%; left:50%">
                        <div class="af-tooltip">Décoration Murale - 15 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:70%; left:75%">
                        <div class="af-tooltip">Console - 45 000 FCFA</div>
                    </div>
                </div>

                <!-- Image 5 -->
                <div class="product-vignette">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Salon Afriba">
                    <div class="af-point" style="top:50%; left:30%">
                        <div class="af-tooltip">Table basse - 65 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:60%; left:55%">
                        <div class="af-tooltip">Fauteuil - 45 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:70%; left:80%">
                        <div class="af-tooltip">Lampe Sol - 22 000 FCFA</div>
                    </div>
                </div>

                <!-- Image 6 -->
                <div class="product-vignette">
                    <img src="https://images.unsplash.com/photo-1600585154203-aca7d1f6c9b0" alt="Salle à manger">
                    <div class="af-point" style="top:60%; left:25%">
                        <div class="af-tooltip">Chaise bois - 45 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:50%; left:50%">
                        <div class="af-tooltip">Table à manger - 110 000 FCFA</div>
                    </div>
                    <div class="af-point" style="top:70%; left:75%">
                        <div class="af-tooltip">Suspension - 30 000 FCFA</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="feedback-section">
        <div class="feedback-content">
            <h2>Nous serions ravis de savoir ce que vous en pensez&nbsp;!</h2>
            <button class="feedback-button">Donner son avis</button>
        </div>
    </div>

    <footer class="main-footer">
        <!-- ======= Section ENGAGEMENTS ======= -->
        <section class="footer-engagements">
            <h2>Nos Engagements</h2>
            <div class="footer-engagements-list">
                <div class="footer-engagement-item">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3>Valoriser l’Afrique</h3>
                    <p>Promouvoir les produits et les talents du continent africain dans le respect des traditions et de
                        l’innovation.</p>
                </div>
                <div class="footer-engagement-item">
                    <i class="fas fa-users"></i>
                    <h3>Soutien Local</h3>
                    <p>Travailler main dans la main avec les petits producteurs, artisans et créateurs africains.</p>
                </div>
                <div class="footer-engagement-item">
                    <i class="fas fa-globe-africa"></i>
                    <h3>Accessibilité</h3>
                    <p>Rendre les produits africains accessibles à tous, en ligne, partout, facilement.</p>
                </div>
                <div class="footer-engagement-item">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Confiance & Qualité</h3>
                    <p>Garantir des achats sécurisés, des produits vérifiés et une expérience client fluide.</p>
                </div>
            </div>
        </section>
        <!-- Section haute : Logo + Navigation + Réseaux -->
        <div class="footer-top">
            <div class="footer-columns">
                <div class="footer-column">
                    <h4 class="footer-logo">Afriba</h4>
                    <p>La marketplace africaine qui connecte vendeurs et acheteurs en toute confiance.</p>
                    <p><i class="fas fa-map-marker-alt"></i> Abidjan, Côte d'Ivoire</p>
                    <p><i class="fas fa-envelope"></i> contact@afriba.ci</p>
                    <p><i class="fas fa-phone"></i> +225 01 23 45 67 89</p>
                </div>

                <div class="footer-column">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Produits</a></li>
                        <li><a href="#">Vendeurs</a></li>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Aide & Support</h4>
                    <ul>
                        <li><a href="#">Centre d’aide</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Livraison</a></li>
                        <li><a href="#">Retours & Remboursements</a></li>
                        <li><a href="#">Conditions d’utilisation</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Suivez-nous</h4>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- === SECTION AFRIQUE === -->
        <section class="africa-countries">
            <h3>Inspiré par les cultures africaines :</h3>
            <div class="countries-row">
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/ci.png" alt="Côte d’Ivoire">
                    <span>Côte d’Ivoire</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/ml.png" alt="Mali">
                    <span>Mali</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/bf.png" alt="Burkina Faso">
                    <span>Burkina Faso</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/tg.png" alt="Togo">
                    <span>Togo</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/bj.png" alt="Bénin">
                    <span>Bénin</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/sn.png" alt="Sénégal">
                    <span>Sénégal</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/cm.png" alt="Cameroun">
                    <span>Cameroun</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/gn.png" alt="Guinée">
                    <span>Guinée</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/ng.png" alt="Nigeria">
                    <span>Nigeria</span>
                </div>
                <div class="country-card">
                    <img src="https://flagcdn.com/w40/gh.png" alt="Ghana">
                    <span>Ghana</span>
                </div>
            </div>
        </section>

        <!-- Partenaires -->
        <!-- Partenaires et Moyens de paiement -->
        <div class="footer-partners-payments">
            <!-- Partenaires à gauche -->
            <div class="footer-column">
                <h4>Nos Partenaires</h4>
                <div class="partners-logos">
                    <img src="https://loutche.com/web/img/logo-sdc.png" alt="Loutche">
                    <img src="https://static.wixstatic.com/media/00f1e2_91a966a222c6454487e30e9a6ba36e28~mv2.jpeg"
                        alt="O'black">

                </div>
            </div>

            <!-- Moyens de paiement à droite -->
            <div class="footer-column">
                <h4>Nos Moyens de Paiement</h4>
                <div class="payments-logos">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Orange_logo.svg/120px-Orange_logo.svg.png"
                        alt="Orange Money">
                    <img src="https://www.abidjan.net/public/img/logo-mtn.jpg" alt="MTN">
                    <img src="https://yt3.googleusercontent.com/So4zVrbYgRhy9UskS8_Fduc5rq6uO6dq6uZec4PwMRhKEJEcJ6gEGysdzyt3jxfC36B-mZ4P=s900-c-k-c0x00ffffff-no-rj"
                        alt="Moov Money">
                    <img src="https://play-lh.googleusercontent.com/NgAdQMq9Mu2NTJredx6COxScVB3tp153h_bVKQTXUt9Aou0Lz1PfffaQt5jFN9jlBfo"
                        alt="Wave Money">
                    <img src="https://cdn-icons-png.flaticon.com/128/1019/1019607.png"
                        alt="Cash à la livraison">
                    <img src="https://cdn-icons-png.flaticon.com/128/5790/5790705.png"
                        alt="Carte Bancaire">
                </div>
            </div>
        </div>

        <!-- Liens rapides -->
        <div class="footer-links">
            <a href="#">Acheter sur Afriba</a> |
            <a href="#">Devenir vendeur</a> |
            <a href="#">Politique de confidentialité</a> |
            <a href="#">Conditions d’utilisation</a>
        </div>

        <!-- Bas du footer -->
        <div class="footer-bottom">
            <p>&copy; 2025 Afriba. Tous droits réservés. | Conçu avec ❤️ en Afrique | DIOM😉</p>
        </div>
    </footer>
    <!-- JS -->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/touris.js')}}"></script>

</body>

</html>