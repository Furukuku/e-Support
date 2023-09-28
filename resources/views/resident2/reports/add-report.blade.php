@extends('resident2.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="container w-50 docs-form-container">
      <div class="row docs-form-header justify-content-center rounded py-3 mb-3">
        <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mb-3">
          <span class="material-symbols-outlined fs-2">
            report
          </span>
        </div>
        <h5 class="text-center text-white">Your Case Report!</h5>
      </div>
      <div class="row">
        <form id="report-form" class="biz-clearance-form" action="{{ route('resident.report') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="report" class="form-label px-0">King of Report</label>
            <select name="kind_of_report" class="form-select" id="report">
              <option value="">Choose One...</option>
              <option value="Vehicle Accident" {{ old('kind_of_report') == 'Vehicle Accident' ? 'selected' : '' }}>Vehicle Accident</option>
              <option value="Drag Racing" {{ old('kind_of_report') == 'Drag Racing' ? 'selected' : '' }}>Drag Racing</option>
              <option value="Stoning of Car" {{ old('kind_of_report') == 'Stoning of Car' ? 'selected' : '' }}>Stoning of Car</option>
              <option value="Complaint" {{ old('kind_of_report') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
              <option value="Calamity" {{ old('kind_of_report') == 'Calamity' ? 'selected' : '' }}>Calamity</option>
              <option value="Others" {{ old('kind_of_report') == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('kind_of_report') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="zone" class="form-label px-0">Zone</label>
            <select id="zone" class="form-select" name="zone">
              <option value="">Choose one...</option>
              @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}"
                @if (old('zone') == $i)
                  selected
                @endif
                >{{ $i }}</option>
              @endfor
            </select>
            @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="photo" class="form-label px-0">Photo <span style="font-size: 0.80rem;">(Insert a photo of your report)</span></label>
            <input type="file" accept="image/*" id="photo" class="form-control form-control-sm mb-2" name="photo">
            @error('photo') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="d-flex gap-2 align-items-center">
            <button type="button" id="current-location" class="btn btn-light border d-flex align-items-center justify-content-center"><span class="material-symbols-outlined">location_on</span></button>
            <label for="current-location" style="font-size: 0.80rem; cursor: pointer;">Get current location</label>
          </div>
          <div class="row mb-3">
            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
            @error('latitude') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
            {{-- <input type="hidden" name="timestamp" id="timestamp" value="{{ old('timestamp') }}">
            @error('timestamp') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror --}}
          </div>
          <div class="row mb-3">
            <label for="description" class="form-label px-0">Description</span></label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            @error('description') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <button type="submit" class="btn text-white my-4 rounded-pill px-4">Submit</button>
        </form>
      </div>
    </div>

  </div>

@endsection

@section('scripts')

  <script>

    const currentLoc = document.getElementById('current-location');

    currentLoc.addEventListener('click', getCurrentLocation);

    function getCurrentLocation(){
      navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(position){
      const lat = document.getElementById('latitude');
      const long = document.getElementById('longitude');
      // const time = document.getElementById('timestamp');

      lat.value = position.coords.latitude;
      long.value = position.coords.longitude;
      // const date = new Date(position.timestamp);
      // const formattedTime = date.toLocaleString();
      // time.value = formattedTime;
    }

    function errorCallback(error){
      console.log(error);
    }

    document.getElementById('report-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Send a Report?',
        text: "Are you sure you want to submit this report?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#report-form').submit();
        }
      });
    });

  </script>

@endsection