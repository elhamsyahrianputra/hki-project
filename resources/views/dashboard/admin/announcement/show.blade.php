@extends('layouts.dashboard')

@section('content')
<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Manajemen Pengumuman</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashboard / Manajemen Pengumuman /</span> Detail Pengumuman</h6>
    </div>
</div>

<div class="card mb-4 p-4">
    <div>
        <a class="btn btn-dark" href="{{ route('admin.announcements.index') }}">Kembali</a>
        <a class="btn btn-warning" href="{{ route('admin.announcements.edit', ['announcement' => $announcement->id]) }}">Ubah</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div>
                    <img src="{{ asset( $announcement->cover_url ) }}" alt="Cover" style="height:400px; width: 100%; object-fit: cover;">
                </div>
                <div class="mt-3">
                    <span class="d-block fs-4 fw-bold">{{ $announcement->title }}</span>
                    <span>{{ $announcement->user->name }}</span>
                </div>
                <div class="mt-5">
                    {!! $announcement->body !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection