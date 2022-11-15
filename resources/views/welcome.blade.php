@extends('template.front')
@section('main_konten') 
<section id="recent-posts" class="recent-posts">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h2>Program Donasi</h2>
            <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
        </div>
        <div class="row gy-4">
          @foreach ($program as $dProgram)
          <div class="col-xl-4 col-md-6">
              <article>
                  <div class="post-img">
                      <img src="{{ asset('images/program-images/'.$dProgram->photo) }}" alt="" class="img-fluid">
                  </div>
                  <p class="post-category">Kategori Program</p>
                  <h2 class="title">
                  <a href="#" class="text-break">{{ $dProgram->title }}</a>
                  <br>
                  </h2>
                  <div class="progress mb-2">
                    <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: {{ ($dProgram->donation_collected / $dProgram->donation_target) * 100 }}%" aria-valuenow="{{ $dProgram->donation_collected }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="post-date">
                      @currency($dProgram->donation_collected)
                    </p>
                    <p class="post-date">
                      {{ $dProgram->getHari() }} Hari lagi
                    </p>
                  </div>
                  <div class="d-flex align-items-center justify-content-start">
                    <div class="post-meta">
                  </div>
                </div>
              </article>
          </div>
          @endforeach
        </div>
    </div>
  </section>
  <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>About Us</h2>
            <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
          </div>
  
          <div class="row gy-4">
            <div class="col-lg-6">
              <h3>Voluptatem dignissimos provident quasi corporis</h3>
              <img src="template/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
              <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
              <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p>
            </div>
            <div class="col-lg-6">
              <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                  <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                </p>
  
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->
  
      
@endsection 


