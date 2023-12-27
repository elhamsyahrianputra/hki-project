@extends('layouts.auth')

@section('content')
<!-- Logo -->
<div class="app-brand justify-content-center">
    <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo/logo-hki-uns.png') }}" style="height: 50px" alt="">
        </span>
    </a>
</div>
<!-- /Logo -->
<h4 class="mb-2">Daftar Sekarang 🚀</h4>
<p class="mb-4">Untuk melindungi hak kekayaan intelektualmu</p>

<form id="formAuthentication" class="mb-3" action="/register" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" value="{{ old('name') }}" placeholder="Enter your name" autofocus autocomplete="off"/>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" autocomplete="off" />
        @error('email')
            <div class="invalid-feedback">
                {{ $message  }}
            </div>
        @enderror
    </div>
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required/>
            <label class="form-check-label" for="terms-conditions">
                Saya Setuju dengan
                <a href="javascript:void(0);">Aturan Kebijakan Privasi</a>
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
</form>

<p class="text-center">
    <span>Sudah pernah Bergabung?</span>
    <a href="/login">
        <span>Login</span>
    </a>
</p>
@endsection