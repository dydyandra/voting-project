@extends('layouts.pages-blank')

@section('container')
<h1 class="h1 mb-3">{{__('form.table.title')}}</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-6">
                    <a href="{{ route('kandidat.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('form.table.add')}}</a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('tambah_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-50" role="alert">
                    <strong><i class="fa fa-check-circle"></i> {{__('form.message.success')}}!</strong>
                    <br>
                    {{__('form.message.add')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (Session::has('edit_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-50" role="alert"> <strong><i class="fa fa-check-circle"></i> {{__('form.message.success')}}!</strong>
                    <br>
                    {{__('form.message.edit')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (Session::has('hapus_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-50" role="alert"> <strong><i class="fa fa-check-circle"></i> {{__('form.message.success')}}!</strong>
                    <br>
                    {{__('form.message.delete')}}
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
                            <img src="{{ asset('storage/images/'. $d->photo) }}" alt="" style="height: 100px; width:100px">
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
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection