@extends('template.front')
@section('style')
    <link rel="stylesheet" href="{{asset('front-assets/css/donasi.css')}}">
    <style>
      .rounded-circle{
        width: 35px !important;
        height: 35px;
      }
      .fyi{
        height: auto;
        background: rgba(244, 244, 244, 0.7);
        color: #4513f3;
      }
      .btn-donasi{
        background-color: #008374;
      }
    </style>
@endsection
@section('main_konten') 
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-7">  
      <h2>{{$program->title}}</h2>
      <div class="card mt-4">
        <img src="{{$program->getFoto()}}" alt="Program Image">
      </div>
        <br>
        <span class="">{{$program->brief_explanation}}</span>
        <div class="mt-2">
          @if ($program->donation_collected >= $program->donation_target)
           <div class="badge badge-success">Terdanai <i class="fa fa-check"></i></div>
          @endif
            <button type="button" class="btn btn-info btn-sm">
              Dibuat oleh : <span class="badge badge-light text-uppercase">{{$program->user->name}}</span>
            </button>
        </div><br>
    </div>
    <div class="col-md-5 container">
      <br>
      <h4 class="text-center">Daftar yang berdonasi</h4><hr>
      <table class="table table-bordered">
        @if ($program->donation_collected == 0)
            <tr>
              <th>Belum ada yang mendonasi</th>
            </tr>
        @else
        <tbody>
          @foreach ($donatur as $donaturs)
          <tr>
            <th style="font-weight: 200;">{{$donaturs->nama_donatur}}</th>
            <th>{{$donaturs->nominal_donasi}}</th>
          </tr>
          @endforeach
        </tbody>
        @endif
      </table><br>
      <div class="card-donasi">
        <span>{{$program->brief_explanation}}</span><br>
        <a href="/donasi/{{$program->id}}/donasi" class="btn btn-primary mt-2 form-control btn-lg btn-donasi"><span><i class="bi bi-credit-card"></i></span> Donasi Sekarang</a>
      </div>
    </div>
  </div>
  <hr>
  <div class="row pb-4">
    <div class="col-md-7 col-12">
      <div class="main ">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active btn-sm" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Deskripsi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Laporan Pengembangan</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            {!! $program->description !!}
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <section id="content2">
              <div id="accordion">
                @php
                    $i = 1;
                @endphp
                @foreach ($devs as $dev)
                <div class="card mt-2">
                  <div class="card-header" id="heading-3">
                        <h5 class="mb-0">
                          <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{$dev->id}}" aria-expanded="false" aria-controls="collapse-{{$dev->id}}">
                              <span>UPDATE #{{$i++}}</span>
                          </a>
                        </h5>
                      </div>
                      <div id="collapse-{{$dev->id}}" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                        <div class="card-body">
                          <h2>{{$dev->title}}</h2>
                          <p>{{$dev->created_at->toDateString()}}</p>
                          <br><br>
                          {!! $dev->description !!}
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
            </section>
          </div>
        </div>
      
        <section id="content1">
          
          <div class="mt-4"><hr>
            <div class="alert alert-danger" role="alert">
              <span id="span">Program Mencurigakan ? <button class="btn btn-sm btn-danger" id="report">Laporkan</button></span>
            </div>
            <form id="show" class="mt-2 d-none" action="#" method="post">
              @csrf
              <input type="hidden" name="program_id" value="{{$program->id}}">
              <div class="form-group">
                <textarea name="report" required class="form-control"></textarea>
              </div>
              <button type="submit" class="btn btn-sm btn-info">Submit</button>
            </form>
          </div>
        </section>
      
      </div>
    </div>
    <div class="col-md-5 col-12">
    </div>
  </div>
@endsection
@section('script')
    <script>
    $('#report').on('click', function(){
      $('#show').removeClass('d-none')
      $('#span').html('Tuliskan Kecurigaan Anda');
    })
    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
    </script>
@endsection 


