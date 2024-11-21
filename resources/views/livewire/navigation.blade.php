<header class="bg-blue-400">
    <div class="container flex justify-between items-center h-20">

        <div class="shrink-0 flex items-center bg-slate-100 rounded-3xl px-2 ">
            <a href="/home">
                <x-application-mark class="block h-4 w-auto" />
            </a>
            <a href="" class="flex flex-col justify-center items-center cursor-pointer font-semibold" >
                Libreria
                <span>Galen</span>
            </a>
        </div>

        @auth
            <div class="bg-gray-800 px-4 py-2 max-w-3xl flex items-center space-x-4 rounded-3xl">
                <a href="#" class="nav-link">Productos</a>
                <span class="text-white font-semibold">|</span>
                <a href="#" class="nav-link">Categorias</a>
                <span class="text-white font-semibold">|</span>
                <a href="#" class="nav-link">Marcas</a>
                <span class="text-white font-semibold">|</span>
                <a href="#" class="nav-link">Ordenes</a>
                <span class="text-white font-semibold">|</span>
                <a href="#" class="nav-link">Usuarios</a>
            </div>
        @endauth

        <div class="ms-3 relative">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <x-dropdown-link href="{{ route('admin.admin.index')}}">
                            Administrador
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>
    </div>
</header>

