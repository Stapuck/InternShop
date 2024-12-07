<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>offers index</title>
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

    <main>

        {{-- Infos personnelles --}}
        <div class=" ml-4">
            <p class=" text-2xl underline-offset-1">Informations personnelles</p><br>

            <div class="flex">
                <p class="mb-4 text-base text-black font-semibold ">
                    Nom:
                </p>
                <p class="text-black ml-2">
                    {{ $companies[0]->name }}
                </p>
            </div>

            <div class="flex">
                <p class="mb-4 text-base text-black font-semibold ">
                    Elève du cesi:
                </p>
                <p class="text-black ml-2">
                    {{ $companies[0]->students_from_cesi }}
                </p>
            </div>

            <div class="flex">
                <p class="mb-4 text-base text-black font-semibold">
                    Domaine d'activité:
                </p>
                <p class="text-black ml-2">
                    {{ $companies[0]->business_line }}
                </p>
            </div>

            <div class="flex">
                <p class="mb-4 text-base text-black font-semibold ">
                    Responsable:
                </p>
                <p class="text-black ml-2">
                    {{-- {{ $companies[0]->users_id }} --}}
                    {{ $companies[0]->Users->first_name }}
                    {{ $companies[0]->Users->last_name }}
                </p>
            </div>
        </div>



        {{-- offres --}}
        {{-- <div class=" ml-4">
            <p class="text-2xl underline-offset-1">Mes offres</p>
            @foreach ($offers as $item)
                @if ($item->companies_id === $companies[0]->id)
                    {{ $item->id }}
                    {{ $item->detail }}
                    {{ $item->duration }}
                @endif
            @endforeach
        </div> --}}


        {{-- Candidature --}}
        {{-- <div class=" ml-4">
            <p class="text-2xl underline-offset-1">Les candidatures</p>
            @foreach ($application as $item)
                @if ($item->companies_id === $application[0]->id)
                    {{ $item->synopsis }}
                    {{ $item->application_letter }}
                    {{ $item->duration }}
                @endif
            @endforeach
        </div> --}}


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