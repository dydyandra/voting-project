@extends('layouts.pages-blank')

@section('localization')
@php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown">
    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
        <i class="align-middle" data-feather="globe"></i>
    </a>
    <a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
        <span class="text-dark">@switch($locale)
            @case('en')
            EN
            @break
            @case('id')
            ID
            @break
            @default
            ID
            @endswitch</span>
        <i class="align-middle" data-feather="chevron-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="/kandidat/en">EN</a>
        <a class="dropdown-item" href="/kandidat/id">ID</a>
    </div>
</li>
@endsection

@section('container')
<h1 class="h1">Voting Statistics</h1>
<h4 class="mb-3">For Admin Only</h4>

<div class="row">
  <div class="col-12">
        <div class="row">
          <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div>
                    <h3 class="text-danger">{{ $registered_count }}</h3>
                    <p class="mb-0">Registered All Time</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-rocket text-danger fa-3x"></i>
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
                    <h3 class="text-success">{{ $registered_today_count }}</h3>
                    <p class="mb-0">Registered Today</p>
                  </div>
                  <div class="align-self-center">
                    <i class="far fa-rocket text-success fa-3x"></i>
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
                    <h3 class="text-info">{{ $voting_count }}</h3>
                    <p class="mb-0">Have Voted</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-rocket text-info fa-3x"></i>
                  </div>
                </div>
                <div class="px-md-1">
                  <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <h3 class="text-warning">{{ $voted_today_count }}</h3>
                    <p class="mb-0">Have Voted Today</p>
                  </div>
                  <div class="align-self-center">
                    <i class="far fa-rocket text-warning fa-3x"></i>
                  </div>
                </div>
                <div class="px-md-1">
                  <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <h3 class="text-success">{{ $hasNotVoted }}</h3>
                    <p class="mb-0">Have Not Voted</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-rocket text-success fa-3x"></i>
                  </div>
                </div>
                <div class="px-md-1">
                  <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <h3 class="text-danger">{{ $hasNotVotedPercent }}%</h3>
                    <p class="mb-0">Have Not Voted</p>
                  </div>
                  <div class="align-self-center">
                    <i class="fas fa-rocket text-danger fa-3x"></i>
                  </div>
                </div>
                <div class="px-md-1">
                  <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection