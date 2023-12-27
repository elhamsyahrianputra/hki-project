@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="row mb-4">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-label-primary d-flex align-items-center justify-content-center"
                                    style="height: 3rem; width: 3rem; border-radius: 10px">
                                    <i class="fas fa-users fs-5"></i>
                                </div>
                                <div class="ms-3">
                                    <span class="fs-4">{{ $count_status['total'] }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="text-center fw-semibold fs-5 d-block mb-1 text-dark">Jumlah Pemohon</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-label-success d-flex align-items-center justify-content-center"
                                    style="height: 3rem; width: 3rem; border-radius: 10px">
                                    <i class="fas fa-check-circle fs-5"></i>
                                </div>
                                <div class="ms-3">
                                    <span class="fs-4">{{ $count_status['accepted'] }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="text-center fw-semibold fs-5 d-block mb-1 text-dark">Pengajuan Diterima</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-label-warning d-flex align-items-center justify-content-center"
                                    style="height: 3rem; width: 3rem; border-radius: 10px">
                                    <i class="fas fa-spinner fs-5"></i>
                                </div>
                                <div class="ms-3">
                                    <span class="fs-4">{{ $count_status['process'] }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="text-center fw-semibold fs-5 d-block mb-1 text-dark">Pengajuan Diproses</span>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="bg-label-danger d-flex align-items-center justify-content-center"
                                    style="height: 3rem; width: 3rem; border-radius: 10px">
                                    <i class="fas fa-ban fs-5"></i>
                                </div>
                                <div class="ms-3">
                                    <span class="fs-4">{{ $count_status['rejected'] }}</span>
                                </div>
                            </div>
                        </div>
                        <span class="text-center fw-semibold fs-5 d-block mb-1 text-dark">Pengajuan Ditolak</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="">
                            <img class="" style="width: 150px; height: 150px;" src="{{ asset(auth()->user()->photo_url) }}" alt="Foto Profil">
                        </div>
                        <div class="mt-2">
                            <span class="fw-bold">{{ auth()->user()->headline }}</span>
                        </div>
                        <div class="mt-2">
                            <span class="fs-5">{{ auth()->user()->name }}</span>
                        </div>

                        <hr class="my-4 w-100">

                        <div class="d-flex ">
                            <span>{!! auth()->user()->about_me == null ? '<i>Anda belum menuliskan apapun tentang diri anda</i>' : auth()->user()->about_me !!}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Statistik Pengajuan</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">{{ $count_status['total'] }}</h2>
                                <span class="text-center">Jumlah Pengajuan</span>
                            </div>
                            <div id="chart" style="min-height: 137.55px;">
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 398px; height: 139px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i
                                            class="fas fa-check-circle"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Diterima</h6>
                                        <small class="text-muted">Jumlah Pengajuan Diterima</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $count_status['accepted'] }} Pengajuan</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-warning"><i class="fas fa-spinner"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Ditolak</h6>
                                        <small class="text-muted">Jumlah Pengajuan Diproses</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $count_status['process'] }} Pengajuan</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-danger"><i class="fas fa-ban"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Ditolak</h6>
                                        <small class="text-muted">Jumlah Pengajuan Ditolak</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $count_status['rejected'] }} Pengajuan</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="row">
            <div class="col">
                <div class="card" style="height: 660px; overflow-y: scroll">
                    <h5 class="card-header">Seputar Pengajuan Merk</h5>
                    <div class="card-body d-flex flex-column p-3">
                        @foreach ($brand_statuses as $status)
                        <div class="d-flex py-3" style="flex-basis: 100%">
                            <div class="d-flex jusitfy-content-center align-items-center" style="width: 110px;">
                                <img src="{{ asset($status->brand->logo_url) }}" style="height: 40px;" alt="">
                            </div>
                            <div class="" style="width: 125px;">
                                <span class="d-block mb-1">{{ $status->brand->name }}</span>
                                @switch( $status->status )
                                    @case('applied')
                                        <span class="d-inline-block badge bg-label-secondary me-1">diajukan</span>
                                        @break
                                    @case('accepted')
                                        <span class="d-inline-block badge bg-label-success me-1">diterima</span>
                                        @break
                                    @case('rejected')
                                        <span class="d-inline-block badge bg-label-danger me-1">ditolak</span>
                                        @break
                                    @case('revision')
                                        <span class="d-inline-block badge bg-label-warning me-1">revisi</span>
                                        @break
                                    @case('revised')
                                        <span class="d-inline-block badge bg-label-warning me-1">revisi</span>
                                        @break
                                @endswitch
                            </div>
                            <div class="text-end">
                                <span class="fw-bold">{{ \Carbon\Carbon::parse($status->created_at)->format('d-m-Y') }}</span>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/applicationChart.js') }}"></script>

<script>
applicationChart({{ $count_status['accepted'] }}, {{ $count_status['process'] }}, {{ $count_status['rejected'] }});
</script>
@endsection