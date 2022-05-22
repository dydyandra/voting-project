@extends('layouts.template')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card mt-2">
                <div class="card-body text-left top-icon">
                    <h1 class="mt-3">Kandidat Baru</h1>
                    <br>
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    {{-- @if (Session::has('wrongUsername'))
                    <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                @endif --}}

                    <form id="form-login" action="{{ route('kandidat.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input class="mt-3 form-control form-control-lg" id="nama" name="nama" type="text"
                                value="{{ old('nama') }}" placeholder="Nama Kandidat" list="title-list" autofocus required>
                            {{-- <datalist id="title-list">
                                @foreach ($title as $t)
                                    <option data-value="{{ $t->id }}">{{ $t->title }}</option>
                                @endforeach
                            </datalist> --}}
                        </div>

                        @error('nama')
                            <div class="alert alert-danger">
                                Nama salah
                            </div>
                        @enderror

                        <div>
                            <input class="mt-3 form-control form-control-lg" id="keterangan" name="keterangan" type="keterangan"
                                placeholder="Keterangan" value="{{ old('keterangan') }}" autofocus required>
                        </div>

                        @error('keterangan')
                            <div class="alert alert-danger">
                                Author Harus Dimasukkan
                            </div>
                        @enderror

                        <div>
                            {{-- <label for="photo">Gambar Buku</label> --}}
                            <input type="file" class="mt-3 form-control form-control-file" id="photo" name="photo">
                        </div>

                        @error('photo')
                            <div class="alert alert-danger">
                                Tipe File Salah
                            </div>
                        @enderror

                        {{-- <div>
                            
                            <input class="mt-3 form-control form-control-lg" type="date" name="started"
                                value="<?php echo date('Y-m-d'); ?>" autofocus required>
                        </div> --}}

                        {{-- @error('started')
                            <div class="alert alert-danger">
                                Tanggal Mulai Harus Dimasukkan
                            </div>
                        @enderror --}}

                    </form>
                    <br>
                    <div class="mt-4 text-center submit-btn">
                        <button type="submit" class="btn btn-primary" form="form-login">Tambah Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    {{-- <script>
        var title = {!! json_encode($title->toArray()) !!};
        var myElement = document.getElementById("author");
        $('#title').change(function() {
                var id = $(this).val();
                var item2 = title.filter(item => item.title === id)
                console.log(item2[0].author)

                myElement.value = item2[0].author;

            });


    </script> --}}
@endsection
