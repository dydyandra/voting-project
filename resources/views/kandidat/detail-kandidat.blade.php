@extends('layouts.template')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mt-2">
                <div class="card-body text-center top-icon">
                    <h1 class="mt-3">Detail Review</h1>
                    <br>
                    @csrf
                    <div class="mt-3">
                        {{-- <label for="photo">Gambar Buku</label> --}}
                        {{-- <input type="file" class="mt-3 form-control form-control-file" id="photo" name="photo"> --}}
                        <img src="{{ asset('storage/images/' . $kandidat->photo) }}" alt="" style="height: 200px">
                    </div>

                    @error('photo')
                        <div class="alert alert-danger">
                            Tipe File Salah
                        </div>
                    @enderror

                    <div>
                        <input class="mt-3 form-control form-control-lg" name="nama" type="text" placeholder="Nama"
                            value="{{ $kandidat->nama}}" readonly>
                    </div>

                    @error('title')
                        <div class="alert alert-danger">
                            Title salah
                        </div>
                    @enderror


                    <div>
                        <input class="mt-3 form-control form-control-lg" name="keterangan" type="text" placeholder="Author"
                            value="{{ $kandidat->keterangan}}" readonly>
                    </div>

                    @error('keterangan')
                        <div class="alert alert-danger">
                            Author Harus Dimasukkan
                        </div>
                    @enderror

                    
                    {{-- </form> --}}
                    <br>
                    <div class="mt-4 text-center submit-btn">
                        <a href="{{ route('kandidat.list-kandidat') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
