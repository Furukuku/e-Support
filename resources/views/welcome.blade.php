@extends('website-layout')

@section('content')

  <header class="d-flex w-100 p-0 website-header">
    <div class="w-50 d-flex justify-content-center align-items-center">
      <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg.png') }}" alt="logo" style="height: 15rem;">
    </div>
    <div class="w-50 d-flex flex-column justify-content-center pe-5">
      <h1 class="fw-bold text-white">Barangay Nancasayan</h1>
      <p class="text-white">There is no power for change greater than a community discovering what it cares about.</p>
      <div class="mt-3">
        <a href="#" class="btn btn-primary readmore-btn">Read more</a>
      </div>
    </div>
  </header>

  <main>
    <div class="py-5">

      <div>
        <h3 class="text-center">Meet Our Council</h3>
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('images/Illustrations/hiring.svg') }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('images/Illustrations/hiring.svg') }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('images/Illustrations/hiring.svg') }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      {{-- Programs --}}
      <span id="programs" class="program-anchor"></span>
      <div class="col px-5">
        <div class="row pt-4 pb-2">
          <h3 class="text-center">Programs</h3>
        </div>
        <div class="row justify-content-center">
          @forelse ($programs as $program)
            <div class="col-4">
              <a href="/program/{{ $program->id }}" class="link-underline link-underline-opacity-0">
                <div class="card bg-body rounded pointer pt-2 px-2">
                  <img class="program-height object-fit-contain rounded" src="{{ Storage::url($program->display_img) }}" alt="program">
                  <div class="card-body">
                    <h5 class="card-title text-center text-truncate">{{ $program->title }}</h5>
                  </div>
                </div>
              </a>
            </div>
          @empty
            <h6 class="text-center">No Programs</h6>
          @endforelse
        </div>
        {{-- <div class="row">
          <div class="col-4">
            <div class="card bg-body rounded pointer">
              <img class="program-height" src="{{ asset('images/programs/program1.png') }}" alt="program1">
              <div class="card-body">
                <h5 class="card-title text-center text-truncate">Basketball League</h5>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card bg-body rounded pointer">
              <img class="program-height" src="{{ asset('images/programs/program2.png') }}" alt="program1">
              <div class="card-body">
                <h5 class="card-title text-center text-truncate">Assembly day</h5>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card bg-body rounded pointer">
              <img class="program-height" src="{{ asset('images/programs/program3.png') }}" alt="program1">
              <div class="card-body">
                <h5 class="card-title text-center text-truncate">Operation Klaro Urdaneta City</h5>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="row-12 d-flex justify-content-center mt-5">
          @if($programs->isNotEmpty())
            <div class="col-2 text-center rounded py-1 more-programs shadow-sm">
              <a href="{{ url('/programs') }}" class="text-dark link-underline link-underline-opacity-0">See more programs</a>
            </div>
          @endif
        </div>
      </div>

      {{-- Places --}}
      <span id="places" class="places-anchor"></span>
      <div class="col px-5 py-5">
        <div class="row pt-4 pb-2">
          <h3 class="text-center">Places</h3>
        </div>
        @if($places->isNotEmpty())
          <div class="d-flex justify-content-center w-100">
            <div id="carouselExampleCaptions" class="carousel slide shadow-lg rounded carousel-container"  data-bs-ride="carousel">
              <div class="carousel-indicators">
                @foreach ($places as $index => $place)
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" {{ $index === 0 ? 'class=active' : '' }} aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
              </div>
              <div class="carousel-inner">
                @foreach ($places as $index => $place)
                  <a href="/place/{{ $place->id }}">
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                      <img style="height: 40rem" src="{{ Storage::url($place->display_img) }}" class="d-block w-100 object-fit-fill rounded" alt="...">
                      <div class="carousel-caption bg-light bg-opacity-25 w-100">
                        <h1 class="text-start text-black px-5 fw-bolder">{{ $place->name }}</h1>
                        <h4 class="text-start text-black px-5 fw-bolder text-truncate">{{ $place->location }}</h4>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
              @if ($places->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              @endif
            </div>
          </div>
        @else
          <h6 class="text-center">No Places</h6>
        @endif
        {{-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach ($places as $index => $place)
              @if ($index % 2 === 0)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} carousel-bg">
                  <div class="container-fluid d-flex justify-content-evenly">
                    <div class="text-center">
                      <img src="{{ asset(str_replace('public', 'storage', $place->display_img)) }}" class="img-width" alt="...">
                      <div>
                        <p>{{ $place->name }}</p>
                      </div>
                    </div>
                    @if (isset($places[$index + 1]))
                      <div class="text-center">
                        <img src="{{ asset(str_replace('public', 'storage', $places[$index + 1]->display_img)) }}" class="img-width" alt="...">
                      </div>
                    @endif
                  </div>
                </div>
              @endif
            @endforeach
          </div>
          <button id="carousel-btn-next" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button id="carousel-btn-prev" class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
        </div>       --}}
        {{-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach ($places as $index => $place)
              <div class="carousel-item {{ $index === 0 ? 'active' : '' }} carousel-bg">
                <div class="container-fluid d-flex justify-content-evenly">
                  <div class="text-center">
                    <img src="{{ asset(str_replace('public', 'storage', $place->display_img)) }}" class="img-width" alt="...">
                  </div>
                  <div class="text-center">
                    <img src="{{ asset(str_replace('public', 'storage', $place->display_img)) }}" class="img-width" alt="...">
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <button id="carousel-btn-next" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button id="carousel-btn-prev" class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div> --}}
        {{-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active carousel-bg">
              <div class="container-fluid d-flex justify-content-evenly">
                <div class="text-center">
                  <img src="{{ asset('images/places/place1.png') }}" class="img-width" alt="...">
                </div>
                <div class="text-center">
                  <img src="{{ asset('images/places/place2.png') }}" class="img-width" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item carousel-bg">
              <div class="container-fluid d-flex justify-content-evenly">
                <div class="">
                  <img src="{{ asset('images/programs/program2.png') }}" class="d-block mx-auto img-width" alt="...">
                </div>
                <div class="">
                  <img src="{{ asset('images/places/place2.png') }}" class="d-block mx-auto img-width" alt="...">
                </div>
              </div>
            </div>
            <div class="carousel-item carousel-bg">
              <div class="container-fluid d-flex justify-content-evenly">
                <div class="">
                  <img src="{{ asset('images/places/place1.png') }}" class="d-block mx-auto img-width" alt="...">
                </div>
                <div class="">
                  <img src="{{ asset('images/places/place2.png') }}" class="d-block mx-auto img-width" alt="...">
                </div>
              </div>
            </div>
          </div>
          <button id="carousel-btn-next" class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button id="carousel-btn-prev" class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div> --}}
        <div class="row-12 d-flex justify-content-center mt-5">
          @if($places->isNotEmpty())
            <div class="col-2 text-center rounded py-1 more-programs shadow-sm">
              <a href="{{ url('/places') }}" class="text-dark link-underline link-underline-opacity-0">See more places</a>
            </div>
          @endif
        </div>
      </div>

      {{-- Brgy. Officials --}}
      <span id="brgy-officials" class="officials-anchor"></span>
      <div class="col px-5">
        <div class="row pt-4 pb-2">
          <h3 class="text-center">Barangay Officials</h3>
        </div>
        <div class="row mt-2 mb-5 gap-1 justify-content-center">
        @forelse ($officials as $official)
          <div class="col-auto mb-4">
            <div class="card bg-body rounded shadow pt-2 px-4">
              <img class="program-height mx-auto rounded-pill" src="{{ Storage::url($official->display_img) }}" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">{{ $official->fname }} {{ $official->mname }} {{ $official->kname }} {{ $official->sname }}</h5>
                <hr class="mb-1">
                <p class="card-text text-center">{{ $official->position }}</p>
              </div>
            </div>
          </div>
          @empty
            <h6 class="text-center">No Barangay Officials</h6>
          @endforelse
        </div>
        {{-- <div class="row mt-2 mb-5">
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Basketball League</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Captain</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Basketball League</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Assembly day</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Operation Klaro Urdaneta City</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
        </div> --}}
        {{-- <div class="row my-5">
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Basketball League</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Basketball League</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Assembly day</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card bg-body rounded pointer">
              <img class="program-height mx-auto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="program1" style="height: 15rem; width: 15rem;">
              <div class="card-body pb-1">
                <h5 class="card-title text-center text-truncate">Operation Klaro Urdaneta City</h5>
                <hr class="mb-1">
                <p class="card-text text-center">Kagawad</p>
              </div>
            </div>
          </div>
        </div> --}}
      </div>

      <div class="container-fluid my-5 pt-5">
        <div class="row px-5">
          <div class="col">
            <div class="card p-4 shadow p-3 mb-5 bg-body-tertiary rounded">
              <div class="card-title">
                <h2 class="text-center">History</h2>
              </div>
              <div class="card-body mvh-card">
                <p class="text-center">
                  A big tree with wide spreading branches grew in the 
                  central part of the locality that people who had something to do work under its shade. Even herders of horse, carabao, and cows grouped under the tree to play and rest, people  split and planned rough pieces of lumber. At last bamboo shaving piled higher under the tree and left to be blown the wind. It was therefore referred to as NAGCAYASAN which was later change
                  to NANCAYASAN. As Pangasinan word equivalent. It was founded In 1890. The first settlers were those of the Cuadro, Jacob, Goroza, Estrella, Andres, Bravo, Umipig, Cabacungan, Gutierrez, Ramos, Malbog, 
                  Estrada and Antolin Clans. Ambrosio Catubig was the first Teniente del Barrio. The three divisions of the barrio are Narvacan, Bantog and Casantacruzan, named after the towns where the first inhabitants came from Ilocos Sur.
                  <br>
                  <br>
                  It raises rice, corn, Mango, vegetables and other products like bamboo and coconuts. The people also raises chickens and pigs. Some are engaged in milking rice, carpentry, waving of barac-barac, traveling bag and slippers white some are good auto mechanics.
                  <br>
                  <br>
                  The establishments of Rural High School in the place in 1965 is a great boon to education in the community.
                </p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <div class="card p-4 shadow p-3 mb-5 bg-body-tertiary rounded">
                <div class="card-title">
                  <h2 class="text-center">Vision</h2>
                </div>
                <div class="card-body mvh-card">
                  <p class="text-center">
                    ANG TAPAT NA PANGLILINGKOD SA BARANGAY AT PAGKAKAISA NG MAMAMAYAN AY POSIBLENG MARATING NATIN ANG HINAHANGAD NA GINHAWA NG BUHAY
                  </p>
                  <h2 class="text-center mt-5 pt-5">Mission</h2>
                  <p class="text-center">
                    BUONG PUSONG GAGAWIN ANG AMING SINUMPAANG TUNGKULIN NA MAGHANDOG NG MAKATOTOHANAN AT MAKA DIYOS NA SERBISYO SA PAMAMAGITAN NG PAGLAPIT SA MAMAMAYAN NG KANILANG PANGUNAHING PANGANGAILANGAN, SA KALUSUGAN, EDUKASYON, KALINISAN, SEGURIDAD, KAAYUSAN AT MARAMING PROGRAMANG PANGKABUHAYAN TUNGO SA PAGSUGPO NG KAHIRAPAN
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Location --}}
      <span id="location" class="location-anchor"></span>
      <div class="d-flex justify-content-center">
        <div class="card shadow p-1 mb-5 bg-body-tertiary rounded">
          <div class="card-body">
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3836.1410767501243!2d120.57392377438893!3d15.954007442513662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913efd2b8ba2b1%3A0xac2ed57018278646!2sNancayasan%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1688020838995!5m2!1sen!2sph" width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15344.643745226082!2d120.5678042380382!3d15.952969836799163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913ee33655b17f%3A0x339de728f9941f0a!2sNancayasan%2C%20Pangasinan!5e0!3m2!1sen!2sph!4v1690717553675!5m2!1sen!2sph" width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Contacts --}}
  <footer>
    <div class="container-fluid pt-3 d-flex flex-row justify-content-center gap-5 border-top border-secondary bg-light">
      <div class="contacts-containers">
        <div class="bg-warning rounded-pill mx-auto contact-icon-cont">
          <span class="material-symbols-outlined">
            mail
          </span>
        </div>
        <h4 class="text-center">Email</h4>
        <p class="text-center">brgynancayasan@gmail.com</p>
      </div>
      <div class="contacts-containers">
        <div class="bg-warning rounded-pill mx-auto contact-icon-cont">
          <span class="material-symbols-outlined">
            call
          </span>
        </div>
        <h4 class="text-center">Telephone</h4>
        <p class="text-center">(02) 8355-8341 / (02) 8405-1247</p>
      </div>
      <div class="contacts-containers">
        <div class="bg-warning rounded-pill mx-auto contact-icon-cont">
          <span class="material-symbols-outlined">
            phone_iphone
          </span>
        </div>
        <h4 class="text-center">Phone</h4>
        <p class="text-center">0916 532 2574</p>
      </div>
    </div>
  </footer>

@endsection