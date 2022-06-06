@extends('layouts.template-admin')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mt-2">
                <div class="card-body text-center top-icon">
                    <h1 class="mt-3">Detail Review</h1>
                    <br>
                    @csrf


                    <div>
                        <input class="mt-3 form-control form-control-lg" name="nama" type="text" placeholder="Nama"
                            value="{{ $kandidat->nama}}" readonly>
                    </div>



                    <div>
                        <input class="mt-3 form-control form-control-lg" name="keterangan" type="text" placeholder="Author"
                            value="{{ $kandidat->keterangan}}" readonly>
                    </div>

                    <div class="mt-3">
                        <img src="{{ asset('storage/images/' . $kandidat->photo) }}" alt="" style="height: 200px">
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
