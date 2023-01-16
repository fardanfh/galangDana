@extends('template.front')
@section('main_konten')
    <br>
    <div class="container">
        <div class="row m-1">
            <div class="mb-3 donasi-card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="{{$program->getFoto()}}" class="card-img image-donasi">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text mb-2" style="font-size: 23px">Anda akan berdonasi untuk : </p>
                        <h5 class="card-title" style="font-size: 35px">{{$program->title}}</h5>
                        <p class="card-text"><small class="text-muted">Akan berakhir dalam {{$program->getHari()}} hari lagi</small></p>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="mb-3 donasi-card">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md m-0 p-0">
                            <img src="{{ asset('front/img/ppp.jpg') }}" class="card-img" width="100%" height="100%" alt="">
                        </div>
                        <div class="col-md">
                            
                            <form action="/donasi/{{$program->id}}/donasi/store" method="post">
                                {{ csrf_field() }}
                                <div class="form-donatur">
                                    <div class="container mt-4">
                                        <div class="container">
                                            <h5 class="card-text mb-4">Silahkan isi form dibawah ini</h5>
                                            <label class="sr-only" for="nominal">Nominal donasi</label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Rp</div>
                                                </div>
                                                <input type="number" name="nominal_donasi" min="1000" class="form-control" id="nominal" placeholder="Nominal Donasi" required>
                                            </div>
                                            <input type="hidden" name="program_id" value="{{$program->id}}">
            
                                            @if (Auth::check())
                                            <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input class="form-control" type="text" readonly name="nama_donatur" value="{{Auth::user()->name}}">
            
                                                <div class="form-check ml-1 mb-2">
                                                        <input id="check" type="checkbox" name="nama_donatur" class="form-check-input" value="Donatur">
                                                        <label for="check" class="form-check-label">Sembunyikan Nama Saya (Donatur)</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" readonly name="email" value="{{Auth::user()->email}}">
                                            </div>
            
                                            @else    
                                            <span class="card-text" style="font-size: 15px"><a href="/login" class="btn btn-sm btn-info mb-2">Masuk</a> atau lengkapi data dibawah ini</span>
                                            <div class="form-group">
                                                <input type="text" name="nama_donatur" class="form-control" placeholder="Nama Lengkap">
                    
                                                <div class="form-check ml-1 mb-2">
                                                    <input id="check" type="checkbox" name="nama_donatur" class="form-check-input" value="Donatur">
                                                    <label for="check" class="form-check-label" style="font-size: 15px">Sembunyikan Nama Saya (Donatur)</label>
                                                </div>
                    
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                                </div>
                                            @endif
                    
                                                <div class="form-group">
                                                    <textarea name="dukungan" rows="6" class="form-control" placeholder="Tulis Dukungan atau Do'a untuk Penggalangan Dana ini. Contoh: Cepet Sembuh, ya!"></textarea>
                                                </div>
                                            </div>
                                            <button class="btn btn-info form-control btn-lg" type="submit">Donasi Sekarang</button><br><br>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div><br>
@endsection



