@extends('layouts.template')

@section('container')
    <h1 class="mb-5 mt-5" style="text-align:center">{{ $title }}</h1>
    @foreach($candidates as $candidate)
      <div onclick="location.href='/voting/{{ $candidate->nama }}';" style="cursor: pointer;" class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('storage/images/' . $candidate->photo) }}" class="img-fluid rounded-start" alt="">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $candidate->nama }}</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection


