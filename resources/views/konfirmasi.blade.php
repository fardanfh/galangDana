@extends('template.front')
@section('title')
    Konfirmasi Pendonasian
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('front-assets/css/konfirmasi.css')}}">
    <style>
        
        .search{
            border-radius: 0;
            width: 85%;
            height: 50px;
        }
        .btn-search{
            background: #0af;
            width: 75px;
            height: 50px;
            border-top-right-radius: 3px !important;
            border-bottom-right-radius: 3px !important;
            color: #fff !important;
            border-radius: 0;
        }
        .btn-send{
            background: #0af;
            color: #fff !important;
            border-radius: 2px;
            box-shadow: 0 3px 4px #4444;
        }
        .alert-cek{
            border: 1px solid #0af;
            color: #0af;
            font-weight: bold;
        }
        .alert-inpo{
            background: rgba(113, 206, 252, 0.4);
            color: rgb(009, 109, 300);
            border: 1px solid #0af;
        }
    </style>
@endsection

@section('main_konten')
<div class="m-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6 donasi-card mb-3 mr-4 rounded-2">
            <div class="container">
                <div class="row  d-flex align-items-center align-content-center">
                    <div class="col-md">
                        <img src="{{ asset('front/img/search.svg') }}" alt="" class="img-fluid mx-auto d-block w-75 p-2">
                    </div>
                    <div class="col-md">
                        <div class="alert alert-cek">
                            <h5 class="card-title">Silahkan Cek ID Transaksi Anda</h5>
                            <form action="" method="get">
                                <div class="form-group">
                                    <input class="search form-control float-left" type="text" name="search">
                                </div>
                                <button class="btn btn-info mt-3 w-50 font-weight-bold" type="submit">Cek</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @foreach ($donaturs as $donatur)
        <div class="col-md-4 donasi-card mr-4 rounded-2 border-top border-info" style="border-width: 5px !important">
            <form action="/konfirmasi/store/{{$donatur->id_transaksi}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <h5 class="card-text text-center mt-3 mb-3">Data transaksi anda</h5>
                    <div class="data-transaksi">
                        <div class="container">
                            <div class="d-flex justify-content-between">
                                <div class="nt">
                                    <span class="text-muted card-text ">Nomor Transaksi</span>
                                    <h5 >{{$donatur->id_transaksi}}</h5>
                                </div>
                                <div class="nl">
                                    <span class="text-muted card-text">Nama Lengkap</span>
                                    <h5>{{$donatur->nama_donatur}}</h5>
                                </div>
                            </div>
                            <div class="nd">
                                <span class="text-muted card-text">Nominal Donasi</span>
                                <h5>Rp. {{$donatur->nominal_donasi}}</h5>
                            </div>
                            <div class="pb-3 text-dark">
                                <label for="file">Masukan Bukti Pembayaran : </label>
                                <input id="file" type="file" class="d-block form-control" name="bukti_pembayaran">
                            </div>
                                <button type="submit" class="btn btn-info w-50">Kirim</button>
                             </div>
                        </div>     
                    </div>
                @endforeach
                
            </form>
            
        <br>
        <div class="col-md-1"></div>
    </div>
    </div>
</div>
    
@endsection