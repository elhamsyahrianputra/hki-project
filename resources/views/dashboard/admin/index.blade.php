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
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="nav-align-top mb-4">
                        <div class="row mx-0">
                            <div class="col">
                                <h5 class="card-header m-0 me-2">Statistik Pengunjung</h5>
                            </div>
                            <div class="col-7 d-flex align-items-center justify-content-end">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item me">
                                        <button type="button" class="nav-link btn-sm px-3 py-2  active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="false"> 
                                            Harian
                                        </button>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <button type="button" class="nav-link btn-sm px-3 py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">
                                            Bulanan
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link btn-sm px-3 py-2" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="true" >
                                            Tahunan
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content p-0 shadow-none">
                            <div class="tab-pane fade active show" id="navs-pills-top-home" role="tabpanel">
                                <div id="visitorsDayChart" class="px-2" style="min-height: 315px"></div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                <div id="visitorsMonthChart"></div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel" >
                                <div id="visitorsYearChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
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
@endsection

@section('script')
// Application Chart
<script src="{{ asset('assets/js/applicationChart.js') }}"></script>
<script src="{{ asset('assets/js/visitorsDayChart.js') }}"></script>
<script src="{{ asset('assets/js/visitorsMonthChart.js') }}"></script>
<script src="{{ asset('assets/js/visitorsYearChart.js') }}"></script>

<script>

    var visitorsDay = {!! $visitorsDay !!};
    var visitorsMonth = {!! $visitorsMonth !!};
    var visitorsYear = {!! $visitorsYear !!};

    applicationChart({{ $count_status['accepted'] }}, {{ $count_status['process'] }}, {{ $count_status['rejected'] }});
    visitorDayChart(visitorsDay);
    visitorMonthChart(visitorsMonth);
    visitorYearChart(visitorsYear);
</script>
@endsection