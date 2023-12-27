@extends('layouts.landing-page')

@section('content')
<section id="search-bar">

    <div class="h-[70vh] flex flex-col items-center justify-center">
        <div class="flex flex-col items-center">
            <img class="w-[250px]" src="{{ asset('assets/img/logo/logo-hki-uns.png') }}" alt="">
            <span class="text-3xl font-bold mb-20">Kekayaan Intelektual UNS</span>
        </div>
            <form class="w-1/2 block" action="{{ route('search') }}">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary" placeholder="Cari Nama Merk atau Nama Pemilik Merk ....">
                    <button type="submit" class="text-white absolute end-0 bottom-[1px] bg-secondary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-7  py-4 rounded-e-full">Cari</button>
                </div>
            </form>
    </div>
    
</section>
@endsection