@extends('template.master')
@section('judul_konten')
    {{$program->title}}
@endsection
@section('main_konten')
<div class="row">
    <div class="col-md-6">
<div class="card material-card">
        <img class="card-img-top" src="{{ asset('images/program-images/'.$program->photo) }}" alt="Card image cap">
        <div class="card-body">
            <div class="d-flex no-block align-items-center mb-3">
                <span style="border-right: 1px solid #CBD2DA;" class="text-muted pr-4">Dibuat Pada : {{$program->created_at->toDateString()}}</span>
                <div class="ml-3">
                    <span style="border-right: 1px solid #CBD2DA;" class="text-muted pr-4">Berakhir Pada : {{ $program->time_is_up }}</span>
                </div>
                <div class="ml-3">
                    @if ($program->isPublished == 1)    
                        <span class="badge badge-success">Published <i class="ti-check"></i></span>
                    @else
                        <span class="badge badge-danger">Belum Dipublish</span>
                    @endif
                </div>
            </div>
            <div class="d-flex no-block align-items-center mb-3">
                <span style="color: #2cd07e; border-right: 1px solid #2cd07e;" class="pr-4">{{$program->category->category_name}}</span>
                <div class="ml-3">
                    <span style="color: #2cd07e; border-right: 1px solid #2cd07e;" class="pr-4"><i class="ti-heart"></i> {{ $program->time_is_up }} Berdonasi</span>
                </div>
                <div class="ml-3">
                    @if ($program->isSelected == 1)
                        <span class="badge badge-success">Program Pilihan <i class="ti-check"></i></span>
                    @endif
                </div>
            </div>
            <h3 class="mt-3 text-uppercase">{{$program->title}}</h3>
            <p class="mt-3 font-light">{{$program->brief_explanation}}</p>
            <div class="float-right">
                @if ($program->isPublished == 0)
                    <a class="btn btn-success waves-effect waves-light mt-2 text-white" href="/admin/published/{{$program->id}}">Publikasi</a>
                @else
                    <a class="btn btn-danger waves-effect waves-light mt-2 text-white" href="/admin/published/{{$program->id}}">Batal Publikasi</a>
                @endif
                @if ($program->isSelected == 0)
                <a class="btn btn-primary waves-effect waves-light mt-2 text-white" href="/admin/selected/{{$program->id}}">Jadikan Program Pilihan</a>
                @else
                <a class="btn btn-danger waves-effect waves-light mt-2 text-white"href="/admin/selected/{{$program->id}}">Batal Jadikan Program Pilihan</a>
                @endif
            </div>
            @if ($program->donation_collected >= $program->donation_target)
                <span class="alert alert-success float-left" >Terdanai <i class="ti-check"></i></span>
            @endif
        </div>
    </div>
    </div>
    <div class="col-md-6">
        
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Deskripsi</span></a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Laporan Perkembangan</span></a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#laporanuser" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Laporan dari User</span></a> </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home2" role="tabpanel">
            <div class="p-4 text-justify">
                {!! $program->description !!}
            </div>
        </div>
    </div>
</div>
@endsection