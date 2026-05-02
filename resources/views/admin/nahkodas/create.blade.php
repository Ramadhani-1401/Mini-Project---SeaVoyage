@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Nahkoda</h1>
        <a href="{{ route('admin.nahkodas.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-2"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.nahkodas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Nahkoda <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pengalaman" class="form-label">Pengalaman (Tahun) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('pengalaman') is-invalid @enderror" id="pengalaman" name="pengalaman" value="{{ old('pengalaman') }}" required min="0">
                    @error('pengalaman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sertifikasi" class="form-label">Sertifikasi</label>
                    <input type="text" class="form-control @error('sertifikasi') is-invalid @enderror" id="sertifikasi" name="sertifikasi" value="{{ old('sertifikasi') }}">
                    @error('sertifikasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (0-5)</label>
                    <input type="number" step="0.1" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', 0) }}" min="0" max="5">
                    @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
