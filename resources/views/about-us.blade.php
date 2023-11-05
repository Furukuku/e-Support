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
                <p class="m-0">{{ !is_null($brgyInfos) ? $brgyInfos->email : '' }}</p>
              </div>
              <div class="d-flex align-items-center gap-4 mb-2">
                <span class="material-symbols-outlined">phone_iphone</span>
                <p class="m-0">{{ !is_null($brgyInfos) ? $brgyInfos->phone_no : '' }}</p>
              </div>
              <div class="d-flex align-items-center gap-4 mb-2">
                <span class="material-symbols-outlined">tty</span>
                <p class="m-0">{{ !is_null($brgyInfos) ? $brgyInfos->tel_no : '' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <h4 class="mb-3">History of Barangay Nancayasan</h4>
        <hr>
      </div>
      <div class="row mb-3">
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
        <p>{!! !is_null($brgyInfos) ? nl2br(e($brgyInfos->history)) : '' !!}</p>
      </div>
      <div id="mission" class="row d-none">
        <p>{!! !is_null($brgyInfos) ? nl2br(e($brgyInfos->mission)) : '' !!}</p>
      </div>
      <div id="vision" class="row d-none">
        <p><em>{!! !is_null($brgyInfos) ? nl2br(e($brgyInfos->vision)) : '' !!}</em></p>
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