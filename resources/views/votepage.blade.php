@extends('layouts.template')

@section('container')
<article class="mb-5">
    <h3>{{ $kandidat->nama }}</h3>
    <img src="{{ asset('storage/images/' . $kandidat->photo) }}" class="img-fluid rounded-start" alt="">
    <h6>
        {{ $kandidat->keterangan }}
    </h6>
    <a href="/voting" class="d-block mt-3">Back</a>
</article>
@endsection
