@extends('layouts.pages-blank')

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
                <form id="form-login" action="{{ route('kandidat.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="font-weight-bold" style="font-weight: bold" for="nama">{{__('edit.profile.name')}}</label>
                    <input class="mt-3 form-control form-control-lg @error('nama') is-invalid @enderror" id="nama" name="nama" type="text"
                        value="{{ old('nama') }}" placeholder="{{__('form.profile.name')}}" list="title-list" autofocus required>
                    {{-- <datalist id="title-list">
                        @foreach ($title as $t)
                            <option data-value="{{ $t->id }}">{{ $t->title }}</option>
                        @endforeach
                    </datalist> --}}
                </div>

                @error('nama')
                    <div class="alert alert-danger">
                        Nama salah. Panjang karakter seharusnya antara 5-255. Silahkan dimasukkan kembali.
                    </div>
                @enderror

                <div class="form-group mt-3">
                    <label class="font-weight-bold" style="font-weight: bold" for="keterangan">{{__('edit.profile.description')}}</label>
                        <textarea id="keterangan" form="form-login" name = "keterangan" rows="6" cols="50" onKeyPress class="@error('keterangan') is-invalid @enderror mt-3 form-control form-control-lg">{{{ old('keterangan') }}}
                        </textarea>
                    </div>

                @error('keterangan')
                    <div class="alert alert-danger">
                        Keterangan salah. Panjang karakter seharusnya antara 5-255. Silahkan dimasukkan kembali.
                    </div>
                @enderror

                <div>
                    {{-- <label for="photo">Gambar Buku</label> --}}
                    <input type="file" class="mt-3 form-control form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo">
                </div>

                @error('photo')
                    <div class="alert alert-danger">
                        Tipe File Hanya Boleh jpg,png,jpeg,gif,svg. Silahkan upload ulang.
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