<nav class="" x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div
        class="fixed top-0 left-0 right-0 z-50 mx-auto max-w-full border-b border-tb-second bg-tb px-4 py-1 sm:px-6 lg:px-8">
        <div class="mx-auto flex h-16 w-11/12 justify-between">
            <div class="flex flex-row">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('article.index') }}">
                        <x-application-logo class="block h-12 w-auto fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="group relative hidden space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('article.index')" :active="request()->routeIs('article.index')">
                        {{ __('Nowości') }}
                    </x-nav-link>
                </div>

                <div class="group relative hidden space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('calculator')" :active="request()->routeIs('calculator')">
                        {{ __('Kalkulator') }}
                    </x-nav-link>
                </div>

                <div class="group relative hidden space-x-4 sm:-my-px sm:ml-4 md:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ml-6 sm:items-center md:flex">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-tb-second transition duration-150 ease-in-out hover:text-tb-active focus:text-tb-active focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
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
                    <a class="pr-4 text-sm font-medium text-tb-second transition duration-150 ease-in-out hover:text-tb-active focus:text-tb-active focus:outline-none"
                        href="{{ route('login') }}">
                        Zaloguj
                    </a>

                    @if (Route::has('register'))
                        <a class="text-sm font-medium text-tb-second transition duration-150 ease-in-out hover:text-tb-active focus:text-tb-active focus:outline-none"
                            href="{{ route('register') }}">
                            Rejestracja
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                    @click="open = ! open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" :class="{ 'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden" :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="fixed right-0 left-0 top-16 z-50 hidden bg-tb md:hidden" :class="{ 'block': open, 'hidden': !open }">
        <div>
            <x-responsive-nav-link :href="route('article.index')" :active="request()->routeIs('article.index')">
                {{ __('Nowości') }}
            </x-responsive-nav-link>
        </div>
        <div>
            <x-responsive-nav-link :href="route('calculator')" :active="request()->routeIs('calculator')">
                {{ __('Kalkulator') }}
            </x-responsive-nav-link>
        </div>
        <div>
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home-Small') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-b border-tb-second md:border-none">
            @auth
                <div class="px-4 py-2">
                    <div class="text-base font-medium text-tb-second">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-tb-second/70">{{ Auth::user()->email }}</div>
                </div>

                <div>
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
                <div>
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
