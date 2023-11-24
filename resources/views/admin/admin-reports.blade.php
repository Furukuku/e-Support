@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.reports')

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

    window.addEventListener('set-location', coords => {
      let map;
  
      async function initMap() {
        const latitude = parseFloat(coords.detail.lat);
        const longitude = parseFloat(coords.detail.long);
        const position = { lat: latitude, lng: longitude };
        const { Map, InfoWindow } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  
        map = new Map(document.getElementById("map"), {
          center: position,
          zoom: 18,
          mapId: "map",
        });
  
        const marker = new AdvancedMarkerElement({
          map: map,
          position: position,
          gmpDraggable: false,
          title: coords.detail.name,
        });
      }

      initMap();
    });



    window.addEventListener('close-modal', () => {
      $('#viewReport').modal('hide');
    });


    window.addEventListener('successToast', e => {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      });

      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });

  </script>

@endsection