@extends('layouts.app')

@section('title', 'LaporBanjir')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <h1 class="display-5 fw-bold">LaporBanjir</h1>
    <p class="fs-5">Layanan pelaporan banjir untuk warga Kabupaten Bandung. Laporan Anda akan ditindaklanjuti oleh petugas BPBD.</p>
    <a href="{{ route('laporan.create') }}" class="btn btn-primary btn-lg">Laporkan Banjir</a>
    @guest
        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg">Login Petugas</a>
    @endguest
</div>
@endsection