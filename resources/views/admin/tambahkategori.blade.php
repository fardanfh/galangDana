@extends('template.master')
@section('judul_konten')
    Tambah Data Kategori
@endsection
@section('main_konten')
    <!-- Outer Row -->
    <div class="row justify-content-center">
            
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block pl-5"><br><br>
                            <img class="img-fluid mb-5"
                            src="{{asset('template/img/undraw_posting_photo.svg')}}" alt="...">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Kategori Program Donasi</h1><br>
                                    <p class="mb-2 text-left">Nama Kategori : </p>
                                </div>
                                <form method="POST" action="/kategori">
                                    @csrf
                                    <div class="form-group">
                                        <input id="kategori" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" autocomplete="category_name" autofocus>
                                        @error('category_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Tambah Kategori
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection