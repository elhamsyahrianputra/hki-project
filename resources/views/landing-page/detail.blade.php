@extends('layouts.landing-page')

@section('content')
<div class="bg-white shadow-md py-5 flex justify-center mb-8">
    <form class="w-1/2 block" action="{{ route('search') }}">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" name="search" value="{{ request('search') }}" placeholder="Cari Merk atau Nama Pemilik Merk ...." class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
            <button type="submit" class="text-white absolute end-0 bottom-[1px] bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-secondary font-medium rounded-lg text-sm px-7  py-4 rounded-e-full">Cari</button>
        </div>
    </form>
</div>

<div class="px-28">
    <div class="flex gap-8">
        <div class="w-7/12">
            <div class="max-h-[300px] max-w-[300px]">
                <img src="{{ asset($brand->logo_url) }}" alt="{{ $brand->name }}" class="border p-2">
                <div>
                    <span class="block mt-4 font-bold text-3xl">{{ $brand->name }}</span>
                </div>
            </div>
            <div class="mt-8">
                <span class="font-bold">Detail</span>
                <div class="rounded-2xl flex gap p-6 text-sm" style="background-color: rgb(247, 247, 248)">
                    <div class="w-1/2">
                        <div class="mb-6">
                            <span class="block uppercase">NOMOR PERMOHONAN</span>
                            <span class="block font-bold">{{ $brand->id }}</span>
                        </div>
                        <div>
                            <span class="block uppercase">Tanggal Permohonan</span>
                            <span class="block font-bold">{{ \Carbon\Carbon::parse($brand->created_at)->format('d-m-Y') }}</span>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="mb-6">
                            <span class="block uppercase">Nama Pemilik</span>
                            <span class="block font-bold capitalize">{{ $brand->owner }}</span>
                        </div>
                        <div>
                            <span class="block uppercase">Status</span>
                            @switch( $brand->lastStatus()->status )
                                @case('applied')
                                    <span class="inline-block my-[1px] bg-[#ebeef0] text-[#8592a3] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">diajukan</span>
                                    @break
                                @case('accepted')
                                    <span class="inline-block my-[1px] bg-[#e8fadf] text-[#71dd37] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">diterima</span>
                                    @break
                                @case('rejected')
                                    <span class="inline-block my-[1px] bg-[#ffe0db] text-[#ff3e1d] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">ditolak</span>
                                    @break
                                @case('revision')
                                    <span class="inline-block my-[1px] bg-[#fff2d6] text-[#ffab00] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">perlu direvisi</span>
                                    @break
                                @case('revised')
                                    <span class="inline-block my-[1px] bg-[#fff2d6] text-[#ffab00] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">pengajuan revisi</span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-5/12">
            <div class="bg-neutral-100 p-4 rounded-2xl">
                <div class="mb-3">
                    <span class="font-bold">Riwayat Status Pengajuan</span>
                </div>
                <div class="overflow-y-auto h-[335px]">
                    @foreach ($brand->statuses as $item)
                        <div class="">
                            <span class="inline-block me-4 font-bold">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</span>
                            @switch( $item->status )
                                @case('applied')
                                    <span class="inline-block my-[1px] bg-[#ebeef0] text-[#8592a3] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">diajukan</span>
                                    @break
                                @case('accepted')
                                    <span class="inline-block my-[1px] bg-[#e8fadf] text-[#71dd37] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">diterima</span>
                                    @break
                                @case('rejected')
                                    <span class="inline-block my-[1px] bg-[#ffe0db] text-[#ff3e1d] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">ditolak</span>
                                    @break
                                @case('revision')
                                    <span class="inline-block my-[1px] bg-[#fff2d6] text-[#ffab00] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">perlu direvisi</span>
                                    @break
                                @case('revised')
                                    <span class="inline-block my-[1px] bg-[#fff2d6] text-[#ffab00] text-xs font-medium text-center rounded align-middle uppercase px-[0.4rem] py-[0.125rem]">pengajuan revisi</span>
                                    @break
                            @endswitch
                            <span class="block">{{ $item->message }}</span>
                        </div>
                        <hr class="my-4 border-2">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection