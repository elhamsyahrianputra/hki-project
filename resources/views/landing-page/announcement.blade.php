@extends('layouts.landing-page')

@section('content')
<div class="px-28">
    <div class="flex justify-center">
        <div class="bg-gray-200 border shadow-lg rounded-2xl">
            <div class="card-body">
                <div>
                    <img src="{{ asset( $announcement->cover_url ) }}" alt="Cover" style="height:400px; width: 100%; object-fit: cover;">
                </div>
                <div class="p-4">
                    <div class="">
                        <span class="block text-lg font-bold">{{ $announcement->title }}</span>
                        <span>{{ $announcement->user->name }}</span>
                    </div>
                    <div class="mt-5">
                        {!! $announcement->body !!}
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection