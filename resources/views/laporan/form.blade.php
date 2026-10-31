@extends('layouts.app')

@section('title', 'Form Pelaporan Banjir')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Form Pelaporan Banjir (tanpa login)</div>
            <div class="card-body">
                <form method="POST" action="{{ route('laporan.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_pelapor" class="form-label">Nama Pelapor</label>
                        <input id="nama_pelapor" type="text" name="nama_pelapor"
                               class="form-control @error('nama_pelapor') is-invalid @enderror"
                               value="{{ old('nama_pelapor') }}" required>
                        @error('nama_pelapor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input id="no_hp" type="text" name="no_hp"
                               class="form-control @error('no_hp') is-invalid @enderror"
                               value="{{ old('no_hp') }}" required>
                        @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Banjir</label>
                        <input id="lokasi" type="text" name="lokasi"
                               class="form-control @error('lokasi') is-invalid @enderror"
                               value="{{ old('lokasi') }}" required>
                        @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tinggi_air" class="form-label">Tinggi Air (cm)</label>
                        <input id="tinggi_air" type="number" name="tinggi_air" min="1"
                               class="form-control @error('tinggi_air') is-invalid @enderror"
                               value="{{ old('tinggi_air') }}" required>
                        @error('tinggi_air') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Kejadian</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                                  class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection