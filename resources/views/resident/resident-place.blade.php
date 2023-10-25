@extends('resident.resident-layout.resident-app')

@section('content')

<div class="mt-5 py-3">

  <div class="container rounded bg-white p-0 mb-3 border shadow-sm">
    @if (!is_null($place->display_img))
      <div class="w-100 p-0">
        <img class="rounded-top w-100 object-fit-cover" src="{{ Storage::url($place->display_img) }}" style="height: 20rem;" alt="image">
      </div>
    @endif
    <div class="d-flex justify-content-between align-items-center p-4">
      <div>
        <h4 class="text-break">{{ $place->name }}</h4>
        <p class="m-0 text-secondary text-break"><small>{{ $place->location }}</small></p>
      </div>
      <div>
        <a href="{{ route('resident.home') }}" class="btn btn-success px-5 back-btn">Back</a>
      </div>
    </div>
  </div>

  <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
    <div class="text-wrap">
      <label class="form-label fw-bold">Description</label>
      <p class="text-break m-0" style="text-indent: 3rem">{{ $place->description }}</p>
    </div>
  </div>

  <div class="container mb-3">
    <div id="map" class="border rounded shadow w-100" style="height: 20rem;"></div>
  </div>

</div>

@endsection

@section('scripts')

  <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "{{ env('GOOGLE_MAPS_KEY') }}",
      v: "weekly",
      // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
      // Add other bootstrap parameters as needed, using camel case.
    });
  </script>

  <script>
    let map, infoWindow;

    async function initMap() {
      const latitude = parseFloat({{ Js::from($place->latitude) }});
      const longitude = parseFloat({{ Js::from($place->longitude) }});

      const position = { lat: latitude, lng: longitude };
      const { Map, InfoWindow } = await google.maps.importLibrary("maps");
      const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

      map = new Map(document.getElementById("map"), {
        center: position,
        zoom: 15,
        mapId: {{ Js::from($place->name) }},
      });

      const marker = new AdvancedMarkerElement({
        map: map,
        position: position,
        gmpDraggable: false,
        title: {{ Js::from($place->name) }},
      });
    }

    initMap();
  </script>

@endsection