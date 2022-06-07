@extends('layouts.pages-blank')

@section('container')
<h1 class="h1 mb-3">{{__('form.table.title')}}</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-6 mb-2">
                    <a href="{{ route('kandidat.create') }}" class="btn btn-primary"><i class="mb-1" data-feather="plus"></i> {{__('form.table.add')}}</a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('tambah_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-50" role="alert">
                    <strong><i class="align-middle" data-feather="check-circle"></i> {{__('form.message.success')}}!</strong>
                    <button type="button" class="btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
                    <br>
                    {{__('form.message.add')}}
                </div>
                @endif

                @if (Session::has('edit_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-50" role="alert">
                    <strong><i class="align-middle" data-feather="check-circle"></i> {{__('form.message.success')}}!</strong>
                    <button type="button" class="btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
                    <br>
                    {{__('form.message.edit')}}
                </div>
                @endif

                @if (Session::has('hapus_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-50" role="alert">
                    <strong><i class="align-middle" data-feather="check-circle"></i> {{__('form.message.success')}}!</strong>
                    <button type="button" class="btn-close ms-5" data-bs-dismiss="alert" aria-label="Close"></button>
                    <br>
                    {{__('form.message.delete')}}
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
                            <img src="{{ asset('storage/images/'. $d->photo) }}" alt="" style="height: 100px; width:100px">
                            {{-- {{ $d->photo }} --}}
                        </td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini ?');" action="{{ route('kandidat.destroy', $d->id) }}" method="POST">
                                <a href="{{ Route('kandidat.edit', $d->id) }}" class="btn btn-warning shadow"><i class="mb-1" data-feather="edit"></i> {{__('form.table.edit')}}</a>
                                |
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger shadow"><i class="mb-1" data-feather="trash-2"></i></i> {{__('form.table.delete')}}</button>
                                |
                                <a href="{{ route('kandidat.show' , $d->id) }}" class="btn btn-secondary shadow"><i class="mb-1" data-feather="info"></i></i> Detail</a>
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