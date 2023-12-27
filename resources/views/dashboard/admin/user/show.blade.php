@extends('layouts.dashboard')

@section('content')
<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Manajemen User</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashbaord /</span> Manajemen User</h6>
    </div>
</div>

<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        @switch($user->hasRole('admin'))
                            @case(true)
                                <span class="fs-4 fw-bold">Role : <span class="badge bg-primary fs-5">Admin</span></span>                   
                                @break
                            @case(false)
                            <span class="fs-4 fw-bold">Role : <span class="badge bg-success fs-5">Pemohon</span></span>                                        
                                @break
                                
                        @endswitch
                    </div>
                    <div>
                        <button class="btn btn-danger">Hapus User Ini</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card" style="height: 470px;  overflow-y: auto">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="brandTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Merk</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
    dd(gettype($brands))
@endphp
                            {{ $brands == collect(null) ? 'wefwf' : 'aejwfiowfj'  }}
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    @switch( $brand->lastStatus()->status )
                                        @case('applied')
                                            <span class="badge bg-label-secondary me-1">diajukan</span>
                                            @break
                                        @case('accepted')
                                            <span class="badge bg-label-success me-1">diterima</span>
                                            @break
                                        @case('rejected')
                                            <span class="badge bg-label-danger me-1">ditolak</span>
                                            @break
                                        @case('revision')
                                            <span class="badge bg-label-warning me-1">perlu direvisi</span>
                                            @break
                                        @case('revised')
                                            <span class="badge bg-label-warning me-1">pengajuan revisi</span>
                                            @break
                                    @endswitch
                            </td>
                                <td><a href="{{ route('admin.brands.show', ['brand' => $brand->id]) }}" class="btn btn-outline-primary">Detail >></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <h5 class="card-header">Data User</h5>
            <div class="card-body">
                <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Nama -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="name" class="form-label">Nama User <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ $user->name }}"/>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>              
                    
                    <!-- Email -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ $user->email }}" disabled/>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>              
                    
                    <!-- Headline -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="headline" class="form-label">Headline <span class="text-danger">*</span></label>
                            <input class="form-control @error('headline') is-invalid @enderror" type="text" id="headline" name="headline" value="{{ $user->headline }}"/>
                            @error('headline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>              
                    
                    <!-- About Me -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="about_me" class="form-label">Tentang Saya <span class="text-danger">*</span></label>
                            <input class="form-control @error('about_me') is-invalid @enderror" type="text" id="about_me" name="about_me" value="{{ $user->about_me }}"/>
                            @error('about_me')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection