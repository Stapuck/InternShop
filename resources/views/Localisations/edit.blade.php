<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establishments index</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
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

    <!-- Style du body -->


    <div class="flex justify-center items-center h-screen">
        <div class="flex-1 max-w-lg p-8 mx-2 bg-[#ffff] rounded-sm shadow-md">

            <!-- titre du formulaire -->
            <section class="pt-2 pb-4">
                <h1 class="text-xl font-extrabold uppercase flex justify-center">Modifier une Localisation</h1>
            </section>

            <section>
                <form class="flex flex-col" method="POST"
                    action="{{ route('Localisations.update', $requestItem->id) }}">
                    @csrf
                    <!-- street_number -->
                    <div class="pt-2 mb-4 bg-gray-100 rounded-sm">
                        <label class="block mx-3 mb-2 text-xs font-bold text-gray-700 uppercase"
                            for="street_number">Numéro de la rue</label>
                        <input type="number" name="street_number" autofocus required
                            value={{ $requestItem->street_number }}
                            class="w-full px-3 pb-3 text-sm text-gray-700 transition duration-300 bg-gray-100 border-b-2 border-gray-200 rounded-sm focus:outline-none focus:border-green-[#4A7B59] hover:border-[#347260]" />
                    </div>

                    <!-- street_name -->
                    <div class="pt-2 mb-4 bg-gray-100 rounded-sm">
                        <label class="block mx-3 mb-2 text-xs font-bold text-gray-700 uppercase" for="street_name">Nom
                            de la rue</label>
                        <input type="text" name="street_name" autofocus required
                            value={{ $requestItem->street_name }}
                            class="w-full px-3 pb-3 text-sm text-gray-700 transition duration-300 bg-gray-100 border-b-2 border-gray-200 rounded-sm focus:outline-none focus:border-[#4A7B59] hover:border-[#347260]" />
                    </div>

                    <!-- town -->
                    <div class="pt-2 mb-4 bg-gray-100 rounded-sm">
                        <label class="block mx-3 mb-2 text-xs font-bold text-gray-700 uppercase"
                            for="town">Ville</label>
                        <input type="text" name="town" autofocus required value={{ $requestItem->town }}
                            class="w-full px-3 pb-3 text-sm text-gray-700 transition duration-300 bg-gray-100 border-b-2 border-gray-200 rounded-sm focus:outline-none focus:border-[#4A7B59] hover:border-[#347260]" />
                    </div>

                    <!-- zip_code -->
                    <div class="pt-2 mb-4 bg-gray-100 rounded-sm">
                        <label class="block mx-3 mb-2 text-xs font-bold text-gray-700 uppercase" for="zip_code">Code
                            postale</label>
                        <input type="zipcode" max="6" name="zip_code" autofocus required
                            value={{ $requestItem->zip_code }}
                            class="w-full px-3 pb-3 text-sm text-gray-700 transition duration-300 bg-gray-100 border-b-2 border-gray-200 rounded-sm focus:outline-none focus:border-[#4A7B59] hover:border-[#347260]" />
                    </div>

                    <!-- region -->
                    <div class="pt-2 mb-4 bg-gray-100 rounded-sm">
                        <label class="block mx-3 mb-2 text-xs font-bold text-gray-700 uppercase"
                            for="region">Région</label>
                        <input type="text" name="region" autofocus required value={{ $requestItem->region }}
                            class="w-full px-3 pb-3 text-sm text-gray-700 transition duration-300 bg-gray-100 border-b-2 border-gray-200 rounded-sm focus:outline-none focus:border-[#4A7B59] hover:border-[#347260]" />
                    </div>


                    <button type="submit"
                        class="p-4 mb-2 text-sm font-bold text-white uppercase transition duration-300 bg-[#4A7B59] rounded-sm shadow-sm hover:bg-[#649673] hover:shadow-md">
                        Mettre à jour
                </form>
            </section>
        </div>
    </div>

    <a href="{{ route('Localisations.index') }}"
        class=" m-2 text-sm font-semibold text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline">Retour</a>
    </div>

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
