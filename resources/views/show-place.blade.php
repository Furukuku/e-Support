@extends('website-layout')

@section('content')

  <main>

    <div class="container bg-light shadow rounded my-5 p-5">
      <div class="d-flex flex-column align-items-center mb-5">
        <img class="object-fit-contain border rounded shadow-sm active-image" src="{{ Storage::url($place->display_img) }}" alt="">
        <p class="my-2 fw-medium">
          <i class="fa-solid fa-location-dot text-danger me-2"></i>
          {{ $place->location }}
        </p>
      </div>
      <div class="d-flex justify-content-center">
        <div class="w-75">
          <h2 class="text-uppercase">{{ $place->name }}</h2>
          <p class="p-3">{!! nl2br(e($place->description)) !!}</p>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div id="map" class="border rounded shadow"></div>
      </div>
    </div>

  </main>

@endsection

@section('script')

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