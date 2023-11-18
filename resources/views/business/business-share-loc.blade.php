@extends('business.business-layout.business-app')

@section('content')

  @livewire('business.share-location')

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
  @if (session('success'))
  <script>
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
      title: "{{ session('success') }}",
      color: '#fff',
    });
  </script>
@endif

  @stack('map')
  <script>

    // let map, infoWindow, editMap;

    // async function initMap() {
    //   const position = { lat: 15.95401469803549, lng: 120.57649556649716 };
    //   const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    //   const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    //   const geocoder = new google.maps.Geocoder();
    //   const editGeocoder = new google.maps.Geocoder();

    //   window.addEventListener('show-map', () => {
    //     map = new Map(document.getElementById("map"), {
    //       center: position,
    //       zoom: 15,
    //       mapId: "map",
    //     });
  
    //     const marker = new AdvancedMarkerElement({
    //       map: map,
    //       position: position,
    //       gmpDraggable: true,
    //       title: "Nancayasan",
    //     });
  
    //     marker.addListener('dragend', function(){
    //       geocodeLatLng(geocoder, map, marker)
    //     });
    //   });


    //   // Edit Map
    //   window.addEventListener('edit-map', (data) => {
    //     const latitude = parseFloat(data.detail.lat);
    //     const longitude = parseFloat(data.detail.lng);
    //     const editPosition = { lat: latitude, lng: longitude };

    //     editMap = new Map(document.getElementById("edit-map"), {
    //       center: editPosition,
    //       zoom: 15,
    //       mapId: "editMap",
    //     });

    //     const editMarker = new AdvancedMarkerElement({
    //       map: editMap,
    //       position: editPosition,
    //       gmpDraggable: true,
    //       title: "Nancayasan",
    //     });

    //     editMarker.addListener('dragend', function(){
    //       editGeocodeLatLng(editGeocoder, editMap, editMarker)
    //     });

    //   });
    // }

    window.addEventListener('reload-page', () => {
      location.reload(true);
    });

    window.addEventListener('load', () => {
      Livewire.emit('showData');
    });

    function geocodeLatLng(geocoder, map, marker) {
      const latlng = marker.position;

      geocoder
        .geocode({ location: latlng })
        .then((response) => {
          if (response.results[0]) {
            const address = response.results[0].formatted_address;
            const dragLat = latlng.lat;
            const dragLng = latlng.lng;

            // $('#add-location').val(address);
            Livewire.emit('convertLocToGeo', dragLat, dragLng, latlng, address);
          } else {
            window.alert("No results found");
          }
        })
        .catch((e) => window.alert("Geocoder failed due to: " + e));
    }


    function editGeocodeLatLng(editGeocoder, editMap, editMarker) {
      const latlng = editMarker.position;

      editGeocoder
        .geocode({ location: latlng })
        .then((response) => {
          if (response.results[0]) {
            const address = response.results[0].formatted_address;
            const dragLat = latlng.lat;
            const dragLng = latlng.lng;

            // $('#add-location').val(address);
            Livewire.emit('convertLocToGeo', dragLat, dragLng, latlng, address);
          } else {
            window.alert("No results found");
          }
        })
        .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

    initMap();


    window.addEventListener('load', () => {
      Livewire.emit('showData');
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