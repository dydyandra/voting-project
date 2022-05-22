@extends('layouts.template')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card mt-2">
            <div class="card-body text-center top-icon">
                <h1 class="mt-3">Edit Kandidat</h1>
                <br>
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif

                <form id="form-login" action="{{ route('kandidat.update', $kandidat->id) }}" method="post" enctype="multipart/form-data"  onsubmit="return confirm('Apakah Anda Yakin Edit Data ?');">
                    @csrf

                    <div>
                        <input class="mt-3 form-control form-control-lg @error('title') is-invalid @enderror" name="nama" type="text"
                               placeholder="Nama" value="{{ $kandidat->nama }}" autofocus required>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        Title salah
                    </div>
                    @enderror


                    <div>
                        <input class="mt-3 form-control form-control-lg  @error('author') is-invalid @enderror " name="keterangan" type="text"
                               placeholder="Keterangan" value="{{ $kandidat->keterangan }}" autofocus required>
                    </div>

                    @error('author')
                    <div class="alert alert-danger">
                        Author Harus Dimasukkan
                    </div>
                    @enderror

                    <div class="mt-3">
                        {{-- <label for="photo">Gambar Buku</label> --}}
                        <input type="file" class="mt-3 form-control form-control-file  @error('photo') is-invalid @enderror" id="photo" name="photo">
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
                    <a href="{{ route('kandidat.list-kandidat') }}" class="btn btn-secondary" onclick="return confirm('Apakah Anda Yakin Kembali ke Halaman Utama ?');">Kembali</a>
                    <button type="submit" class="btn btn-primary" form="form-login">Edit Data</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
