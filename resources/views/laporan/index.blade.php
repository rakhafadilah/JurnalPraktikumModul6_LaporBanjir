@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
<div class="card">
    <div class="card-header">Daftar Laporan Banjir (khusus petugas)</div>
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pelapor</th>
                    <th>No. HP</th>
                    <th>Lokasi</th>
                    <th>Tinggi Air</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporans as $laporan)
                    <tr>
                        <td>{{ $laporans->firstItem() + $loop->index }}</td>
                        <td>{{ $laporan->nama_pelapor }}</td>
                        <td>{{ $laporan->no_hp }}</td>
                        <td>{{ $laporan->lokasi }}</td>
                        <td>{{ $laporan->tinggi_air }} cm</td>
                        <td>{{ \Illuminate\Support\Str::limit($laporan->deskripsi, 60) }}</td>
                        <td>
                            <form method="POST" action="{{ route('laporan.status', $laporan) }}" class="d-flex gap-1">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm">
                                    @foreach(['baru', 'diproses', 'selesai'] as $s)
                                        <option value="{{ $s }}" {{ $laporan->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-sm btn-outline-primary">Simpan</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('laporan.destroy', $laporan) }}"
                                  onsubmit="return confirm('Hapus laporan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center text-muted">Belum ada laporan.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $laporans->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection