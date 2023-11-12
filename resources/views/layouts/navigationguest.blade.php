<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('login')" >
                {{ __('Log in') }}
            </x-nav-link>

            <x-nav-link :href="route('register')" :active="request()->routeIs('dashboard')">
                {{ __('Register') }}
            </x-nav-link>
                    <!-- <x-nav-link :href="route('materiales.index')" :active="request()->routeIs('materiales.index')">
                        {{ __('Materiales') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                        {{ __('Categorias') }}
                    </x-nav-link>
                    <x-nav-link :href="route('empresas.index')" :active="request()->routeIs('empresas.index')">
                        {{ __('Empresas') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contratistas.index')" :active="request()->routeIs('contratistas.index')">
                        {{ __('Contratistas') }}
                    </x-nav-link> -->
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
  
</div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('login')" >
                {{ __('Log in') }}
            </x-nav-link>

            <x-nav-link :href="route('register')" :active="request()->routeIs('dashboard')">
                {{ __('Register') }}
            </x-nav-link>

            <!-- <x-nav-link :href="route('materiales.index')" :active="request()->routeIs('materiales.index')">
                {{ __('Materiales') }}
            </x-nav-link>
            <x-nav-link :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                {{ __('Categorias') }}
            </x-nav-link>
            <x-nav-link :href="route('empresas.index')" :active="request()->routeIs('empresas.index')">
                {{ __('Empresas') }}
            </x-nav-link>
            <x-nav-link :href="route('contratistas.index')" :active="request()->routeIs('contratistas.index')">
                {{ __('Contratistas') }}
            </x-nav-link> -->
        </div>

        <!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
    @auth
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    @endauth
</div>


    </div>
</nav>
<!-- Mostrar anuncios como publicidad -->
<div class="bg-white dark:bg-gray-800 dark:border-gray-700 grid grid-cols-2 gap-4">
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <img src="{{ asset('storage/imagenes/01.png') }}" alt="Banner 1"  height="100px">
    </div>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <img src="{{ asset('storage/imagenes/02.png') }}" alt="Banner 2"  height="100px">
    </div>
</div>
