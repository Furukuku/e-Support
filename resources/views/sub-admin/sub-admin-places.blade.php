@extends('sub-admin.sub-admin-layout.sub-admin-app')

@section('content')

  @livewire('sub-admin.places')

@endsection

@section('script')

  {{-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoUJVwS2RDOO2bxpfOylXdpzf01el8oZE&callback=initMap"></script> --}}
  <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "AIzaSyCoUJVwS2RDOO2bxpfOylXdpzf01el8oZE",
      v: "weekly",
      // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
      // Add other bootstrap parameters as needed, using camel case.
    });
  </script>
  <script>

    let map, infoWindow, editMap;

    async function initMap() {
      const position = { lat: 15.95401469803549, lng: 120.57649556649716 };
      const { Map, InfoWindow } = await google.maps.importLibrary("maps");
      const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
      // const { AutocompleteService } = await google.maps.importLibrary("places");
      // const {Place} = await google.maps.importLibrary("places");
      const geocoder = new google.maps.Geocoder();
      const editGeocoder = new google.maps.Geocoder();

      map = new Map(document.getElementById("map"), {
        center: position,
        zoom: 15,
        mapId: "map",
      });

      const marker = new AdvancedMarkerElement({
        map: map,
        position: position,
        gmpDraggable: true,
        title: "Nancayasan",
      });

      marker.addListener('dragend', function(){
        geocodeLatLng(geocoder, map, marker)
      });


      // Edit Map Modal
      window.addEventListener('edit-modal', (data) => {
        const latitude = parseFloat(data.detail.lat);
        const longitude = parseFloat(data.detail.lng);
        const editPosition = { lat: latitude, lng: longitude };

        editMap = new Map(document.getElementById("edit-map"), {
          center: editPosition,
          zoom: 15,
          mapId: "editMap",
        });
  
        const editMarker = new AdvancedMarkerElement({
          map: editMap,
          position: editPosition,
          gmpDraggable: true,
          title: "Nancayasan",
        });
  
        editMarker.addListener('dragend', function(){
          editGeocodeLatLng(editGeocoder, editMap, editMarker)
        });

      });

      // // Create an Autocomplete input field
      // const input = document.getElementById('search-place');
      // // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      // const autocomplete = new google.maps.places.Autocomplete(input);

      // // When a place is selected from the Autocomplete dropdown
      // autocomplete.addListener('place_changed', function () {
      //     const place = autocomplete.getPlace();
      //     if (place.geometry) {
      //         map.setCenter(place.geometry.location);
      //         marker.position = place.geometry.location;
      //         Livewire.emit('convertLocToGeo', place.geometry.location.lat(), place.geometry.location.lng(), place.geometry.location);
      //     }
      // });
      // let sample = $("#autocomplete-container").append(".pac-container");
      // console.log(sample);

      // marker.addListener('dragend', function(){
      //   const dragLat = marker.position.lat;
      //   const dragLng = marker.position.lng;
        
      //   $.ajax({
      //     url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + dragLat + ',' + dragLng + '&key=AIzaSyCoUJVwS2RDOO2bxpfOylXdpzf01el8oZE',
      //     type: 'GET',
      //     success: function(result, status){
      //       if(status == 'success'){
      //         const location = result.results[0].geometry.location;
      //         const lat = result.results[0].geometry.location.lat;
      //         const lng = result.results[0].geometry.location.lng;
      //         const address = result.results[0].formatted_address;

      //         $('#add-location').val(address);
      //         Livewire.emit('convertLocToGeo', lat, lng, location);
      //       }
      //     },
      //     error: function(xhr,status,error){
      //       console.log(error);
      //     },
      //   });
      // });

      // $('#add-location').on('focusout', function(){
      // // $('#add-location').on('keyup', function(){
      //   const inputLoc = document.getElementById('add-location').value;
      //   // const inputVal = inputLoc == '' ? 'Nancayasan Barangay Hall' : inputLoc;
      //   if(inputLoc != '' && inputLoc != null){
      //     $.ajax({
      //       url: 'https://maps.googleapis.com/maps/api/geocode/json?address=' + inputLoc + '&key=AIzaSyCoUJVwS2RDOO2bxpfOylXdpzf01el8oZE',
      //       type: 'GET',
      //     })
      //     .done(function(result) {
      //       if (result && result.results && result.results.length > 0 && result.results[0].geometry) {
      //         const location = result.results[0].geometry.location;
      //         const lat = result.results[0].geometry.location.lat;
      //         const lng = result.results[0].geometry.location.lng;
      //         const address = result.results[0].formatted_address;
  
      //         marker.position = location;
      //         map.setCenter(location);
      //         $('#add-location').val(address);
  
      //         Livewire.emit('convertLocToGeo', lat, lng, location);
      //       } else {
      //         console.log("Error: Invalid response or address.");
      //       }
      //     })
      //     .fail(function(jqXHR, textStatus, errorThrown) {
      //       console.log("Error: " + textStatus, errorThrown);
      //     });
      //   }else{
      //     Livewire.emit('convertLocToGeo', null, null, null);
      //   }
      // });
    }


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

    window.addEventListener('close-modal', () => {
      $('#addPlace').modal('hide');
      $('#updatePlace').modal('hide');
      $('#archivePlace').modal('hide');
    });
    
  </script>

@endsection