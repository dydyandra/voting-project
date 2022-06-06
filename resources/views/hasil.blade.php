@extends('layouts.template')

@section('container')
<div class="mt-5">
<div class="d-flex justify-content-center">
<div class="card w-50">
    <div class="card-header"><h4>Anda telah melakukan voting.</h4></div> 
    <div class="card-body">
        <h3 class="card-title"><a href="/voting/{{ $result->kandidat->slug }}" class="text-decoration-none"> {{ $result->kandidat->nama  }} </a></h3>
        <p class="card-text">{{ $result->kandidat->keterangan}}</p>
        <a href="/articles" class="btn btn-primary">Go back</a>
      </div>
      <img src="{{ asset('storage/images/' . $result->kandidat->photo) }}" class="card-img-bottom" alt="...">
  </div>
</div>
</div>
@endsection

