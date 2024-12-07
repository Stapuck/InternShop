<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
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


    @if (Auth::check())
        <div class="flex flex-col justify-center items-center mt-2 ">
            <p class=" text-2xl font-bold mb-4 fade-in text-[#4A7B59]">Bonjour à toi, {{ Auth::user()->first_name }}</p>
        </div>
    @endif

    {{-- Corsps du site --}}
    <main>

        {{-- Bienvenue dans le site --}}

        <div class="flex flex-col justify-center items-center ">
            <h1 class="text-4xl font-bold mb-8 fade-in">Bienvenue sur InternShop</h1>
        </div>


        <!-- accès écoles et Entreprises -->

        <div>

            <div class=" card flex justify-evenly">
                <div class="">
                    <a href={{ route('Companies.index') }}>
                        <div
                            class="p-5 pb-10 flex flex-col pt-10 px-3 transition duration-300 ease-out hover:scale-105">
                            <img class=" drop-shadow-xl card-body rounded object-cover w-96 h-60"
                                src="{{ asset('imgs/company.png') }}" alt="Etablissements">
                            <p class=" card-text text-xl flex justify-center pt-3">Entreprises</p>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href={{ route('Establishments.index') }}>
                        <div
                            class="p-5 pb-10 flex flex-col pt-10 px-3 transition duration-300 ease-out hover:scale-105">
                            <img class=" drop-shadow-xl card rounded object-cover w-96 h-60"
                                src="{{ asset('imgs/school.png') }}" alt="Etablissements">
                            <p class=" card-text text-xl flex justify-center pt-3">Etablissements</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Affichage offres --}}

            <h1 class="font-medium text-center text-2xl ml-4">
                Découvrez nos dernières offres
            </h1><br>


            <div class="flex duration-150 justify-around">
                @foreach ($offers->take(4) as $item)
                    <div
                        class=" block rounded-lg bg-white p-5 shadow-lg m-3 w-25 transition duration-300 ease-out hover:scale-105  hover:bg-100">
                        <h5 class="mb-2 text-xl text-center font-medium leading-tight text-black">
                            Offre de Stage
                        </h5>

                        {{-- <div class="flex">
                            <p class="mb-4 text-base text-black font-semibold ">
                                Référence:
                            </p>
                            <p class="text-black ml-2">
                                {{ $item->id }}
                            </p>
                        </div> --}}


                        <div class="flex">
                            <p class="mb-4 text-base text-black font-semibold ">
                                Compagnie:
                            </p>
                            <p class="text-black ml-2">
                                {{ $item->Companies->name }}
                            </p>
                        </div>

                        <div class="flex">
                            <p class="mb-4 text-base text-black font-semibold">
                                Détails:
                            </p>
                            <p class="text-black ml-2">
                                {{ $item->detail }}
                            </p>
                        </div>

                        <div class="flex">
                            <p class="mb-4 text-base text-black font-semibold ">
                                Durée (en semaines):
                            </p>
                            <p class="text-black ml-2">
                                {{ $item->duration }}
                            </p>
                        </div>

                        <div class="flex">
                            <p class="mb-4 text-base text-black font-semibold ">
                                Promotions visées:
                            </p>
                            <p class="text-black ml-2">
                                {{ $item->target_promotion }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
            @if (Auth::check())
                <a class="ml-5 font-semibold text-blue-500" href={{ route('Offers.index') }}>Voir plus ...</a>
            @endif
        </div>


        {{-- <main class="container mx-auto px-4 py-8"> --}}
        <h1 class="font-medium text-center text-2xl ml-4">Découvez nos derniers articles</h1><br>
        <div class=" m-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-48 object-cover" src="{{ asset('imgs/stage.png') }}" alt="Article 1">
                <div class="px-4 py-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Comment trouver le stage de vos rêves ?</h2>
                    <p class="text-gray-700 text-base mb-4">Trouver un stage qui correspond à ses aspirations peut
                        s'avérer difficile. Cet article vous donne des conseils pratiques pour vous aider dans votre
                        recherche.</p>
                    <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded"
                        href="#">Lire l'article</a>
                </div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-48 object-cover" src="{{ asset('imgs/entretien.png') }}" alt="Article 2">
                <div class="px-4 py-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Comment réussir son entretien de stage ?</h2>
                    <p class="text-gray-700 text-base mb-4">Une fois que vous avez décroché un entretien pour un
                        stage,
                        il est important de bien se préparer. Découvrez les astuces pour réussir votre entretien.
                    </p>
                    <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded"
                        href="#">Lire l'article</a>
                </div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img class="w-full h-48 object-cover" src="{{ asset('imgs/resume.png') }}" alt="Article 3">
                <div class="px-4 py-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Comment valoriser son stage sur son CV ?</h2>
                    <p class="text-gray-700 text-base mb-4">Votre stage peut vous permettre de vous démarquer
                        auprès
                        des
                        recruteurs. Apprenez à mettre en valeur votre expérience sur votre CV grâce à nos conseils.
                    </p>
                    <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded"
                        href="#">Lire l'article</a>
                </div>
            </div>
        </div>
        <a class="ml-5 font-semibold text-blue-500" href="/Blog">Voir plus ...</a>
        </div><br><br>
        {{-- </main> --}}
        <br>

    </main>

    <h1 class="font-medium text-2xl ml-4">
        Êtes-vous satisfait des services de Internshop ?
    </h1>

    {{-- mettre if connected --}}
    <a class="ml-4 font-semibold text-blue-500" href="/Feedbacks/create">Laisser votre avis</a>

    <div class="flex overflow-x-scroll h-64  mx-auto my-4 w-full">
        @foreach ($feedbacks as $item)
            <div
                class=" block rounded-lg bg-white p-5 shadow-lg m-3 w-25 transition duration-300 ease-out hover:scale-105  hover:bg-slate-300">
                <h5 class="mb-2 text-xl text-center font-medium leading-tight text-black">

                </h5>

                <div class="flex">
                    <p class="mb-4 text-base text-black font-semibold ">
                        utilisateur:
                    </p>
                    <p class="text-black ml-2">
                        {{-- {{ $item->users_id }} --}}
                        {{ $item->Users->first_name }}
                        {{ $item->Users->last_name }}

                    </p>
                </div>

                <div class="flex ">
                    <p class="mb-4 text-base text-black  font-semibold">
                        opinion:
                    </p>
                    <p class="text-black ml-2">
                        {{ $item->opinion }}
                    </p>
                </div>

            </div>
        @endforeach
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
                    <li class="mb-2"><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>

            {{-- div suivez-nous --}}
            <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-4 md:mb-6">
                <h3 class="text-base font-bold mb-2">Suivez-nous</h3>
                <ul class="list-reset text-xs">
                    <li class="mb-2"><a href="#">Facebook</a></li>
                    <li class="mb-2"><a href="#">Twitter</a></li>
                    <li class="mb-2"><a href="#">Instagram</a></li>
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

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>

</html>
