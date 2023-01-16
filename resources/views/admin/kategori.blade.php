@extends('template.master')
@section('judul_konten')
    Data Kategori
@endsection
@section('main_konten')
<div class="d-sm-flex align-items-center justify-content-end mb-4">
    <a href="kategori/create" class="btn btn-primary">Tambah Kategori</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori Donasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $dKateg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dKateg->category_name }}</td>
                        <td>
                            <div class="row d-flex justify-content-around align-items-center">
                                <form action="kategori/{{ $dKateg->id }}" method="POST" wire:submit.prevent="delete">  
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection