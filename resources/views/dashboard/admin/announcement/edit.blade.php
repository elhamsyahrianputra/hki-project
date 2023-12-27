@extends('layouts.dashboard')

@section('content')
<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Manajemen Pengumuman</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashbaord / Manajemen Pengumuman /</span> Ubah Data Pengumuman</h6>
    </div>
</div>


<form class="row" action="{{ route('admin.announcements.update', ['announcement' => $announcement->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-7">
        <div class="card">
            <h5 class="card-header">Ubah Data Pengumuman</h5>
            <div class="card-body">

                <!-- Title -->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="title" class="form-label">Judul Pengumuman <span class="text-danger">*</span></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title', $announcement->title) }}" autocomplete="off"/>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>        
                
                <!-- Cover -->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="cover" class="form-label">Cover (.jpg / .png) <span class="text-danger">*</span></label>
                        <input id="coverInput" class="form-control @error('cover_url') is-invalid @enderror" type="file" name="cover_url" accept=".jpg, .png" onchange="imagePreview('coverInput', 'coverImagePreview')" />
                        @error('cover_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <!-- Body -->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="body" class="form-label">Isi Pengumuman <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="body" id="body" rows="5" autocomplete="off">{{ old('body', $announcement->body) }}</textarea>
                        @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>              

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <!-- About Me -->
                <div class="row">
                    <div class="mb-3 col">
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary">Ubah Pengumuman</button>
                        </div>
                        <div class="border p-2 d-flex flex-column justify-content-center align-items-center">
                            <span class="d-block mb-2">Preview Cover</span>
                            <img class="d-block" id="coverImagePreview" src="{{ asset( $announcement->cover_url ) }}" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('script')
<script src="{{ asset('assets/js/image-preview.js') }}"></script>
@endsection