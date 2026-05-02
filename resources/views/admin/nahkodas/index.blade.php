@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Nahkoda</h1>
        <a href="{{ route('admin.nahkodas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Tambah Nahkoda
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Nahkoda</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pengalaman (Tahun)</th>
                            <th>Sertifikasi</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nahkodas as $index => $nahkoda)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $nahkoda->nama }}</td>
                            <td>{{ $nahkoda->pengalaman }}</td>
                            <td>{{ $nahkoda->sertifikasi ?? '-' }}</td>
                            <td>{{ $nahkoda->rating }} <i class="fas fa-star text-warning"></i></td>
                            <td>
                                <a href="{{ route('admin.nahkodas.edit', $nahkoda->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.nahkodas.destroy', $nahkoda->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data nahkoda ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data nahkoda.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
