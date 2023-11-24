<div class="py-5 px-3">

  @if (is_null($place))
    <div class="container container-sm">
      <form id="submit-form">
        <div class="row mb-3">
          <div class="col-lg-6">
            <label for="image" class="form-label fw-semibold">Image of your business</label>
            <input type="file" wire:model="business_image" accept="image/*" class="form-control form-control-sm">
            @error('business_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="biz-name" class="form-label fw-semibold">Name of Business</label>
            <input type="text" wire:model.defer="business_name" id="biz-name" class="form-control">
            @error('business_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="type" class="form-label fw-semibold">Type</label>
            <select id="type" wire:model="type" class="form-select">
              <option value="">Choose one...</option>
              <option value="Mall">Mall</option>
              <option value="Restaurant">Restaurant</option>
              <option value="Store">Store</option>
              <option value="Car Wash">Car Wash</option>
              <option value="Repair Shop">Repair Shop</option>
              <option value="Junk Shop">Junk Shop</option>
              <option value="Pharmacies">Pharmacies</option>
              <option value="Other">Other</option>
            </select>
            @error('type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            @if ($type === 'Other')
              <input id="other" wire:model.defer="other" class="form-control mt-3" placeholder="Please specify here..." rows="3">
              @error('other') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            @endif
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea id="description" wire:model.defer="description" class="form-control" rows="3"></textarea>
            @error('description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="add-location">Location</label>
            <div class="input-group">
              <input disabled wire:model.defer="location" id="add-location" type="text" class="form-control">
              <span id="location-btn" class="material-symbols-outlined input-group-text">location_on</span>
            </div>
            @error('coordinates') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
        </div>
        <div wire:ignore id="map" class="mb-4 rounded shadow-sm border" style="height: 400px"></div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success next-btn" wire:loading.attr="disabled">Submit</button>
        </div>
      </form>
    </div>
  @elseif (!is_null($place))
    @if (is_null($place->deleted_at))
      @if ($place->is_approved == true)
        <div class="w-100 d-flex gap-2 bg-secondary bg-opacity-25 py-2 px-4 mb-3 rounded">
          <span class="material-symbols-outlined text-success align-middle">check_circle</span>
          <p class="m-0">Your business was featured in places.</p>
        </div>
      @elseif ($place->is_approved == false && is_null($place->decline_msg))
        <div class="w-100 d-flex gap-2 bg-secondary bg-opacity-25 py-2 px-4 mb-3 rounded">
          <span class="material-symbols-outlined text-warning align-middle">pending</span>
          <p class="m-0">Your business was pending to be featured in places.</p>
        </div>
      @elseif ($place->is_approved == false && !is_null($place->decline_msg))
        <div class="w-100 d-flex gap-2 bg-secondary bg-opacity-25 py-2 px-4 mb-3 rounded">
          <span class="material-symbols-outlined text-danger align-middle">error</span>
          <p class="m-0">Sharing of location of you business has been declined due to this reason: {{ $place->decline_msg }}</p>
        </div>
      @endif
    @else
      <div class="w-100 d-flex gap-2 bg-secondary bg-opacity-25 py-2 px-4 mb-3 rounded">
        <span class="material-symbols-outlined text-danger align-middle">error</span>
        <p class="m-0">Your featured business in places was archived by the administrator.</p>
      </div>
    @endif
    @if ($editable === 0)
      <div class="container container-sm">
        <div class="d-flex justify-content-center mb-2">
          @if (!is_null($business_image))
            <img src="{{ Storage::url($business_image) }}" class="rounded object-fit-contain" style="width: 20rem; height: 20rem;" alt="image">
          @endif
        </div>
        <div class="d-flex justify-content-between mb-3">
          <i wire:click="edit" class="fa-solid fa-pen-to-square" style="cursor: pointer;"></i>
          <i id="delete-btn" class="fa-solid fa-trash text-danger" style="cursor: pointer;"></i>
        </div>
        <div class="row mb-3">
          <div class="col">
            <p class="mb-1 fw-semibold">Business Name</p>
            <div class="rounded border p-2">
              <p class="m-0 text-break">{{ $business_name }}</p>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <p class="mb-1 fw-semibold">Type</p>
            <div class="rounded border p-2">
              <p class="m-0 text-break">{{ $type === 'Other' ? $other : $type }}</p>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <p class="mb-1 fw-semibold">Location</p>
            <div class="rounded border p-2">
              <p class="m-0 text-break">{{ $location }}</p>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <p class="mb-1 fw-semibold">Description</p>
            <div class="rounded border p-2">
              <p class="m-0 text-break">{{ $description }}</p>
            </div>
          </div>
        </div>
        <div wire:ignore id="edit-map" class="mb-4 rounded shadow-sm border" style="height: 400px"></div>
      </div>
    @elseif ($editable === 1)
      <div class="container container-sm">
        <form id="update-form">
          <div class="row mb-3">
            <div class="col-lg-6">
              <label for="image" class="form-label fw-semibold">Image of your business</label>
              <input type="file" wire:model="business_image" accept="image/*" class="form-control form-control-sm">
              @error('business_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="biz-name" class="form-label fw-semibold">Name of Business</label>
              <input type="text" wire:model.defer="business_name" id="biz-name" class="form-control">
              @error('business_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="type" class="form-label fw-semibold">Type</label>
              <select id="type" wire:model="type" class="form-select">
                <option value="">Choose one...</option>
                <option value="Mall">Mall</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Store">Store</option>
                <option value="Car Wash">Car Wash</option>
                <option value="Repair Shop">Repair Shop</option>
                <option value="Junk Shop">Junk Shop</option>
                <option value="Pharmacies">Pharmacies</option>
                <option value="Other">Other</option>
              </select>
              @error('type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              @if ($type === 'Other')
                <input id="other" wire:model.defer="other" class="form-control mt-3" placeholder="Please specify here..." rows="3">
                @error('other') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="description" class="form-label fw-semibold">Description</label>
              <textarea id="description" wire:model.defer="description" class="form-control" rows="3"></textarea>
              @error('description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="add-location">Location</label>
              <div class="input-group">
                <input disabled wire:model.defer="location" id="add-location" type="text" class="form-control">
                <span id="location-btn" class="material-symbols-outlined input-group-text">location_on</span>
              </div>
              @error('coordinates') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
          <div wire:ignore id="edit-map" class="mb-4 rounded shadow-sm border" style="height: 400px"></div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" wire:click="cancel" wire:loading.attr="disabled">Cancel</button>
            <button type="submit" class="btn btn-success next-btn" wire:loading.attr="disabled">Update</button>
          </div>
        </form>
      </div>
    @endif
  @endif

  @push('map')
    @if (is_null($place))
      <script>

        let map, infoWindow, editMap;
        
        // window.addEventListener('load', () => {
        //   navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        // });

        async function initMap() {
          // const position = { lat: latitude, lng: longitude };
          const { Map, InfoWindow } = await google.maps.importLibrary("maps");
          const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
          const geocoder = new google.maps.Geocoder();
          const editGeocoder = new google.maps.Geocoder();

          window.addEventListener('show-map', () => {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

            // callback functions for user's current location
            function successCallback(myPosition){
              let position = { lat: myPosition.coords.latitude, lng: myPosition.coords.longitude }
  
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
  
              const submitPost = document.getElementById('submit-form');
  
              if(submitPost){
                submitPost.addEventListener('submit', e => {
                  e.preventDefault();
                  Swal.fire({
                    title: 'Submit Post?',
                    text: "Are you sure you want to submit this post?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0e2c15dc',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Livewire.emit('submit');
                    }
                  });
                });
              }
            }

            function errorCallback(error){
              console.log(error);
            }
          });
        }

        initMap();

      </script>
    @elseif (!is_null($place))
      <script>

        let map, infoWindow, editMap;

        async function initMap() {
          const { Map, InfoWindow } = await google.maps.importLibrary("maps");
          const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
          const geocoder = new google.maps.Geocoder();
          const editGeocoder = new google.maps.Geocoder();

          // Edit Map
          window.addEventListener('edit-map', (data) => {
            const drag = Boolean(data.detail.drag);
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
              gmpDraggable: drag,
              title: "Nancayasan",
            });

            editMarker.addListener('dragend', function(){
              editGeocodeLatLng(editGeocoder, editMap, editMarker)
            });

            const updatePost = document.getElementById('update-form');
            const deleteBtn = document.getElementById('delete-btn');

            if(updatePost){
              updatePost.addEventListener('submit', e => {
                e.preventDefault();
                Swal.fire({
                  title: 'Update Post?',
                  text: "Are you sure you want to update this post?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#0e2c15dc',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    Livewire.emit('update');
                  }
                });
              });
            }

            if(deleteBtn){
              deleteBtn.addEventListener('click', e => {
                e.preventDefault();
                Swal.fire({
                  title: 'Delete Post?',
                  text: "Are you sure you want to delete this post? You can't revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#0e2c15dc',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    Livewire.emit('deletePost');
                  }
                });
              });
            }
          });
        }

        initMap();

      </script>
    @endif
  @endpush

</div>
