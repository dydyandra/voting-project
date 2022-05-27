@extends('layouts.template')

@section('localization')
<ul class="navbar-nav ml-auto">
    @php $locale = session()->get('locale'); @endphp
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
        data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @switch($locale)
                @case('en')
                EN
                @break
                @case('id')
                IN
                @break
                @default
                EN
            @endswitch    
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/kandidat/en">EN</a>
            <a class="dropdown-item" href="/kandidat/id">ID</a>
        </div>
    </li>
</ul>

@endsection

@section('container')
<div class="mx-2">
    <h2 class="mt-2">{{__('form.table.title')}}</h2>

    <div class="row">
        <div class="col-6">
            <a href="{{ route('kandidat.create') }}" class="btn btn-purple"><i class="fa fa-plus"></i> {{__('form.table.add')}}</a>
        </div>
    </div>

    {{-- <a href="{{ route('review.create') }}" class="btn btn-purple"><i class="fa fa-plus"></i> Tambah review Baru</a> --}}

    <br/>
    <br/>
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

    @if (Session::has('edit_review'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Pengeditan kandidat Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if (Session::has('hapus_review'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
            <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
            <br>
                Penghapusan kandidat Berhasil
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    {{-- <h5>Total Read: {{ $showRead }} | Total in Progress: {{ $showProgress }}</h5> --}}
    <table class="table">
        <thead bordered class="thead">
            <tr>
                <th>ID</th>
                <th>{{__('form.table.photo')}}</th>
                <th>{{__('form.table.name')}}</th>
                <th>{{__('form.table.description')}}</th>
                <th>{{__('form.table.action')}}</th>
            </tr>
        </thead>
        @php
            $it = 1;
        @endphp
        @foreach($kandidat as $d)
        <tr>
            <td>{{ $it }}</td>
            <td>
                <img src="{{ asset('storage/images/'. $d->photo) }}" alt="" style="height: 100px; width:75px">
                {{-- {{ $d->photo }} --}}
            </td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->keterangan }}</td>
            <td>
                <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini ?');" action="{{ route('kandidat.destroy', $d->id) }}" method="POST">
                    <a href="{{ Route('kandidat.edit', $d->id) }}" class="btn btn-sm btn-purple shadow"><i class="fa fa-edit"></i> {{__('form.table.edit')}}</a>
                    |
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i> {{__('form.table.delete')}}</button>
                    |
                    <a href="{{ route('kandidat.show' , $d->id) }}" class="btn btn-sm btn-secondary shadow"><i class="fa fa-info-circle"></i> Detail</a>
                </form>
            </td>
        </tr>
        @php
            $it+=1;
        @endphp
        @endforeach
    </table>
</div>
@endsection

