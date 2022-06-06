@extends('layouts.pages-blank')


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