@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard Petugas</div>
            <div class="card-body">
                <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>. Anda berhasil login.</p>
                <a href="{{ route('laporan.index') }}" class="btn btn-primary">Lihat Daftar Laporan</a>
            </div>
        </div>
    </div>
</div>
@endsection