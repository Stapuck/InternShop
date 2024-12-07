<!DOCTYPE html>
<html lang="en">

<head>
    {{-- style link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="js/hamburger.js"></script>
    <script src="js/caroussel.js"></script> -->
</head>

<body class="antialiased bg-gray-100" style="font-family: 'Poppins';">

    {{-- header --}}
    <header class="header mb-4">
        <nav class="navbar">

            <div class="flex items-stretch">
                <div class="flex items-stretch">
                    <img class="object-cover h-14 w-14" src="{{ asset('imgs/logo.png') }}" alt="logo">
                    <h2 class=" self-center ml-2 text-black font-bold text-2xl ">Internshop</h2>
                </div>
            </div>


            {{-- revoir pb de superposition --}}

            <ul class="nav-menu">

                <li class="nav-item">
                    <a href="/" class="item">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="/Apropos" class="item">A propos</a>
                </li>
                <li class="nav-item">
                    <a href="/Blog" class="item">Blog</a>
                </li>

                @if (Auth::check() && Auth::user()->roles_id === 2)
                    <li class="nav-item">

                        <a href="/Wishlists">Wishlist</a>

                    </li>
                @endif

                <li class="nav-item">
                    {{-- Bouton pour se connecter --}}
                    @if (Auth::check() && Auth::user()->roles_id === 2)
                        <form action="/student/dashboard" method="GET">
                            <button type="submit"> Profil</button>
                        </form>
                    @endif

                    @if (Auth::check() && Auth::user()->roles_id === 1)
                        <form action="/admin/dashboard" method="GET">
                            <button type="submit"> Profil</button>
                        </form>
                    @endif

                    @if (Auth::check() && Auth::user()->roles_id === 3)
                        <form action="/pilote/dashboard" method="GET">
                            <button type="submit"> Profil</button>
                        </form>
                    @endif

                    @if (Auth::check() && Auth::user()->roles_id === 4)
                        <form action="/company/dashboard" method="GET">
                            <button type="submit"> Profil</button>
                        </form>
                    @endif

                </li>

                <li class="nav-item">

                    @if (!Auth::check())
                        <form action="/login" method="GET">
                            <button type="submit"
                                class="p-2 m-3 mr-2 text-xs font-bold text-white transition duration-300 bg-[#4A7B59] rounded-full shadow-sm hover:bg-[#649673] hover:shadow-md">
                                Connexion </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="p-2 m-3 mr-2 text-xs font-bold text-white transition duration-300 bg-[#4A7B59] rounded-full shadow-sm hover:bg-red-400 hover:shadow-md"
                                href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">Se
                                déconnecter</a>
                        </form>
                    @endif
                </li>
            </ul>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-medium text-[#4A7B59] mb-8">Nous vous proposons également nos services</h1>

            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Recherche de stage</h2>
                <p class="text-gray-700 leading-7">Internshop vous propose une gamme de services pour vous aider à
                    trouver
                    le stage de vos rêves. Nous travaillons avec des entreprises de toutes tailles dans différents
                    secteurs
                    pour vous offrir un large choix de stages.</p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Candidature</h2>
                <p class="text-gray-700 leading-7">Nous avons également développé un outil de candidature simplifié, qui
                    vous permet de postuler facilement à des offres de stage. Vous pouvez télécharger votre CV et votre
                    lettre de motivation directement sur notre site, et nous les transmettons à l'entreprise pour vous.
                </p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Conseils personnalisés</h2>
                <p class="text-gray-700 leading-7">Nos experts en recrutement peuvent vous donner des conseils
                    personnalisés
                    pour vous aider à maximiser vos chances de trouver un stage. Nous pouvons vous aider à optimiser
                    votre
                    CV et votre lettre de motivation, à préparer votre entretien et à négocier votre rémunération.</p>
            </div>

        </div>
    </main>






    {{-- Footer --}}

    <footer class="bg-[#4A7B59] text-white py-6 my-5">
        <div class="container mx-auto flex-around flex items-start">

            {{-- div internshop --}}
            <div class="w-full flex md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-6 italic">
                <div class="  text-2xl font-bold  text-white-400">Intern</div>
                <div class="  text-2xl font-bold  text-blue-800">Shop</div>
                <div class="  text-2xl font-bold  text-white-400">.com</div>
            </div>

            {{-- div Liens --}}
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-6">
                <h3 class="text-base font-bold mb-2">Liens utiles</h3>
                <ul class="list-reset text-xs font-thin">
                    <li class="mb-2"><a href="/Home">Accueil</a></li>
                    <li class="mb-2"><a href="/Apropos">À propos</a></li>
                    <li class="mb-2"><a href="/Service">Services</a></li>
                    <li class="mb-2"><a href="/Blog">Blog</a></li>
                </ul>
            </div>

            {{-- div ressources --}}
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-6">
                <h3 class="text-base font-bold mb-2">Ressources</h3>
                <ul class="list-reset text-xs">
                    <li class="mb-2"><a href="/FAQ">FAQ</a></li>
                    <li class="mb-2"><a href="/Support">Support</a></li>
                    <li class="mb-2"><a href="/Contact">Contactez-nous</a></li>
                    <li class="mb-2"><a href="/Mention">Politique de confidentialité</a></li>
                </ul>
            </div>

            {{-- div suivez-nous --}}
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-6">
                <h3 class="text-base font-bold mb-2">Suivez-nous</h3>
                <ul class="list-reset text-xs">
                    <li class="mb-2"><a href="#">Facebook</a></li>
                    <li class="mb-2"><a href="https://twitter.com/InternShop_corp">Twitter</a></li>
                    <li class="mb-2"><a href="https://www.instagram.com/internshopcorp/">Instagram</a></li>
                    <li class="mb-2"><a href="#">LinkedIn</a></li>
                </ul>
            </div><br>
        </div>

        {{-- /mentions légales --}}
        <p class="text-center text-xs">© 2023 InternShop.com. Tous droits réservés.</p>

    </footer>

    <!-- faire une page pour chaque option dans le footer -->


    {{-- css pour hamburger et nav bar --}}
    <style>
        @import url("fonts.css");

        body {
            font-family: "Poppins", Arial, Helvetica, sans-serif;
        }

        /* Mise en forme navBar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* background-color: white; */
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .2);
        }

        a.item:hover {
            color: #1565C0;
        }

        a.nav-item {
            justify-content: left;
        }

        div.menu-items {
            display: flex;
        }

        /* Hamburger */

        .hamburger {
            display: none;
        }

        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            background-color: black;
        }

        /* Autres */

        .nav-menu {
            display: flex;
            align-items: center;
            padding-right: 2%;
        }

        .nav-item {
            margin-left: 3rem;
            font-size: 80%;
            display: flex;
            justify-content: space-between;
        }

        /* Media queries */

        @media only screen and (max-width: 768px) {
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 5rem;
                flex-direction: column;
                background-color: #4A7B59;
                width: 100%;
                border-radius: 0px;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-item {
                margin: 2.5rem 0;
            }

            .hamburger {
                display: block;
                cursor: pointer;
                padding-right: 2%;
            }

            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }

            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
        }


        /* Animation pour le bienvenue */
        .fade-in {
            opacity: 0;
            animation: fadeIn 2s ease-in-out forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    {{-- js pour Hamburger --}}
    <script>
        // Pour le menu hamburger
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        function mobileMenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }

        hamburger.addEventListener("click", mobileMenu);


        // pour fermer le Hamburger quand le menu est ouvert 
        const navLink = document.querySelectorAll(".nav-link");

        navLink.forEach(n => n.addEventListener("click", closeMenu));

        function closeMenu() {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }
    </script>
</body>

</html>
