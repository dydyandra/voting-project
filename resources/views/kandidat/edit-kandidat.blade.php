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
    <h1 class="h1 mb-3">{{ __('edit.edit-title') }}</h1>

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
                    <form id="form-login" action="{{ route('kandidat.update', $kandidat->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" style="font-weight: bold" for="nama">{{ __('edit.profile.name') }}</label>
                            <input class="form-control form-control-lg @error('title') is-invalid @enderror" name="nama"
                                type="text" placeholder="{{ __('edit.profile.name') }}" value="{{ $kandidat->nama }}"
                                autofocus required>
                        </div>

                        @error('nama')
                            <div class="alert alert-danger">
                                Nama salah. Panjang karakter seharusnya antara 5-255. Silahkan dimasukkan kembali.
                            </div>
                        @enderror

                        <div class="mt-3 form-group">
                            {{-- <input class="mt-3 form-control form-control-lg @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" type="keterangan"
                            placeholder="{{__('form.profile.description')}}" value="{{ old('keterangan') }}" autofocus required> --}}
                            <label class="font-weight-bold" style="font-weight: bold" for="keterangan">{{ __('edit.profile.description') }}</label>
                            <textarea id="keterangan" form="form-login" name="keterangan" rows="6" cols="50" onKeyPress
                                class="@error('keterangan') is-invalid @enderror mt-3 form-control form-control-lg">{{ $kandidat->keterangan }}
                            </textarea>
                        </div>

                        @error('keterangan')
                            <div class="alert alert-danger">
                                Keterangan salah. Panjang karakter seharusnya antara 5-255. Silahkan dimasukkan kembali.
                            </div>
                        @enderror

                        <div class="mt-3 form-group">
                            <label class="font-weight-bold" style="font-weight: bold" for="photo">{{ __('edit.profile.photo') }}</label>
                            <input type="file" class="form-control form-control-file  @error('photo') is-invalid @enderror"
                                id="photo" name="photo">
                            <img src="{{ asset('storage/images/' . $kandidat->photo) }}" alt="" style="height: 200px">
                        </div>

<<<<<<< HEAD
                        @error('photo')
                            <div class="alert alert-danger">
                                Tipe File Hanya Boleh jpg,png,jpeg,gif,svg. Silahkan upload ulang.
                            </div>
                        @enderror
                    </form>
                    <br>
                    <div class="mt-4 text-center submit-btn">
                        <a href="{{ route('kandidat.list-kandidat') }}" class="btn btn-secondary"
                            onclick="return confirm('{{ __('edit.confirm') }}');">{{ __('edit.back') }}</a>
                        <button type="submit" class="btn btn-primary" form="form-login">{{ __('edit.edit') }}</button>
=======
                    <div class="form-group">
                        <label class="font-weight-bold" for="photo">{{__('edit.profile.photo')}}</label>
                        <input type="file" class="form-control form-control-lg form-control-file  @error('photo') is-invalid @enderror" id="photo" name="photo">
                        <img src="{{ asset('storage/images/'. $kandidat->photo) }}" alt="" style="height: 200px">
                    </div>

                    @error('photo')
                    <div class="alert alert-danger">
                        Tipe File Salah
>>>>>>> 059a9d9957de6399f609ecac2aa9adc10b94b3ea
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
