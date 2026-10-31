@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Profil Petugas</div>
            <div class="card-body">
                <p>Nama: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Akun dibuat: {{ Auth::user()->created_at->diffForHumans() }}
                    ({{ Auth::user()->created_at->format('d-m-Y H:i') }})</p>
            </div>
        </div>
    </div>
</div>
@endsection