<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terima Kasih</title>
    <link href="{{asset('front-assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- front Main CSS File -->
    <link href="{{ asset('front/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/donasi.css') }}" rel="stylesheet">
    <style>
    .contain-card{
        margin: 30px 300px;
    }
    .info-program{
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .card-thx{
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 8px;
        margin-top: 20px; 
        padding: 20px; 
        box-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
    }
    .caption{
        border: 1px solid #eaeaea;
        padding: 5px;
        text-align: justify;
    }
    img{
        width: 90%;
        margin-top: 25px;
    }
    .btn-back{
        border-radius: 3px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        background: #f0f0f0;
    }
    @media(max-width: 720px){
        .contain-card{
            margin: 20px 20px;
        }
    }
    hr{
        border-top: 3px dashed #17A2B8;
    }
    </style>
</head>
<body>   
    <div class="container">
        <div class="contain-card w-40">
            <div class="mb-3 donasi-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                      <img src="{{$program->getFoto()}}" class="h-100 w-100 m-0 p-0 card-img">
                    </div>
                    <div class="col-md-7">
                      <div class="card-body">
                        <p class="card-text mb-2" style="font-size: 18px">Terima Kasih Atas Pendonasian Anda Untuk : </p>
                        <h5 class="card-title" style="font-size: 27px">{{$program->title}}</h5>
                        <p class="card-text"><small class="text-muted">Akan berakhir dalam {{$program->getHari()}} hari lagi</small></p>
                      </div>
                    </div>
                  </div>
            </div>
            
            <div class="donasi-card" style="border-radius: 5px">
                <div class="tq text-white bg-info" style="border-radius: 5px">
                    <h5 style="font-size: 18px" class="font-weight-bold text-center p-2">Donasi Online</h5>
                </div>
               <img src="{{ asset('front/img/swr.svg') }}" alt="" class="mx-auto d-block w-50 mb-4">
                <div class="d-flex justify-content-between align-content-center align-items-center">
                    <div class="pg ml-4">
                        <span style="font-size: 15px" class="text-muted">Program</span>
                        <p style="font-size: 18px" class="text-info font-weight-bold">{{$program->title}}</p> 
                    </div>  
                    <div class="pg mr-4">
                        <span style="font-size: 15px" class="text-muted">Tanggal Donasi</span>
                        <p style="font-size: 18px" class="text-info font-weight-bold">{{$donatur->created_at->format('Y-m-d')}}</p> 
                    </div>
                </div>
                <div class="d-flex justify-content-between align-content-center align-items-center">
                    <div class="pg ml-4">
                        <span style="font-size: 15px" class="text-muted">Nama Donatur</span>
                        <p style="font-size: 18px" class="text-info font-weight-bold">{{$donatur->nama_donatur}}</p> 
                    </div>  
                    <div class="pg mr-4">
                        <span style="font-size: 15px" class="text-muted">Nominal Donasi</span>
                        <p style="font-size: 18px" class="text-info font-weight-bold">@currency($donatur->nominal_donasi)</p> 
                    </div>
                    
                </div>
                
                <hr class="mr-4 ml-4 mt-3">
                <p class="mr-4 ml-4 mt-3">Berapapun uang yang Anda berikan, itu akan sangat membantu bagi mereka yang membutuhkan, Terima Kasih telah berdonasi</p>
                <img src="{{ asset('front/img/barcode.svg') }}" alt="" class="w-50 mx-auto d-block"><br>
                
            </div><br>
            <button class="btn btn-info btn-md w-25 float-right" onclick="ss()"><i class="fa-solid fa-floppy-disk"></i>&nbsp; Save PNG</button>
        </div>
    </div>

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
        a.download = "donasi.png";
        a.href = canvas.toDataURL("image/png");
        a.click(); // MAY NOT ALWAYS WORK!
    });
    }
  </script>
</body>
</html>