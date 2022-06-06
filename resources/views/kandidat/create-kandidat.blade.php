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
<h1 class="h1 mb-3">{{__('form.title')}}</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (Session::has('error'))
                <div class="card-body text-left top-icon">
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                </div>
                @endif
                @if (Session::has('wrongUsername'))
                <div class="card-body text-left top-icon">
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                </div>
                @endif
                <form id="form-login" action="{{ route('kandidat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input class="mt-3 form-control form-control-lg" id="nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="{{__('form.profile.name')}}" list="title-list" autofocus required>
                    </div>
                    @error('nama')
                    <div class="alert alert-danger">
                        Nama salah
                    </div>
                    @enderror

                    <div class="form-group">
                        <input class="mt-3 form-control form-control-lg" id="keterangan" name="keterangan" type="keterangan" placeholder="{{__('form.profile.description')}}" value="{{ old('keterangan') }}" autofocus required>
                    </div>
                    @error('keterangan')
                    <div class="alert alert-danger">
                        Author Harus Dimasukkan
                    </div>
                    @enderror

                    <div class="form-group">
                        {{-- <label for="photo">Gambar Buku</label> --}}
                        <input type="file" class="mt-3 form-control form-control-file" id="photo" name="photo">
                    </div>
                    @error('photo')
                    <div class="alert alert-danger">
                        Tipe File Salah
                    </div>
                    @enderror
                </form>
                <br>
                <div class="mt-4 text-center submit-btn">
                    <button type="submit" class="btn btn-primary" form="form-login">{{__('form.button')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection