<header>
    <nav class="bg-slate-900 border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('assets/img/logo/logo-hki-uns.png') }}" class="h-10 mr-3" alt="HKI UNS " />
            </a>
            <div class="flex md:order-2">
                @auth
                <a href="{{ route('dashboard') }}" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Dashboard</a>
                @endauth

                @guest
                <a href="/login" class="text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Login</a>
                @endguest
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex text-white flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-l md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 pl-3 pr-4 text-white bg-primary rounded md:bg-transparent md:hover:text-primary {{ Request::is('/') ? 'md:text-primary' : 'md:text-white' }} md:p-0"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="/announcements"
                            class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent {{ Request::is('announcements*') ? 'md:text-primary' : 'md:text-white' }} md:p-0">Pengumuman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>