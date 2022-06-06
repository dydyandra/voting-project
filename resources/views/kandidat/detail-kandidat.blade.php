@extends('layouts.pages-blank')

@section('localization')
@php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
        @switch($locale)
        @case('en')
        EN
        @break
        @case('id')
        IN
        @break
        @default
        ID
        @endswitch
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="/kandidat/en">EN</a>
        <a class="dropdown-item" href="/kandidat/id">ID</a>
    </div>
</li>
@endsection

@section('container')
<h1 class="h1 mb-3">Detail Kandidat</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <input class="mt-3 form-control form-control-lg" name="nama" type="text" value="{{ $kandidat->nama}}" readonly>
                </div>
                <div>
                    <input class="mt-3 form-control form-control-lg" name="keterangan" type="text" value="{{ $kandidat->keterangan}}" readonly>
                </div>
                <br>
                <div class="mt-4 text-center submit-btn">
                    <a href="{{ route('kandidat.list-kandidat') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection