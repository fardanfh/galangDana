<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terima Kasih</title>
    <link href="{{asset('front-assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- front Main CSS File -->
    <link href="{{ asset('front/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/donasi.css') }}" rel="stylesheet">
    <style>
    .contain-card{
        margin: 30px 300px;
    }
    body{
        background-color: #f2f2f2;
    }
    .info-program{
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08);
        background: #fff;
        min-height: 110px;
        border: 1px solid #eaeaea;
        border-radius: 8px;
        margin-top: 20px;  
    }
    .info-program .col-3{
        line-height: 120px !important; 
    }
    img{
        width: 90%;
    }
    .card-thx{
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08);
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 8px;
        margin-top: 20px; 
        padding: 20px; 
    }
    .alert-success{
        border: 1px solid #689b74;
        border-style: dashed;
    }
    .btn-success{
        border-radius: 2px;
        box-shadow: 0px 2px 8px rgba(3, 3, 3, 0.5) !important;
    }
    @media(max-width: 720px){
        .contain-card{
            margin: 20px 20px;
        }
        img{
            transition: .3s ease;
        }
        img:hover{
            transform: scale(1.8);
        }
    }
    </style>
</head>
<body>
    <div class="contain-card">
        <div class="mb-3 donasi-card">
            <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="{{$program->getFoto()}}" class="card-img image-donasi">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text mb-2" style="font-size: 23px">Terima Kasih Atas Rencana Pendonasian Anda Untuk : </p>
                    <h5 class="card-title" style="font-size: 35px">{{$program->title}}</h5>
                    <p class="card-text"><small class="text-muted">Akan berakhir dalam {{$program->getHari()}} hari lagi</small></p>
                  </div>
                </div>
              </div>
        </div>
        
        <div class="donasi-card p-4">
            <h5>Anda akan berdonasi dengan data sebagai berikut : </h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Nama Donatur</td>
                        <th>{{$donatur->nama_donatur}}</th>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <th>{{$donatur->email}}</th>
                    </tr>
                    <tr>
                        <td>Nominal Donasi</td>
                        <th>{{$donatur->nominal_donasi}}</th>
                    </tr>
                </tbody>
            </table>

            <div class="alert alert-success">
                <span>ID Transaksi : <strong>{{$donatur->id_transaksi}}</strong></span><br>
                <span>Nomor Rekening Tujuan : <strong>{{$program->shelter_account_number}}</strong></span>
            </div>

            <p class="text-justify alert alert-success">Silahkan melakukan pembayaran sesuai nominal donasi yang anda berikan ke nomor rekening tujuan, dan jangan lupa untuk konfirmasi pembayaran menggunakan ID transaksi, maka dari itu Anda perlu mengingat ID transaksi yang diberikan. Jika perlu, Anda bisa <i class="font-weight-bold" onclick="ss()" style="cursor: pointer">screenshoot</i> halaman ini</p> 

            <a href="/" class="btn btn-success">Kembali Kehalaman Utama</a>
        </div>
    </div>

    </div><br>
  <script src="{{asset('front-assets/js/jquery.js')}}"></script>
  <script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('front/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function ss () {
    html2canvas(document.body).then(canvas => {
        let a = document.createElement("a");
        a.download = "ss.png";
        a.href = canvas.toDataURL("image/png");
        a.click(); // MAY NOT ALWAYS WORK!
    });
    }
  </script>
</body>
</html>