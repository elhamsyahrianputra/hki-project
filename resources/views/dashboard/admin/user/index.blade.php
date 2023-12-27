@extends('layouts.dashboard')

@section('content')

<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Manajemen User</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashbaord /  Manajemen User /</span> Daftar User</h6>
    </div>
</div>

<div class="card p-4">
    <div class="table-responsive text-nowrap">
        <table id="brandTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @switch( $user->hasRole('admin') )
                            @case(true)
                                <span class="badge bg-label-primary">Admin</span>
                                @break
                            @case(false)
                                <span class="badge bg-label-success">Pemohon</span>
                                @break
                        @endswitch
                    </td>
                    <td><a href="{{ route('admin.users.show', ['user' => $user->id]) }}" class="btn btn-outline-primary">Detail >></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection