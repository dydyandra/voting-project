@extends('layouts.pages-blank')

<<<<<<< HEAD
=======
@section('localization')
@php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown">
    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
        <i class="align-middle" data-feather="globe"></i>
    </a>
    <a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
        <span class="text-dark">@switch($locale)
            @case('en')
            EN
            @break
            @case('id')
            ID
            @break
            @default
            ID
            @endswitch</span>
        <i class="align-middle" data-feather="chevron-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="/kandidat/en">EN</a>
        <a class="dropdown-item" href="/kandidat/id">ID</a>
    </div>
</li>
@endsection
>>>>>>> 059a9d9957de6399f609ecac2aa9adc10b94b3ea

@section('container')
<h1 class="h1 mb-3">Detail Kandidat</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label class="font-weight-bold" style="font-weight: bold" for="nama">{{__('edit.profile.name')}}</label>
                    <input class="form-control form-control-lg" name="nama" type="text" value="{{ $kandidat->nama}}" readonly>
                </div>
                <div class="mt-3 form-group">
                    <label class="font-weight-bold" style="font-weight: bold" for="nama">{{__('edit.profile.description')}}</label>
                    <input class="form-control form-control-lg" name="keterangan" type="text" value="{{ $kandidat->keterangan}}" readonly>
                </div>
                <br>
                <div class="mt-3 form-group">
                    <label style="font-weight: bold" class="font-weight-bold" for="photo">{{ __('edit.profile.photo') }}</label><br>
                    <img src="{{ asset('storage/images/' . $kandidat->photo) }}" alt="" style="height: 200px">
                </div>
                <div class="mt-4 text-center submit-btn">
                    <a href="{{ route('kandidat.list-kandidat') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection