@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" rel href="https://cdn.jsdelivr.net/npm/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Manajemen Pengumuman</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashbaord / Manajemen Pengumuman /</span> Tambah Pengumuman</h6>
    </div>
</div>

<div class="card p-4">
    <div class="table-responsive text-nowrap">
        <table id="brandTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($announcements as $announcement)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $announcement->user->name}}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>
                        <a href="{{ route('admin.announcements.edit', ['announcement' => $announcement->id]) }}" class="btn btn-outline-warning"><i class="bx bx-edit"></i></a>
                        <span class="d-inline-block mx-2">|</span>
                        <form class="d-inline-block" action="{{ route('admin.announcements.destroy', ['announcement' => $announcement->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="d-inline-block btn btn-outline-danger"><i class="bx bx-trash"></i></button>
                        </form>
                        <span class="d-inline-block mx-2">|</span>
                        <a href="{{ route('admin.announcements.show', ['announcement' => $announcement->id]) }}" class="btn btn-outline-primary">Detail >></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/datatables.net@1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#brandTable').DataTable({

        });
    });
</script>
@endsection