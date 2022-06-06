@extends('layouts.template-admin')

@section('localization')
<ul class="navbar-nav ml-auto">
    @php $locale = session()->get('locale'); @endphp
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @switch($locale)
                @case('en')
                EN
                @break
                @case('id')
                IN
                @break
                @default
                EN
            @endswitch    
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/kandidat/edit/'.$kandidat->id."/en") }}">EN</a>
            <a class="dropdown-item" href="{{ url('/kandidat/edit/'.$kandidat->id."/id") }}">ID</a>
        </div>
    </li>
</ul>

@endsection

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card mt-2">
            <div class="card-body top-icon">
                <h1 class="mt-3 text-center ">{{__('edit.edit-title')}}</h1>
                <br>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif

                <form id="form-login" action="{{ route('kandidat.update', $kandidat->id) }}" method="post" enctype="multipart/form-data"  onsubmit="return confirm('Apakah Anda Yakin Edit Data ?');">
                    @csrf

                    <div class="form-group">
                        <label class="font-weight-bold" for="nama">{{__('edit.profile.name')}}</label>
                        <input class="form-control form-control-lg @error('title') is-invalid @enderror" name="nama" type="text"
                               placeholder="{{__('edit.profile.name')}}" value="{{ $kandidat->nama }}" autofocus required>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        Title salah
                    </div>
                    @enderror


                    <div class="form-group">
                        <label class="font-weight-bold" for="keterangan">{{__('edit.profile.description')}}</label>
                        <input class="form-control form-control-lg  @error('author') is-invalid @enderror " name="keterangan" type="text"
                               placeholder="Keterangan" value="{{ $kandidat->keterangan }}" autofocus required>
                    </div>

                    @error('author')
                    <div class="alert alert-danger">
                        Author Harus Dimasukkan
                    </div>
                    @enderror

                    <div class="form-group">
                        <label class="font-weight-bold" for="photo">{{__('edit.profile.photo')}}</label>
                        <input type="file" class="form-control form-control-file  @error('photo') is-invalid @enderror" id="photo" name="photo">
                        <img src="{{ asset('storage/images/'. $kandidat->photo) }}" alt="" style="height: 200px">
                    </div>

                    @error('photo')
                    <div class="alert alert-danger">
                        Tipe File Salah
                    </div>
                    @enderror

                  
                </form>
                <br>
                <div class="mt-4 text-center submit-btn">
                    <a href="{{ route('kandidat.list-kandidat') }}" class="btn btn-secondary" onclick="return confirm('{{__('edit.confirm')}}');">{{__('edit.back')}}</a>
                    <button type="submit" class="btn btn-primary" form="form-login">{{__('edit.edit')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
