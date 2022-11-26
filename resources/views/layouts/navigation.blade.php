<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div
        class="max-w-full mx-auto px-4 py-1 border-b border-tb-second sm:px-6 lg:px-8 fixed z-50 top-0 left-0 right-0 bg-tb">
        <div class="flex w-11/12 mx-auto justify-between h-16">
            <div class="flex flex-row">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('newArticle') }}">
                        <x-application-logo class="block h-12 w-auto fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="relative hidden group space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('newArticle')" :active="request()->routeIs('newArticle')">
                        {{ __('Nowości') }}
                    </x-nav-link>
                </div>

                <div class="relative hidden group space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="hidden group space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>

                <div class="hidden group space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Calculator') }}
                    </x-nav-link>
                </div>

                <div class="hidden group space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Games') }}
                    </x-nav-link>
                </div>

                <div class="hidden group space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('About Me') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-tb-second hover:text-tb-active focus:outline-none focus:text-tb-active transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="pr-4 text-sm font-medium text-tb-second hover:text-tb-active focus:outline-none focus:text-tb-active transition duration-150 ease-in-out">
                        Zaloguj
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm font-medium text-tb-second hover:text-tb-active focus:outline-none focus:text-tb-active transition duration-150 ease-in-out">
                            Rejestracja
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden z-50 fixed right-0 left-0 top-16 bg-tb">
        <div class="pt-2 pb-1">
            <x-responsive-nav-link :href="route('newArticle')" :active="request()->routeIs('newArticle')">
                {{ __('Nowości') }}
            </x-responsive-nav-link>
        </div>
        <div class="pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home-Small') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-tb-second md:border-none">
            @auth
                <div class="px-4 py-2">
                    <div class="font-medium text-base text-tb-second">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-tb-second/70">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
