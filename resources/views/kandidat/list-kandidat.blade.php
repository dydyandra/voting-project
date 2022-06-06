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
<h1 class="h1 mb-3">{{__('form.table.title')}}</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-6 mb-2">
                    <a href="{{ route('kandidat.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('form.table.add')}}</a>
                </div>
                @if (Session::has('tambah_review'))
                <div class="alert alert-success alert-dismissible fade show p-3 w-50" role="alert">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                    Penambahan kandidat Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (Session::has('edit_review'))
                <div class="alert alert-success alert-dismissible fade show p-3 w-50" role="alert">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                    Pengeditan kandidat Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (Session::has('hapus_review'))
                <div class="alert alert-success alert-dismissible fade show p-3 w-50" role="alert">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                    Penghapusan kandidat Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

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
                    @foreach($kandidat as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/images/'. $d->photo) }}" alt="" style="height: 100px; width:75px">
                            {{-- {{ $d->photo }} --}}
                        </td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini ?');" action="{{ route('kandidat.destroy', $d->id) }}" method="POST">
                                <a href="{{ Route('kandidat.edit', $d->id) }}" class="btn btn-sm btn-warning shadow"><i class="fa fa-edit"></i> {{__('form.table.edit')}}</a>
                                |
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i> {{__('form.table.delete')}}</button>
                                |
                                <a href="{{ route('kandidat.show' , $d->id) }}" class="btn btn-sm btn-secondary shadow"><i class="fa fa-info-circle"></i> Detail</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection