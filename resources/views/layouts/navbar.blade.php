{{-- <div class="px-[1.5rem] py-[1rem] flex justify-between items-center bg-gray-200 z-50 shadow-md">
    <div>
        <a class="no-underline " href="{{ route('home.index') }}">
            <h2 class="font-black text-black">Destina.</h2>
        </a>

    </div>
    <div>
        <ul class="flex gap-[1rem] m-0">
            <li class=""><a href="{{ route('home.index') }}">home</a></li>
            <li class="">chat with Destina</li>
            <li class=""><a href="{{ route('properties.index') }}">Book Now</a></li>
            <li class=""> <a href="{{ route('profile.index') }}">my profile</a></li>
        </ul>
    </div>
    <div class="flex gap-[1rem]">
        <div class="btn-group dropstart">
            <button class="btn border border-1 border-opacity-25  border-dark dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">settings</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="text-red-500 dropdown-item">logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <a href="{{ route('profile.index') }}">
            <img class="w-[3vw] h-[3vw] rounded-[50%]" src="{{ asset('storage/' . Auth::user()->image) }}"
                alt="">
        </a>
    </div>
</div> --}}


<nav class="relative px-4 py-3 flex justify-between items-center bg-gray-100">
    <a class="text-3xl font-bold leading-none no-underline" href="{{ route('home.index') }}">
        <h2 class="font-lato_bold text-black m-0">Destina<span class="text-red-500">.</span></h2>

    </a>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-sm text-gray-500 hover:text-gray-900 no-underline" href="{{ route('home.index') }}">Home</a>
        </li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
        </li>
        <li><a class="text-sm text-gray-500 hover:text-gray-900 no-underline"
                href="{{ route('properties.index') }}">Book Now</a>
        </li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
        </li>
        <li><a class="text-sm text-gray-500 hover:text-gray-900 no-underline" href="{{ route('profile.index') }}">My profile</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
        </li>
        <li><a class="text-sm text-gray-500 hover:text-gray-900 no-underline" href="#">Contact</a></li>
        <li class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
            </svg>
        </li>
        <li><a class="text-sm text-gray-500 hover:text-gray-900 no-underline" href="{{ route('profile.edit') }}">Settings</a></li>
    </ul>
    {{-- <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
        href="#">Sign In</a>
    <a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200"
        href="#">Sign up</a> --}}
    <div class="hidden lg:inline-block ">
        <div class="flex items-center justify-center">
            <div class="bg-transparent text-center flex justify-center gap-4">
                <a href="{{ route('profile.index') }}" class="no-underline">
                    <img src="{{ asset('storage/' . Auth::user()->image) }}"
                        class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-indigo-500 dark:bg-indigo-600"
                        width="40" height="40" alt="">
                    {{-- <p class="font-light text-black m-0 ">{{ Auth::user()->name }}</p> --}}
                </a>
                <div class="flex items-center">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="Btn">
                            <div class="sign"><svg viewBox="0 0 512 512">
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                                    </path>
                                </svg></div>
                            <div class="text">logout</div>
                        </button>
                    </form>
                </div>
                {{-- <div class="flex items-center justify-center">
                    <a href="#"
                        class="rounded-full bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 dark:bg-indigo-400 dark:hover:bg-indigo-500">Contact</a>
                    <a href="#"
                        class="ml-4 rounded-full bg-gray-300 px-4 py-2 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600">Portfolio</a>
                </div> --}}
            </div>
        </div>
    </div>

</nav>
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none no-underline" href="{{ route('profile.index') }}">

                <div class="flex justify-start items-center gap-4">
                    <img class="w-[10vw] h-[10vw] rounded-[50%]" src="{{ asset('storage/' . Auth::user()->image) }}"
                        alt="">
                    <p class="font-black text-black text-[1rem] m-0">{{ Auth::user()->name }}</p>
                </div>


            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <a class="no-underline block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                        href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                        href="{{ route('properties.index') }}">Book Now</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                        href="{{ route('profile.index') }}">My profile</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                        href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                <a class="no-underline block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-100 hover:bg-gray-200 rounded-xl"
                    href="{{ route('profile.edit') }}">settings</a>

                {{-- <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl"
                    href="#">Sign Up</a> --}}
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a type="submit"
                        class="no-underline block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-myPrimary   rounded-xl">logout</a>
                </form>
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
                <span>Copyright © 2021</span>
            </p>
        </div>
    </nav>
</div>


<script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');

        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');

        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }

        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
</script>
