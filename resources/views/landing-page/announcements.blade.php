@extends('layouts.landing-page')

@section('content')
<div class="px-28 mt-8">
    <div class="grid grid-cols-3 gap-8">
        @foreach ($announcements as $announcement)
        <div class="border shadow-lg p-4 rounded-2xl bg-neutral-100">
            <div class="card-body">
                <div>
                    <img src="{{ asset( $announcement->cover_url ) }}" alt="Cover" style="height:220px; width: 100%; object-fit: cover;">
                </div>
                <div class="mt-3">
                    <span class="block text-xl font-bold">{{ $announcement->title }}</span>
                    <span>{{ $announcement->user->name }}</span>
                </div>
                <div class="grid mt-5">
                    <a href="announcements/{{ $announcement->slug }}" class="text-center bg-primary py-3 font-bold rounded-lg text-white">Baca Pengumuman >></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection