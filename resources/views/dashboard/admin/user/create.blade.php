@extends('layouts.dashboard')

@section('content')
<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Manajemen User</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashbaord / Manajemen User /</span> Tambah User</h6>
    </div>
</div>


<form class="row" action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="col-8">
        <div class="card">
            <h5 class="card-header">Form Tambah User</h5>
            <div class="card-body">

                <!-- Nama -->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="name" class="form-label">Nama User <span class="text-danger">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" autocomplete="off"/>
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
                        <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" autocomplete="off"/>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>              
                
                <!-- Password -->
                <div class="row">
                    <div class="mb-3 col">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{ old('password') }}" autocomplete="off"/>
                        @error('password')
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
                        <span class="fs-5 fw-bold">Role User</span>
                        <div class="d-flex justify-content-evenly mt-2">
                            <input type="radio" class="btn-check" name="role" id="admin" value="admin" autocomplete="off" required>
                            <label class="btn btn-outline-primary" for="admin">Admin</label>
                            
                            <input type="radio" class="btn-check" name="role" id="applicant" value="applicant" autocomplete="off" required>
                            <label class="btn btn-outline-success" for="applicant">Pemohon</label>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection