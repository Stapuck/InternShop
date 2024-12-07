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
    <header class="header">
        <nav class="navbar">

            <div class="flex items-stretch">
                <div class="flex items-stretch">
                    <img class="object-cover h-14 w-14" src="{{ asset('imgs/logo.png') }}" alt="logo">
                    <h2 class=" self-center ml-2 text-black font-bold text-2xl ">Internshop</h2>
                </div>

                {{-- search bar --}}
                <div class='self-center ml-4 rounded-lg max-w-md mx-auto'>
                    <div class="relative text-gray-650">
                        <input type="search" name="serch" placeholder="Que cherchez vous..."
                            class="bg-gray-200 h-8 px-5 pr-10 rounded-full text-sm focus:outline-none">
                        <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                            <svg class="h-3 w-3 fill-current" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                y="0px" viewBox="0 0 56.966 56.966"
                                style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                                height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            </div>

            {{-- revoir pb de superposition --}}

            <ul class="nav-menu">
                {{-- @if (Auth::check()) --}}
                <li class="nav-item">
                    <a href="/" class="item">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="/Apropos" class="item">A propos</a>
                </li>
                <li class="nav-item">
                    <a href="/Blog" class="item">Blog</a>
                </li>
                <li class="nav-item">
                    {{-- Bouton pour se connecter --}}

                    <form action="#" method="GET">
                        <button type="submit"
                            class="p-2 m-3 mr-2 text-xs font-bold text-white transition duration-300 bg-[#4A7B59] rounded-full shadow-sm hover:bg-[#649673] hover:shadow-md">
                            Connexion </button>
                    </form>

                    {{-- <a href="login.html" class="item">Se connecter</a> --}}
                </li>
                {{-- <li><a href="#"S
                            class="text-lg text-white bg-Accent ml-4 hover:text-gray-50 hover:drop-shadow transform hover:scale-105 duration-300 ease-in-out  rounded-lg overflow-hidden">Bonjour
                            {{ Auth::user()->first_name }}</a></li> --}}

            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header><br>



    {{-- <main class="container mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">FAQ</h1>
        <dl class="space-y-4">
            <div class="border-b-2 border-gray-200 pb-4">
                <dt class="text-xl font-medium text-gray-900">Comment postuler à un stage sur Internshop ?</dt>
                <dd class="text-gray-700 text-base mt-2">
                    Pour postuler à un stage sur Internshop, vous devez d'abord créer un compte sur notre site. Une fois
                    inscrit, vous pouvez parcourir les offres de stages et postuler en cliquant sur le bouton
                    "Postuler".
                </dd>
            </div>
            <div class="border-b-2 border-gray-200 pb-4">
                <dt class="text-xl font-medium text-gray-900">Comment savoir si ma candidature a été retenue ?</dt>
                <dd class="text-gray-700 text-base mt-2">
                    Si votre candidature est retenue, vous serez contacté(e) par l'entreprise qui propose le stage. Si
                    vous n'avez pas de nouvelles de l'entreprise dans les deux semaines suivant votre candidature, cela
                    signifie que votre candidature n'a pas été retenue.
                </dd>
            </div>
            <div class="border-b-2 border-gray-200 pb-4">
                <dt class="text-xl font-medium text-gray-900">Puis-je postuler à plusieurs stages en même temps sur
                    Internshop ?</dt>
                <dd class="text-gray-700 text-base mt-2">
                    Oui, vous pouvez postuler à plusieurs stages en même temps sur Internshop. Cependant, il est
                    recommandé de ne postuler qu'à des offres de stages qui correspondent à vos aspirations et
                    compétences.
                </dd>
            </div>
            <div class="border-b-2 border-gray-200 pb-4">
                <dt class="text-xl font-medium text-gray-900">Comment contacter Internshop en cas de problème ?</dt>
                <dd class="text-gray-700 text-base mt-2">
                    Si vous rencontrez un problème sur notre site, vous pouvez nous contacter via notre formulaire de
                    contact ou par e-mail à l'adresse suivante : contact@internshop.com. Nous ferons de notre mieux pour
                    vous aider dans les meilleurs délais.
                </dd>
            </div>
        </dl>
    </main> --}}


    {{-- <main class="bg-white shadow-md w-96 min-h-64 p-10 h-screen align-middle"> --}}
    <div class=" container mx-auto px-4 py-6 font-medium">

        <div class="text-center">
            <p class=" pr-14 font-bold text-4xl">
                Besoin de précision ?
            </p>
            <p class="font-bold text-[#4A7B59] pr-14">Posez nous les bonnes questions</p>
        </div>

    </div><br>


    <div class="bg-white shadow-md w-96 p-10 ml-96 ">
        <div class=" items-center flex flex-col justify-center ">
            <div class="mb-10 ">
                <h1 class="text-2xl font-bold">FAQ</h1>
            </div>

            <div class="" x-data="{ open: [false, false, false, false, false] }">
                <!-- question 1 : -->
                <div class="cursor-pointer p-2 border-b border-blue-400 hover:border-blue-800 flex  justify-between items-center rounded-sm "
                    @click="open[0] = !open[0]">
                    <h3 class="text-sm ">Comment postuler à un stage sur Internshop ? </h3>
                    <svg src="imgs/next.png" class="h-10 w-10 m-2 pl-1 transform transition duration-100"
                        :class="(open[0]) ? 'rotate-90' : ''">
                        <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
                    </svg>
                </div>
                <div x-show="open[0]" x-transition:enter="transition ease-in duration-100"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-out duration-100"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <p class="text-xs p-2">
                        Pour postuler à un stage sur Internshop, vous devez d'abord créer un compte sur notre site.
                        Une
                        fois
                        inscrit, vous pouvez parcourir les offres de stages et postuler en cliquant sur le bouton
                        "Postuler". </p>
                </div>

                <!-- question 2 :  -->
                <div class="cursor-pointer p-2 border-b border-blue-400 hover:border-blue-800 flex  justify-between items-center rounded-sm"
                    @click="open[1] = !open[1]">
                    <h3 class="text-sm">Puis-je postuler à plusieurs stages sur
                        Internshop ? </h3>

                    <svg src="imgs/next.png" class="h-10 w-10 m-2 transform transition duration-100"
                        :class="(open[1]) ? 'rotate-90' : ''">
                        <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
                    </svg>
                </div>
                <div x-show="open[1]" x-transition:enter="transition ease-in duration-100"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-out duration-100"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <p class="text-xs p-2">
                        Oui, vous pouvez postuler à plusieurs stages en même temps sur Internshop. Cependant, il est
                        recommandé de ne postuler qu'à des offres de stages qui correspondent à vos aspirations et
                        compétences.
                    </p>
                </div>

                <!-- question 3 :  -->
                <div class="cursor-pointer p-2 border-b border-blue-400 hover:border-blue-800 flex  justify-between items-center rounded-sm"
                    @click="open[2] = !open[2]">
                    <h3 class="text-sm">Comment savoir si ma candidature a été retenue ?</h3>

                    <svg src="imgs/next.png" class="h-10 w-10 m-2 transform transition duration-100"
                        :class="(open[2]) ? 'rotate-90' : ''">
                        <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
                    </svg>
                </div>
                <div x-show="open[2]" x-transition:enter="transition ease-in duration-100"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-out duration-100"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <p class="text-xs p-2 ">
                        Si votre candidature est retenue, vous serez contacté(e) par l'entreprise qui propose le
                        stage.
                        Si
                        vous n'avez pas de nouvelles de l'entreprise dans les deux semaines suivant votre
                        candidature,
                        cela
                        signifie que votre candidature n'a pas été retenue. </p>
                </div>
                <!-- question 4 :  -->
                <div class="cursor-pointer p-2 border-b border-blue-400 hover:border-blue-800 flex  justify-between items-center rounded-sm"
                    @click="open[3] = !open[3]">
                    <h3 class="text-sm">Comment contacter Internshop en cas de problème ?</h3>

                    <svg src="imgs/next.png" class="h-10 w-10 m-2 transform transition duration-100"
                        :class="(open[3]) ? 'rotate-90' : ''">
                        <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
                    </svg>
                </div>
                <div x-show="open[3]" x-transition:enter="transition ease-in duration-100"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-out duration-100"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-4">
                    <p class="text-xs p-2 ">
                        Si vous rencontrez un problème sur notre site, vous pouvez nous contacter via notre
                        formulaire
                        de
                        contact ou par e-mail à l'adresse suivante : contact@internshop.com. Nous ferons de notre
                        mieux
                        pour
                        vous aider dans les meilleurs délais. </p>
                </div>

                <p class="my-5 text-justify">Si vous ne pas trouver la réponse à votre question dans cette page,
                    vous
                    pouvez contacter le service client pour une aide plus approfondie.</p>

            </div>

        </div>

    </div><br>


    {{-- </main> --}}



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
                    <li class="mb-2"><a href="#">Twitter</a></li>
                    <li class="mb-2"><a href="#">Instagram</a></li>
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