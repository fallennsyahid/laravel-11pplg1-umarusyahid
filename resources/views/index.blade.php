<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Umaru Syahid M</title>
    {{-- <link rel="stylesheet" href="css/styles.css"> --}}
    <!-- Flowbite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Localstorage Dark Mode -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </script>
    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<style>
    .group img {
        transition: all 0.3s ease-in-out;
    }

    .group:hover img {
        filter: brightness(50%);
    }

    .group .absolute {
        transition: opacity 0.3s ease-in-out;
    }

    .group:hover .absolute {
        opacity: 1;
    }
</style>

<body>

    <!-- Header Start -->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4 py-6">
                    <a href="#home"
                        class="font-bold text-lg bg-gradient-to-r from-primary to-third bg-clip-text text-transparent">{{ Auth::user()->name }}</a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block
                    lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-dark lg:dark:bg-transparent dark:shadow-slate-500">
                        <ul class="block lg:flex" id="#nav-active">
                            <li class="group">
                                <a href="#home"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#about"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">About
                                    Me</a>
                            </li>
                            <li class="group">
                                <a href="#portfolio"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Portfolio</a>
                            </li>
                            <li class="group">
                                <a href="#skills"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Skill</a>
                            </li>
                            <li class="group">
                                <a href="#certificate"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Certificate</a>
                            </li>
                            <li class="group">
                                <a href="#contact"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">Contact</a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <li class="group">
                                            <a :href="route('logout')"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                                class="text-base text-dark py-2 mx-8 flex cursor-pointer group-hover:text-primary dark:text-white">Log
                                                Out</a>
                                        </li>
                                    </form>
                                @else
                                    <li class="group">
                                        <a href="{{ route('login') }}"
                                            class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">
                                            Log in
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="group">
                                            <a href="{{ route('register') }}"
                                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary dark:text-white">
                                                Register
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                            <li class="flex items-center pl-8 mt-3 lg:mt-0">
                                <div class="flex">
                                    <span class="mr-2 text-sm text-slate-500">Light</span>
                                    <input type="checkbox" class="hidden" id="dark-toggle" />
                                    <label for="dark-toggle">
                                        <div
                                            class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div
                                                class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
                                            </div>
                                        </div>
                                    </label>
                                    <span class="ml-2 text-sm text-slate-500">Dark</span>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Start -->
    <section id="home" class="pt-36 dark:bg-dark">
        <div class="container">
            @foreach ($homeCollection as $home)
                <div class="flex flex-wrap">
                    <div class="w-full self-center px-4 lg:w-1/2">
                        <h1 class="text-base font-semibold text-primary md:text-xl">Halo Semua 👋, My Name
                            <span
                                class="block font-bold text-dark text-4xl mt-1 lg:text-5xl dark:text-white">{{ $home->title }}
                            </span>
                        </h1>
                        <h2
                            class="font-medium text-secondary text-lg mb-5 mt-4 lg:text-2xl bg-gradient-to-r from-primary to-third bg-clip-text text-transparent">
                            {{ $home->subtitle }}</h2>
                        <p class="font-medium text-secondary mb-10 leading-relaxed">{{ $home->description }}, <span
                                class="text-dark font-bold dark:text-white">ganbatte!</span></p>

                        <a href="https://www.instagram.com/umarusyahidm_/" target="_blank"
                            class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Contact
                            Me</a>
                    </div>
                    <div class="w-full self-end px-4 lg:w-1/2 md:scale-110 overflow-hidden">
                        <div class="mt-10 relative lg:mt-9 lg:right-0">
                            <img src="{{ asset('storage/' . $home->photos) }}" alt="{{ $home->title }}"
                                class="relative z-10 max-w-full mx-auto" />
                            <span class="absolute bottom-0 left-1/2 -translate-x-1/2">
                                <svg width="400" height="400" viewBox="0 0 200 200"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#14B8A6" d="M35,-40.7C49.9,-37.5,69.4,-33.2,71.4,-23.9C73.4,-14.7,57.8,
                                    -0.5,51.3,15.9C44.9,32.2,47.6,50.7,40.6,65C33.5,79.4,16.8,89.5,2.9,85.5C-10.9,81.4,
                                    -21.8,63.2,-34.7,50.8C-47.6,38.4,-62.4,31.8,-70,20C-77.6,8.3,-77.9,-8.6,-73.9,-25C-70,
                                    -41.5,-61.7,-57.5,-48.7,-61.4C-35.6,-65.2,-17.8,-56.8,-3.9,-51.5C10.1,-46.2,20.2,-44,35,
                                    -40.7Z" transform="translate(100 100) scale(1.2)" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Hero Sectio End -->

    <!-- About Section Start -->
    <section id="about" class="pt-36 pb-32 dark:bg-dark">
        <div class="container">
            <h4 class="font-bold uppercase text-primary text-lg mb-10 text-center">About Me</h4>
            <div class="flex flex-wrap">
                @foreach ($aboutCollection as $about)
                    <div class="w-full px-4 mb-10 lg:w-1/2">
                        <h2 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl dark:text-white">
                            {{ $about->title }}</h2>
                        <p class="font-medium text-base text-secondary max-w-xl">{{ $about->description }}</p>
                    </div>
                @endforeach
                <div class="w-full mx-auto flex justify-center">
                    <div class="flex items-center">

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/umarusyahidm_/" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                            <svg role="img" width="20" height="20" viewBox="0 0 24 24"
                                class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                            </svg>
                        </a>

                        <!-- Threads -->
                        <a href="https://www.threads.net/@umarusyahidm_" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                            <svg role="img" width="20" height="20" viewBox="0 0 24 24"
                                class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <title>Threads</title>
                                <path
                                    d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z" />
                            </svg>
                        </a>

                        <!-- Tiktok -->
                        <a href="https://www.tiktok.com/@fallennxwhoo" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                            <svg role="img" width="20" height="20" viewBox="0 0 24 24"
                                class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <title>TikTok</title>
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                            </svg>
                        </a>

                        <!-- X -->
                        <a href="https://x.com/UmaruSyahid" target="_blank"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                            <svg role="img" width="20" height="20" viewBox="0 0 24 24"
                                class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                <title>X</title>
                                <path
                                    d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z" />
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Portfolio Section Start -->
    <section id="portfolio" class="pt-36 pb-16 bg-slate-100 dark:bg-slate-800">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-xl text-primary mb-2">Portfolio</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">The Project
                        That I've Created</h2>
                    <p class="font-medium text-secondary md:text-lg">The Project I Made For Increase My Skills And My
                        Experience</p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center">
                @foreach ($portofolios as $portofolio)
                    <div class="mb-12 p-4 md:w-1/2">
                        <div class="rounded-md shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $portofolio->picture) }}" alt="{{ $portofolio->title }}"
                                width="w-full" />
                        </div>
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 dark:text-white">{{ $portofolio->title }}
                        </h3>
                        <a href="">See More</a>
                        <p class="font-medium text-base text-secondary">
                            {{ $portofolio->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio Section End -->

    <!-- Skills Section Start -->
    <section id="skills" class="pt-36 pb-32 bg-slate-800 dark:bg-slate-700">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-xl text-primary mb-2">Skill</h4>
                    <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-dark">My Skill</h2>
                    <p class="font-medium text-secondary md:text-lg">These are some of the languages ​​that I have
                        These are some of the languages ​​that I have studied, I use this language to create <span
                            class="font-bold text-slate-200 hover:underline">Front-End, Back-End, and Design</span></p>
                </div>
            </div>

            <div class="w-full px-4">
                <div class="flex flex-wrap items-center justify-center">
                    <!-- ALL SKILL -->
                    @foreach ($skills as $skill)
                        <span class="max-w-[120px] mx-4 py-4 lg:mx-6 xl:mx-8 dark:opacity-100 ">
                            <img src="{{ asset('storage/' . $skill->photo) }}" alt="{{ $skill->title }}"
                                height="100" width="100" class="scroll-reveal" />
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            ScrollReveal().reveal('.scroll-reveal', {
                origin: 'top',
                delay: 200,
                duration: 2000,
                distance: '80px',
            });
        </script>
    </section>
    <!-- Skills Section End -->

    <!-- Certificate Section Start -->
    <section id="certificate" class="pt-36 pb-32 bg-slate-100 dark:bg-dark">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-xl text-primary mb-2">Certificate</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">My
                        Certificate</h2>
                    <p class="font-medium text-secondary md:text-lg">This is a several certificate that i've get to
                        increase my knowleadges</p>
                </div>
            </div>

            {{-- Certificates Section Start --}}
            <div class="flex flex-wrap">
                @foreach ($certificates as $certificate)
                    <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10 dark:bg-slate-800">
                            <a href="{{ asset('storage/' . $certificate->picture) }}" target="_blank">
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $certificate->picture) }}"
                                        alt="{{ $certificate->title }}"
                                        class="w-full transition-all duration-300 ease-in-out group-hover:brightness-50" />
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-white font-bold text-lg">Selengkapnya</p>
                                    </div>
                                </div>
                            </a>
                            <div class="py-8 px-6">
                                <h3>
                                    <span class="block mb-3 font-semibold text-xl text-dark dark:text-white truncate">
                                        {{ $certificate->title }}
                                    </span>
                                </h3>
                                <p class="font-medium text-secondary text-base mb-4 truncate">
                                    {{ $certificate->description }}</p>
                                <div class="flex justify-between">
                                    <p class="font-medium text-secondary text-base my-5"><span>&#128340;</span>
                                        {{ $certificate->date }}</p>
                                    <p class="font-medium text-secondary text-base my-5"><i
                                            class="fa-solid fa-globe"></i>
                                        {{ $certificate->issued_by }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Certificate Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="pt-36 pb-32 dark:bg-slate-800">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-xl text-primary mb-2">Contact</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4 sm:text-4xl lg:text-5xl dark:text-white">Contact Me
                    </h2>
                    <p class="font-medium text-secondary md:text-lg">Just contact me if you want to learn & grow up
                        together 👌
                    </p>
                </div>
            </div>

            {{-- <form action="https://formspree.io/f/xdknqdzp" method="POST" enctype="multipart/form-data"> --}}
            <form action="{{ route('index.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full lg:w-2/3 lg:mx-auto">
                    <div class="w-full mb-8 px-4">
                        <label for="name" class="text-base text-primary font-bold">Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            placeholder="name.." required />
                    </div>
                    <div class="w-full mb-8 px-4">
                        <label for="email" class="text-base text-primary font-bold">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"
                            placeholder="email.." />
                    </div>
                    <div class="w-full mb-8 px-4">
                        <label for="message" class="text-base text-primary font-bold">Message</label>
                        <textarea type="text" id="message" name="message"
                            class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary h-32"
                            placeholder="message.."></textarea>
                    </div>
                    <div class="w-full px-4">
                        <button type="submit"
                            class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Start -->
    <section id="footer" class="bg-dark pt-24 pb-12">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-12 text-slate-300 font-medium md:w-1/4">
                    <h2 class="font-bold text-4xl text-white mb-5">Umaru Syahid Mas'udi</h2>
                    <h3 class="font-bold text-2xl mb-2">Contact Me</h3>
                    <p>umarusyahidmasudi1@gmail.com</p>
                    <p>Jl. Kavling Panorama 1 No. 1</p>
                    <p>Kota Bogor</p>
                </div>
                <div class="w-full px-4 mb-12 pl-24 md:w-1/4">
                    <h3 class="font-semibold text-xl text-white mb-5"><a href="#skills"
                            class="hover:underline">Skill</a></h3>
                    <ul class="text-slate-300">
                        @foreach ($skills as $row)
                            <li>
                                <a href="#skills"
                                    class="inline-block text-base hover:text-primary mb-5">{{ $row->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/4">
                    <h3 class="font-semibold text-xl text-white mb-5"><a href="#certificate"
                            class="hover:underline">Certificate</a></h3>
                    <ul class="text-slate-300">
                        @foreach ($certificates as $row)
                            <li>
                                <a href="#certificate"
                                    class="inline-block text-base hover:text-primary mb-5">{{ $row->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-full px-4 mb-12 md:w-1/4">
                    <h3 class="font-semibold text-xl text-white mb-5">Link</h3>
                    <ul class="text-slate-300">
                        <li>
                            <a href="#home" class="inline-block text-base hover:text-primary mb-5">Home</a>
                        </li>
                        <li>
                            <a href="#about" class="inline-block text-base hover:text-primary mb-5">About</a>
                        </li>
                        <li>
                            <a href="#portfolio" class="inline-block text-base hover:text-primary mb-5">Portfolio</a>
                        </li>
                        <li>
                            <a href="#skills" class="inline-block text-base hover:text-primary mb-5">Skill</a>
                        </li>
                        <li>
                            <a href="#certificate"
                                class="inline-block text-base hover:text-primary mb-5">Certificate</a>
                        </li>
                        <li>
                            <a href="#contact" class="inline-block text-base hover:text-primary mb-5">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full pt-10 border-t border-slate-700">
                <div class="flex items-center justify-center mb-5">

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/umarusyahidm_/" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                        <svg role="img" width="20" height="20" viewBox="0 0 24 24" class="fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                        </svg>
                    </a>

                    <!-- Threads -->
                    <a href="https://www.threads.net/@umarusyahidm_" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                        <svg role="img" width="20" height="20" viewBox="0 0 24 24" class="fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Threads</title>
                            <path
                                d="M12.186 24h-.007c-3.581-.024-6.334-1.205-8.184-3.509C2.35 18.44 1.5 15.586 1.472 12.01v-.017c.03-3.579.879-6.43 2.525-8.482C5.845 1.205 8.6.024 12.18 0h.014c2.746.02 5.043.725 6.826 2.098 1.677 1.29 2.858 3.13 3.509 5.467l-2.04.569c-1.104-3.96-3.898-5.984-8.304-6.015-2.91.022-5.11.936-6.54 2.717C4.307 6.504 3.616 8.914 3.589 12c.027 3.086.718 5.496 2.057 7.164 1.43 1.783 3.631 2.698 6.54 2.717 2.623-.02 4.358-.631 5.8-2.045 1.647-1.613 1.618-3.593 1.09-4.798-.31-.71-.873-1.3-1.634-1.75-.192 1.352-.622 2.446-1.284 3.272-.886 1.102-2.14 1.704-3.73 1.79-1.202.065-2.361-.218-3.259-.801-1.063-.689-1.685-1.74-1.752-2.964-.065-1.19.408-2.285 1.33-3.082.88-.76 2.119-1.207 3.583-1.291a13.853 13.853 0 0 1 3.02.142c-.126-.742-.375-1.332-.75-1.757-.513-.586-1.308-.883-2.359-.89h-.029c-.844 0-1.992.232-2.721 1.32L7.734 7.847c.98-1.454 2.568-2.256 4.478-2.256h.044c3.194.02 5.097 1.975 5.287 5.388.108.046.216.094.321.142 1.49.7 2.58 1.761 3.154 3.07.797 1.82.871 4.79-1.548 7.158-1.85 1.81-4.094 2.628-7.277 2.65Zm1.003-11.69c-.242 0-.487.007-.739.021-1.836.103-2.98.946-2.916 2.143.067 1.256 1.452 1.839 2.784 1.767 1.224-.065 2.818-.543 3.086-3.71a10.5 10.5 0 0 0-2.215-.221z" />
                        </svg>
                    </a>

                    <!-- Tiktok -->
                    <a href="https://www.tiktok.com/@fallennxwhoo" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                        <svg role="img" width="20" height="20" viewBox="0 0 24 24" class="fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>TikTok</title>
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>

                    <!-- X -->
                    <a href="https://x.com/UmaruSyahid" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary bg-primary hover:text-white">
                        <svg role="img" width="20" height="20" viewBox="0 0 24 24" class="fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>X</title>
                            <path
                                d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z" />
                        </svg>
                    </a>
                </div>
                <p class="font-medium text-xs text-slate-500 text-center">Made with <span
                        class="text-pink-500">❤️</span> by <a href="https://www.instagram.com/umarusyahidm_/"
                        target="_blank" class="font-bold text-primary">Umaru Syahid Mas'udi</a>, using <a
                        href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">TailwindCSS</a>
                </p>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Back To Top Start -->
    <a href="#home" id="to-top"
        class="fixed z-[9999] hidden justify-center items-center bottom-4 right-4 p-4 h-14 w-14 bg-primary rounded-full hover:animate-pulse">
        <span class="text-2xl"><i class="fa-solid fa-arrow-up"></i></span>
    </a>
    <!-- Back To Top End -->



</body>

<script src="js/script.js"></script>
<script src="js/popup.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Fungsi untuk menampilkan modal
    function showModal(id) {
        document.getElementById(`info-popup-${id}`).classList.remove('hidden');
    }

    // Fungsi untuk menyembunyikan modal
    function hideModal(id) {
        document.getElementById(`info-popup-${id}`).classList.add('hidden');
    }

    // Event listener untuk tombol "More"
    const openModalButtons = document.querySelectorAll('[id^="open-modal"]');
    openModalButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah default action dari link
            const id = this.getAttribute('data-id'); // Mengambil ID dari atribut data-id
            showModal(id);
        });
    });

    // Event listener untuk tombol 'Close' di dalam modal
    const closeModalButtons = document.querySelectorAll('[id^="close-modal"]');
    closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id'); // Mengambil ID dari atribut data-id
            hideModal(id);
        });
    });
</script>

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500,
        });
    @endif
</script>

</html>
