@extends('layouts.pages-blank')


@section('container')
<div class="container-fluid">
    <section>
      <div class="row">
        <div class="col-12 mt-3 mb-1">
          <h2 class="text-uppercase">{{__('stats.title')}}</h2>
          <h4>{{__('stats.sub-title')}}</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 style="font-weight: bold" class="text-danger">{{ $registered_count }}</h3>
                  <h4 style="font-weight: bold" class="mb-0">{{__('stats.registered-all-time')}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 style="font-weight: bold" class="text-success">{{ $registered_today_count }}</h3>
                  <h4 style="font-weight: bold" class="mb-0">{{__('stats.registered-today')}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 style="font-weight: bold" class="text-info">{{ $voting_count }}</h3>
                  <h4 style="font-weight: bold" class="mb-0">{{__('stats.have-voted')}}</h4>
                </div>
              </div>
              <div class="px-md-1">
                <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%;" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 style="font-weight: bold" class="text-warning">{{ $voted_today_count }}</h3>
                  <h4 style="font-weight: bold" class="mb-0">{{__('stats.have-voted-today')}}</h4>
                </div>
              </div>
              <div class="px-md-1">
                <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;" aria-valuenow="35"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 style="font-weight: bold" class="text-success">{{ $hasNotVoted }}</h3>
                  <h4 style="font-weight: bold" class="mb-0">{{__('stats.have-not-voted')}}</h4>
                </div>
              </div>
              <div class="px-md-1">
                <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 style="font-weight: bold" class="text-danger">{{ $hasNotVotedPercent }}%</h3>
                  <h4 style="font-weight: bold" class="mb-0">{{__('stats.have-not-voted')}}</h4>
                </div>
              </div>
              <div class="px-md-1">
                <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="40"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection