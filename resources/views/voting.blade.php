@extends('layouts.template')

@section('container')
    <h1 class="mb-5 mt-5" style="text-align:center">{{ $title }}</h1>
    @if (Session::has('tambah_review'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
        <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
        <br>
            Penambahan kandidat Berhasil
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
        </button>
    </div>
    @endif
    @foreach($candidates as $candidate)
      <div onclick="location.href='/voting/{{ $candidate->slug }}';" style="cursor: pointer;" class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('storage/images/' . $candidate->photo) }}" class="img-fluid rounded-start" alt="">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $candidate->nama }}</h5>
              <p class="card-text">{{ $candidate->keterangan }}</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              <form id="form-voting" action="{{ route('voting.store') }}" name="voting" method="POST">
                @csrf
                <input type="hidden" name="kandidatvote" value={{ $candidate->id}} />
                <button type="submit" class="btn btn-primary">VOTE</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </form>
    @endforeach
@endsection


