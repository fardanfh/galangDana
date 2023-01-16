@extends('template.master')
@section('judul_konten')
    Data Program
@endsection
@section('main_konten')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Program Donasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Start date</th>
                            <th>Target</th>
                            <th>Terkumpul</th>
                            <th>End Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($program as $dProgram)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dProgram->title }}</td>
                                <td>{{ $dProgram->created_at->format('Y-m-d') }}</td>
                                <td>{{ $dProgram->donation_target }}</td>
                                <td>{{ $dProgram->donation_collected }}</td>
                                <td>{{ $dProgram->time_is_up }}</td>
                                <td>
                                    <a href="/admin/detail/{{$dProgram->id}}" class="btn btn-warning">Detail</a>
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection