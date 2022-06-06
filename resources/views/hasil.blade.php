@extends('layouts.template')

@section('container')
<article class="mb-5">
    <h3>{{ $result->kandidat->nama }}</h3>

    <h6>
        <a href="/kandidat/detail/{{ $result->kandidat->id }}" class="text-decoration-none"> {{ $result->kandidat->nama  }} </a>
    </h6>

    {!! $result->kandidat->keterangan !!}

    <a href="/articles" class="d-block mt-3">Back</a>
</article>
@endsection