@extends('resident.resident-layout.resident-app')

@section('content')

  <div class="py-5 d-flex justify-content-center">

    <div class="container py-3 row justify-content-center view-report-container">
      @if ($report->status === 'Pending')
        <div id="preview-img-container" class="col rounded py-3 mb-3">
          @foreach ($report->images as $image)
            <img class="object-fit-contain border rounded mb-2" src="{{ Storage::url($image->image) }}" alt="preview-image" style="max-width: 100%;">
          @endforeach
        </div>
        <div class="col">
          <form id="report-form" class="biz-clearance-form" action="{{ route('resident.update-report', ['report' => $report]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row mb-3">
              <label for="report" class="form-label px-0">Kind of Report</label>
              <select name="kind_of_report" class="form-select" id="report">
                <option value="">Choose One...</option>
                <option value="Vehicle Accident" {{ old('kind_of_report', $report->report_name) == 'Vehicle Accident' ? 'selected' : '' }}>Vehicle Accident</option>
                <option value="Calamity and Disaster" {{ old('kind_of_report', $report->report_name) == 'Calamity and Disaster' ? 'selected' : '' }}>Calamity and Disaster</option>
                <option value="Illegal Gambling" {{ old('kind_of_report', $report->report_name) == 'Illegal Gambling' ? 'selected' : '' }}>Illegal Gambling</option>
                <option value="Child Abuse" {{ old('kind_of_report', $report->report_name) == 'Child Abuse' ? 'selected' : '' }}>Child Abuse</option>
                <option value="Community Cleanliness" {{ old('kind_of_report', $report->report_name) == 'Community Cleanliness' ? 'selected' : '' }}>Community Cleanliness</option>
                <option value="Public Safety Concern" {{ old('kind_of_report', $report->report_name) == 'Public Safety Concern' ? 'selected' : '' }}>Public Safety Concern</option>
                <option value="Late-Night Karaoke Disturbance" {{ old('kind_of_report', $report->report_name) == 'Late-Night Karaoke Disturbance' ? 'selected' : '' }}>Late-Night Karaoke Disturbance</option>
                <option value="Environmental Hazard" {{ old('kind_of_report', $report->report_name) == 'Environmental Hazard' ? 'selected' : '' }}>Environmental Hazard</option>
                <option value="Infrastructure Problems" {{ old('kind_of_report', $report->report_name) == 'Infrastructure Problems' ? 'selected' : '' }}>Infrastructure Problems</option>
                <option value="Drag Racing" {{ old('kind_of_report', $report->report_name) == 'Drag Racing' ? 'selected' : '' }}>Drag Racing</option>
                <option value="Stoning of Car" {{ old('kind_of_report', $report->report_name) == 'Stoning of Car' ? 'selected' : '' }}>Stoning of Car</option>
                <option value="Complaint" {{ old('kind_of_report', $report->report_name) == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                <option value="Others" {{ old('kind_of_report', $report->report_name) == 'Others' ? 'selected' : '' }}>Others</option>
              </select>
              @error('kind_of_report') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              <input type="text" id="other" class="form-control mt-2 d-none" value="{{ old('others', $report->report_name) }}" name="others" placeholder="Please specify your report here...">
              @error('others') <span class="error text-danger px-0 d-none" id="others-error" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-3">
              <label for="zone" class="form-label px-0">Zone</label>
              <select id="zone" class="form-select" name="zone">
                <option value="">Choose one...</option>
                @for ($i = 1; $i <= 6; $i++)
                  <option value="{{ $i }}"
                  @if (old('zone', $report->zone) == $i)
                    selected
                  @endif
                  >{{ $i }}</option>
                @endfor
              </select>
              @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-3">
              <label for="photo" class="form-label px-0">Photo <span style="font-size: 0.80rem;">(Insert photo of your report)</span></label>
              <input type="file" accept="image/*" id="photo" class="form-control form-control-sm mb-2" name="photo[]" multiple>
              @error('photo') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div id="map" class="shadow-sm border rounded" style="height: 300px; width: 100%;"></div>
            <span id="map-error" class="error text-danger px-0 d-none" style="font-size: 0.75rem">Location must be inside Urdaneta City.</span>
            <div class="row mb-3">
              <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $report->latitude) }}">
              @error('latitude') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $report->longitude) }}">
            </div>
            <div class="row mb-3">
              <label for="description" class="form-label px-0">Description</span></label>
              <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $report->description) }}</textarea>
              @error('description') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-between my-4">
              <a href="{{ route('resident.services') }}" class="btn btn-secondary rounded-pill px-4 d-none back-btn">Back</a>
              <button type="submit" class="btn text-white rounded-pill px-4 report-update-btn">Update</button>
            </div>
          </form>
        </div>
      @else
        <div class="col rounded py-3 mb-3">
          @foreach ($report->images as $image)
            <img class="object-fit-contain border rounded mb-2" src="{{ Storage::url($image->image) }}" alt="preview-image" style="max-width: 100%;">
          @endforeach
        </div>
        <div class="col py-3">
          <div class="row mb-3">
            <h5 class="mb-1 px-0 fw-bold">Kind of Report</h5>
            <div class="border rounded p-2">
              <p class="m-0 text-break">{{ $report->report_name }}</p>
            </div>
          </div>
          <div class="row mb-3">
            <p class="mb-1 px-0 fw-bold">Zone</p>
            <div class="border rounded p-2">
              <p class="m-0 text-break">{{ $report->zone }}</p>
            </div>
          </div>
          <div id="map" class="shadow-sm border rounded mb-3" style="height: 300px; width: 100%;"></div>
          <div class="row mb-3">
            <p class="fw-bold px-0 mb-1">Description</p>
            <div class="border rounded p-2">
              <p class="m-0 text-break" style="text-indent: 20px;">{{ $report->description }}</p>
            </div>
          </div>
          <div class="d-flex justify-content-start">
            <a href="{{ route('resident.services') }}" class="btn btn-secondary rounded-pill px-4 d-none back-btn">Back</a>
          </div>
        </div>
      @endif
    </div>

  </div>

@endsection

@section('scripts')
  <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "{{ env('GOOGLE_MAPS_KEY') }}",
      v: "weekly",
    });
  </script>

  @if ($report->status === 'Pending')
    <script>

      const photo = document.getElementById('photo');
      const previewImgContainer = document.getElementById('preview-img-container');

      const report = document.getElementById('report');
      const other = document.getElementById('other');
      const othersErr = document.getElementById('others-error');

      report.addEventListener('change', () => {
        if(report.value === 'Others'){
          other.classList.remove('d-none');
          if(othersErr){
            othersErr.classList.remove('d-none');
          }
        }else{
          other.classList.add('d-none');
          if(othersErr){
            othersErr.classList.add('d-none');
          }
          other.value = '';
        }
      });

      window.addEventListener('load', () => {
        // check if the kind of report field have an old value of others
        switch (report.value){
          case 'Vehicle Accident':
            report.value = report.value;
            other.value = '';
            break;
          case 'Calamity and Disaster': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Illegal Gambling':
            report.value = report.value;
            other.value = '';
            break;
          case 'Child Abuse': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Community Cleanliness': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Public Safety Concern': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Late-Night Karaoke Disturbance': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Environmental Hazard': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Infrastructure Problems': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Drag Racing': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Stoning of Car': 
            report.value = report.value;
            other.value = '';
            break;
          case 'Complaint': 
            report.value = report.value;
            other.value = '';
            break;
          default:
            other.value = other.value;
            report.value = 'Others';
            other.classList.remove('d-none');
            if(othersErr){
              othersErr.classList.remove('d-none');
            }
        }


        // check if the input field have an old value otherwise get/ask for users permission for his current location when the page loaded
        if(latitude.value !== ''){
          const lat = parseFloat(latitude.value);
          const lng = parseFloat(longitude.value);
          initMap(lat, lng);
        }else{
          navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }
      });

      photo.addEventListener('change', e => {
        const files = e.target.files;
        
        // Clear previous previews
        previewImgContainer.innerHTML = '';

        for (const file of files) {
          const reader = new FileReader();

          reader.onload = function(event) {
            const previewImg = document.createElement('img');
            previewImg.src = event.target.result;
            previewImg.classList.add('object-fit-contain', 'border', 'rounded', 'mb-2');
            previewImg.style.maxWidth = "100%";
            previewImgContainer.appendChild(previewImg);
          };

          reader.readAsDataURL(file);
        }
      });

      // document.getElementById('report-form').addEventListener('submit', e => {
      //   e.preventDefault();
      //   Swal.fire({
      //     title: 'Update Report?',
      //     text: "Are you sure you want to update this report?",
      //     icon: 'warning',
      //     showCancelButton: true,
      //     confirmButtonColor: '#0e2c15dc',
      //     cancelButtonColor: '#d33',
      //     confirmButtonText: 'Yes!'
      //   }).then((result) => {
      //     if (result.isConfirmed) {
      //       $('#report-form').submit();
      //     }
      //   });
      // });


      //displaying the google map
      let map;
      const latitude = document.getElementById('latitude');
      const longitude = document.getElementById('longitude');
      const errorMsg = document.getElementById('map-error');
      const submitBtn = document.getElementById('submit-btn');

      const urdanetaCityCoords = [
        {lng: 120.5487, lat: 15.9442}, 
        {lng: 120.5223, lat: 15.9333}, 
        {lng: 120.5079, lat: 15.9253}, 
        {lng: 120.5002, lat: 15.9417}, 
        {lng: 120.4984, lat: 15.9656}, 
        {lng: 120.4927, lat: 15.9799}, 
        {lng: 120.4853, lat: 15.9901}, 
        {lng: 120.4745, lat: 15.9975}, 
        {lng: 120.4766, lat: 15.9983}, 
        {lng: 120.4853, lat: 15.9952}, 
        {lng: 120.494, lat: 16.003}, 
        {lng: 120.4968, lat: 16.0087}, 
        {lng: 120.5007, lat: 16.0097}, 
        {lng: 120.5144, lat: 16.0103}, 
        {lng: 120.5292, lat: 16.0076}, 
        {lng: 120.5374, lat: 16.0109}, 
        {lng: 120.5385, lat: 16.009}, 
        {lng: 120.5546, lat: 16.0057}, 
        {lng: 120.5716, lat: 16.0159}, 
        {lng: 120.626, lat: 16.0125}, 
        {lng: 120.6293, lat: 16.0098}, 
        {lng: 120.6305, lat: 16.0054}, 
        {lng: 120.6301, lat: 15.9789}, 
        {lng: 120.6313, lat: 15.9708}, 
        {lng: 120.6298, lat: 15.9548}, 
        {lng: 120.5969, lat: 15.9524}, 
        {lng: 120.5487, lat: 15.9442},
      ];

      const nancayasanCoords = [
        {lng: 120.5763, lat: 15.9703}, 
        {lng: 120.578, lat: 15.9647}, 
        {lng: 120.5863, lat: 15.9542}, 
        {lng: 120.5876, lat: 15.9503}, 
        {lng: 120.5624, lat: 15.9462}, 
        {lng: 120.5662, lat: 15.9609}, 
        {lng: 120.5659, lat: 15.9653}, 
        {lng: 120.5614, lat: 15.9683}, 
        {lng: 120.5763, lat: 15.9703},
      ];

      async function initMap(latitude, longitude) {
        const { Map, Polygon } = await google.maps.importLibrary("maps");
        const { Marker } = await google.maps.importLibrary("marker");
        const { poly } = await google.maps.importLibrary("geometry");

        let position = {lng: longitude , lat: latitude}

        map = new Map(document.getElementById("map"), {
          center: position,
          zoom: 15,
          mapId: 'Urdaneta',
        });

        let marker = new Marker({
          map: map,
          position: position,
          title: 'Urdaneta',
          draggable: true,
        });

        const urdaneta = new Polygon({
          paths: urdanetaCityCoords,
          strokeColor: '#0E2C15',
          strokeOpacity: 0.7,
          strokeWeight: 3,
          fillColor: '#0E2C15',
          fillOpacity: 0.25,
        });

        marker.addListener('dragend', e => {
          setCoordsInForm(e.latLng);
          checIfInsideUrdaneta(e.latLng, urdaneta);
        });

        map.addListener('click', e => {
          marker.setPosition(e.latLng);
          setCoordsInForm(e.latLng);
          checIfInsideUrdaneta(e.latLng, urdaneta);
        });

        urdaneta.addListener('click', e => {
          marker.setPosition(e.latLng);
          setCoordsInForm(e.latLng);
          checIfInsideUrdaneta(e.latLng, urdaneta);
        });


        urdaneta.setMap(map);

        checIfInsideUrdaneta(position, urdaneta);
      }


      // callback functions for user's current location
      function successCallback(position){
        latitude.value = position.coords.latitude;
        longitude.value = position.coords.longitude;

        initMap(position.coords.latitude, position.coords.longitude);

      }

      function errorCallback(error){
        console.log(error);
      }


      // function for setting the coordinates in input field
      function setCoordsInForm(latLng){
        latitude.value = latLng.lat();
        longitude.value = latLng.lng();
      }


      // check if the location is inside or outside the urdaneta
      function checIfInsideUrdaneta(position, urdaneta){
        document.getElementById('report-form').addEventListener('submit', e => {
          e.preventDefault();
          Swal.fire({
            title: 'Update Report?',
            text: "Are you sure you want to update this report?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0e2c15dc',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed && google.maps.geometry.poly.containsLocation(position, urdaneta)) {
              $('#report-form').submit();
            }else if(result.isConfirmed && !google.maps.geometry.poly.containsLocation(position, urdaneta)){
              errorMsg.classList.remove('d-none');
            }
          });
        });
      }

    </script>
  @else
    <script>

      let map;

      const urdanetaCityCoords = [
        {lng: 120.5487, lat: 15.9442}, 
        {lng: 120.5223, lat: 15.9333}, 
        {lng: 120.5079, lat: 15.9253}, 
        {lng: 120.5002, lat: 15.9417}, 
        {lng: 120.4984, lat: 15.9656}, 
        {lng: 120.4927, lat: 15.9799}, 
        {lng: 120.4853, lat: 15.9901}, 
        {lng: 120.4745, lat: 15.9975}, 
        {lng: 120.4766, lat: 15.9983}, 
        {lng: 120.4853, lat: 15.9952}, 
        {lng: 120.494, lat: 16.003}, 
        {lng: 120.4968, lat: 16.0087}, 
        {lng: 120.5007, lat: 16.0097}, 
        {lng: 120.5144, lat: 16.0103}, 
        {lng: 120.5292, lat: 16.0076}, 
        {lng: 120.5374, lat: 16.0109}, 
        {lng: 120.5385, lat: 16.009}, 
        {lng: 120.5546, lat: 16.0057}, 
        {lng: 120.5716, lat: 16.0159}, 
        {lng: 120.626, lat: 16.0125}, 
        {lng: 120.6293, lat: 16.0098}, 
        {lng: 120.6305, lat: 16.0054}, 
        {lng: 120.6301, lat: 15.9789}, 
        {lng: 120.6313, lat: 15.9708}, 
        {lng: 120.6298, lat: 15.9548}, 
        {lng: 120.5969, lat: 15.9524}, 
        {lng: 120.5487, lat: 15.9442},
      ];

      async function initMap(latitude, longitude) {
        const { Map, Polygon } = await google.maps.importLibrary("maps");
        const { Marker } = await google.maps.importLibrary("marker");

        let position = {lng: longitude , lat: latitude}

        map = new Map(document.getElementById("map"), {
          center: position,
          zoom: 15,
          mapId: 'Urdaneta',
        });

        let marker = new Marker({
          map: map,
          position: position,
          title: 'Urdaneta',
          draggable: false,
        });

        const urdaneta = new Polygon({
          paths: urdanetaCityCoords,
          strokeColor: '#0E2C15',
          strokeOpacity: 0.7,
          strokeWeight: 3,
          fillColor: '#0E2C15',
          fillOpacity: 0.25,
        });

        urdaneta.setMap(map);
      }

      initMap(parseFloat({{ Js::from($report->latitude) }}), parseFloat({{ Js::from($report->longitude) }}));

    </script>
  @endif
@endsection