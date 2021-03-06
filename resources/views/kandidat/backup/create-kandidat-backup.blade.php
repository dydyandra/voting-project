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
            <a class="dropdown-item" href="/kandidat/create/en">EN</a>
            <a class="dropdown-item" href="/kandidat/create/id">ID</a>
        </div>
    </li>
</ul>

@endsection

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mt-2">
                <div class="card-body text-left top-icon">
                    <h1 class="mt-3">{{__('form.title')}}</h1>
                    <br>
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    {{-- @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif --}}

                    <form id="form-login" action="{{ route('kandidat.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input class="mt-3 form-control form-control-lg" id="nama" name="nama" type="text"
                                value="{{ old('nama') }}" placeholder="{{__('form.profile.name')}}" list="title-list" autofocus required>
                        </div>

                        @error('nama')
                            <div class="alert alert-danger">
                                Nama salah
                            </div>
                        @enderror

                        <div>
                            <input class="mt-3 form-control form-control-lg" id="keterangan" name="keterangan" type="keterangan"
                                placeholder="{{__('form.profile.description')}}" value="{{ old('keterangan') }}" autofocus required>
                        </div>

                        @error('keterangan')
                            <div class="alert alert-danger">
                                Author Harus Dimasukkan
                            </div>
                        @enderror

                        <div class="form-group mt-3">
                            <label style="font-weight: bold" class="font-weight-bold" for="photo">{{ __('edit.profile.photo') }}</label>
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

@endsection
