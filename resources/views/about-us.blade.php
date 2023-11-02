@extends('website-layout')

@section('content')

  <main>
    <header class="py-2 px-4" style="background-color: #6B756D;">
      <h3 class="text-white">About Us</h3>
    </header>
    <div class="container my-3 py-3">
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="d-flex justify-content-center">
            <img class="object-fit-cover w-100 rounded captain-img" src="{{ Storage::url($captain->display_img) }}" alt="captain">
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="d-flex flex-column justify-content-center w-100 h-100">
            <div class="mb-4">
              <h3 class="m-0">{{ $captain->fname }} {{ $captain->mname }} {{ $captain->lname }} {{ $captain->sname }}</h3>
              <h6>Barangay Captain</h6>
            </div>
            <div>
              <div class="d-flex align-items-center gap-4 mb-2">
                <span class="material-symbols-outlined">mail</span>
                <p class="m-0">bgrynancayasan@gmail.com</p>
              </div>
              <div class="d-flex align-items-center gap-4 mb-2">
                <span class="material-symbols-outlined">phone_iphone</span>
                <p class="m-0">0916 532 2574</p>
              </div>
              <div class="d-flex align-items-center gap-4 mb-2">
                <span class="material-symbols-outlined">tty</span>
                <p class="m-0">(02) 8355-8341 / (02) 8405-1247</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <h4 class="mb-3">History of Barangay Nancayasan</h4>
        <hr>
      </div>
      <div class="row mb-3 gx-5">
        <div class="d-flex gap-3">
          <div id="history-btn" class="rounded py-2 px-4 bg-secondary text-white" style="background-color: #dfdfdf; cursor: pointer;">
            <p class="m-0">History</p>
          </div>
          <div id="mission-btn" class="rounded py-2 px-4" style="background-color: #dfdfdf; cursor: pointer;">
            <p class="m-0">Mission</p>
          </div>
          <div id="vision-btn" class="rounded py-2 px-4" style="background-color: #dfdfdf; cursor: pointer;">
            <p class="m-0">Vision</p>
          </div>
        </div>
      </div>
      <div id="history" class="row">
        <p>A big tree with wide spreading branches grew in the central part of the locality that people who had something to do work under its shade. Even herders of horse, carabao, and cows grouped under the tree to play and rest, people  split and planned rough pieces of lumber. At last bamboo shaving piled higher under the tree and left to be blown the wind. It was therefore referred to as NAGCAYASAN which was later change to NANCAYASAN. As Pangasinan word equivalent. It was founded In 1890. The first settlers were those of the Cuadro, Jacob, Goroza, Estrella, Andres, Bravo, Umipig, Cabacungan, Gutierrez, Ramos, Malbog, Estrada and Antolin Clans. Ambrosio Catubig was the first Teniente del Barrio. The three divisions of the barrio are Narvacan, Bantog and Casantacruzan, named after the towns where the first inhabitants came from Ilocos Sur.</p>
        <p>It raises rice, corn, Mango, vegetables and other products like bamboo and coconuts. The people also raises chickens and pigs. Some are engaged in milking rice, carpentry, waving of barac-barac, traveling bag and slippers white some are good auto mechanics.</p>
        <p>The establishments of Rural High School in the place in 1965 is a great boon to education in the community.</p>
      </div>
      <div id="mission" class="row d-none">
        <p>Buong pusong gagawin ang aming sinumpaang tungkulin na maghandog ng makatotohanan at maka diyos na serbisyo sa pamamagitan ng paglapit sa mamamayan ng kanilang pangunahing pangangailangan, sa kalusugan, edukasyon, kalinisan, seguridad, kaayusan at maraming programang pangkabuhayan tungo sa pagsugpo ng kahirapan </p>
      </div>
      <div id="vision" class="row d-none">
        <p><em>Ang tapat na panglilingkod sa barangay at pagkakaisa ng mamamayan ay posibleng marating natin ang hinahangad na ginhawa ng buhay.</em></p>
      </div>
    </div>
  </main>

@endsection

@section('script')

  <script>

    const historyBtn = document.getElementById('history-btn');
    const missionBtn = document.getElementById('mission-btn');
    const visionBtn = document.getElementById('vision-btn');
    const history = document.getElementById('history');
    const mission = document.getElementById('mission');
    const vision = document.getElementById('vision');

    historyBtn.addEventListener('click', () => {
      history.classList.remove('d-none');
      mission.classList.add('d-none');
      vision.classList.add('d-none');

      historyBtn.classList.add('bg-secondary');
      missionBtn.classList.remove('bg-secondary');
      visionBtn.classList.remove('bg-secondary');

      historyBtn.classList.add('text-white');
      missionBtn.classList.remove('text-white');
      visionBtn.classList.remove('text-white');
    });

    missionBtn.addEventListener('click', () => {
      mission.classList.remove('d-none');
      history.classList.add('d-none');
      vision.classList.add('d-none');

      missionBtn.classList.add('bg-secondary');
      historyBtn.classList.remove('bg-secondary');
      visionBtn.classList.remove('bg-secondary');

      missionBtn.classList.add('text-white');
      historyBtn.classList.remove('text-white');
      visionBtn.classList.remove('text-white');
    });

    visionBtn.addEventListener('click', () => {
      vision.classList.remove('d-none');
      history.classList.add('d-none');
      mission.classList.add('d-none');

      visionBtn.classList.add('bg-secondary');
      historyBtn.classList.remove('bg-secondary');
      missionBtn.classList.remove('bg-secondary');

      visionBtn.classList.add('text-white');
      historyBtn.classList.remove('text-white');
      missionBtn.classList.remove('text-white');
    });

  </script>

@endsection