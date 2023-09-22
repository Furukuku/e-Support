
{{-- Create Modal --}}
<form wire:submit.prevent="add" id="add-location-form" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="addPlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addPlaceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addPlaceLabel">Add Place</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="col p-3">
            <div class="row-auto mb-3">
              <label for="add-display-image" class="form-label">Display Picture</label>
              <input wire:model="display_image" id="add-display-image" type="file" class="form-control form-control-sm w-50" accept="image/*">
              @error('display_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label for="add-place-name">Name of Place</label>
              <input wire:model.defer="place_name" id="add-place-name" type="text" class="form-control">
              @error('place_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label for="add-type">Type</label>
              <select  wire:model="type" id="add-type" class="form-select">
                <option value="">Choose one...</option>
                <option value="Mall">Mall</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Store">Store</option>
                <option value="Car Wash">Car Wash</option>
                <option value="Repair Shop">Repair Shop</option>
                <option value="Junk Shop">Junk Shop</option>
                <option value="Pharmacies">Pharmacies</option>
                <option value="Others">Others</option>
              </select>
              @error('type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="row-auto mb-3">
              <label for="add-address">Address</label>
              <input wire:model.defer="address" id="add-address" type="text" class="form-control">
              @error('address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div> --}}
            <div class="row-auto mb-3">
              <label for="add-place-description">Description</label>
              <textarea wire:model.defer="place_description" class="form-control" id="add-place-description"></textarea>
              @error('place_description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label for="add-location">Location</label>
              <div class="input-group">
                <input disabled wire:model.defer="location" id="add-location" type="text" class="form-control">
                <span id="location-btn" class="material-symbols-outlined input-group-text" style="cursor: pointer;">location_on</span>
              </div>
              @error('coordinates') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            {{-- <div id="autocomplete-container">
              <input id="search-place" type="text" class="form-control row-4">
            </div> --}}
            <div wire:ignore id="map" style="height: 400px"></div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>


{{-- View Modal --}}
<div wire:ignore.self class="modal fade" id="viewPlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewPlaceLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewPlaceLabel">View Place</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="col p-3">
          <div class="row-auto mb-3">
            <div class="d-flex justify-content-center">
              @isset($view_display_image)
                <img class="object-fit-contain border rounded place-img" src="{{ Storage::url($view_display_image) }}" alt="">
              @endisset
            </div>
          </div>
          <div class="row-auto mb-3">
            <h6>Place Name</h6>
            <div class="rounded border border-1 p-2">
              <p class="m-0">{{ $place_name }}</p>
            </div>
          </div>
          <div class="row-auto mb-3">
            <h6>Type</h6>
            <div class="rounded border border-1 p-2">
              <p class="m-0">{{ $type }}</p>
            </div>
          </div>
          <div class="row-auto mb-3">
            <h6>Address</h6>
            <div class="rounded border border-1 p-2">
              <p class="m-0">{{ $location }}</p>
            </div>
          </div>
          <div class="row-auto mb-3">
            <h6>Description</h6>
            <div class="rounded border border-1 p-2">
              <p class="m-0">{!! nl2br(e($place_description)) !!}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
      </div>
    </div>
  </div>
</div>


{{-- Edit Modal --}}
<form wire:submit.prevent="update" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="updatePlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatePlaceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updatePlaceLabel">Edit Place</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="col p-3">
            <div class="row-auto mb-3">
              <label for="resident-display-image" class="form-label">Display Picture</label>
              <input wire:model="display_image" id="resident-display-image" type="file" class="form-control form-control-sm w-50" accept="image/*">
              @error('display_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label for="edit-place-name">Name of Place</label>
              <input wire:model.defer="place_name" id="edit-place-name" type="text" class="form-control">
              @error('place_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label for="edit-type">Type</label>
              <select  wire:model="type" id="edit-type" class="form-select">
                <option value="">Choose one...</option>
                <option value="Mall">Mall</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Store">Store</option>
                <option value="Car Wash">Car Wash</option>
                <option value="Repair Shop">Repair Shop</option>
                <option value="Junk Shop">Junk Shop</option>
                <option value="Pharmacies">Pharmacies</option>
                <option value="Gas Station">Gas Station</option>
                <option value="Others">Others</option>
              </select>
              @error('type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="row-auto mb-3">
              <label for="edit-address">Address</label>
              <input wire:model.defer="address" id="edit-address" type="text" class="form-control">
              @error('address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div> --}}
            <div class="row-auto mb-3">
              <label for="edit-place-description">Description</label>
              <textarea wire:model.defer="place_description" class="form-control" id="edit-place-description"></textarea>
              @error('place_description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label for="edit-location">Location</label>
              <div class="input-group">
                <input disabled wire:model.defer="location" id="edit-location" type="text" class="form-control">
                <span id="location-btn" class="material-symbols-outlined input-group-text" style="cursor: pointer;">location_on</span>
              </div>
              @error('coordinates') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            {{-- <div id="autocomplete-container">
              <input id="search-place" type="text" class="form-control row-4">
            </div> --}}
            <div wire:ignore id="edit-map" style="height: 400px"></div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Update</button>
        </div>
      </div>
    </div>
  </div>
</form>


{{-- Archive Modal --}}
<form wire:submit.prevent="archive">
  @csrf
  <div wire:ignore.self class="modal fade" id="archivePlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archivePlaceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0 justify-content-end">
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body pt-0">
          <div class="d-flex justify-content-center mb-3">
            <span class="material-symbols-outlined fs-1 delete-warning">
              warning
            </span>
          </div>
          <h4 class="text-center mb-3">Archive Place?</h4>
          <p class="text-center">Are you sure you want to archive this place?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
        </div>
      </div>
    </div>
  </div>
</form>