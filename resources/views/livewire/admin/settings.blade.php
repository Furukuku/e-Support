<div class="d-flex flex-column align-items-center py-5">
  
  <div class="bg-warning pt-2 px-4 rounded account-header shadow">
    <h2>Settings</h2>
  </div>
  <div class="container bg-white rounded p-5 shadow account-details">
    <div class="border-bottom border-dark d-flex gap-5">
      <h5 wire:click="brgyInfo" class="{{ $brgyInfoTab === '' ? 'text-primary border-bottom border-primary' : '' }}" style="cursor: pointer;">BARANGAY INFORMATION</h5>
      <h5 wire:click="hotlines" class="{{ $hotlinesTab === '' ? 'text-primary border-bottom border-primary' : '' }}" style="cursor: pointer;">EMERGENCY HOTLINES</h5>
      <h5 wire:click="document" class="{{ $documentTab === '' ? 'text-primary border-bottom border-primary' : '' }}" style="cursor: pointer;">DOCUMENT FEES</h5>
    </div>
    <div class="my-3 {{ $brgyInfoTab }}">
      <div class="d-flex justify-content-end py-2">
        <i class="fa-solid fa-pen-to-square" wire:click="editBrgyInfo" style="cursor: pointer;"></i>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Email</span>
          <input type="text" wire:model.defer="email" class="form-control" {{ $brgyInfoEdit }}>
        </div>
        @error('email') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Telephone No.</span>
          <input type="tel" wire:model.defer="telephone_no" class="form-control" {{ $brgyInfoEdit }}>
        </div>
        @error('telephone_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Phone No.</span>
          <input type="tel" wire:model.defer="phone_no" class="form-control" {{ $brgyInfoEdit }}>
        </div>
        @error('phone_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <label class="form-label">History</label>
        </div>
        <textarea class="form-control" {{ $brgyInfoEdit }} wire:model.defer="history" rows="3"></textarea>
        @error('history') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <label class="form-label">Mission</label>
        </div>
        <textarea class="form-control" {{ $brgyInfoEdit }} wire:model.defer="mission" rows="3"></textarea>
        @error('mission') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <label class="form-label">Vision</label>
        </div>
        <textarea class="form-control" {{ $brgyInfoEdit }} wire:model.defer="vision" rows="3"></textarea>
        @error('vision') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="d-flex justify-content-end gap-3 {{ $brgyInfoEdit === 'disabled' ? 'd-none' : '' }}">
        <button type="button" wire:click="brgyInfoSave" class="btn btn-primary">Save</button>
        <button type="button" wire:click="cancelEditBrgyInfo" class="btn btn-secondary">Cancel</button>
      </div>
    </div>

    <div class="my-3 {{ $hotlinesTab }}">
      <div class="d-flex justify-content-end py-2">
        <i class="fa-solid fa-pen-to-square" wire:click="editHotlines" style="cursor: pointer;"></i>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Emergency Medical Service (EMS)</span>
          <input type="text" wire:model.defer="ems" class="form-control" {{ $hotlinesEdit }}>
        </div>
        @error('ems') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Philippine National Police (PNP)</span>
          <input type="text" wire:model.defer="pnp" class="form-control" {{ $hotlinesEdit }}>
        </div>
        @error('pnp') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Bureau of Fire Protection (BFP)</span>
          <input type="text" wire:model.defer="bfp" class="form-control" {{ $hotlinesEdit }}>
        </div>
        @error('bfp') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="d-flex justify-content-end gap-3 {{ $hotlinesEdit === 'disabled' ? 'd-none' : '' }}">
        <button type="button" wire:click="hotlinesSave" class="btn btn-primary">Save</button>
        <button type="button" wire:click="cancelEditHotlines" class="btn btn-secondary">Cancel</button>
      </div>
    </div>

    <div class="my-3 {{ $documentTab }}">
      <div class="d-flex justify-content-end py-2">
        <i class="fa-solid fa-pen-to-square" wire:click="editDocument" style="cursor: pointer;"></i>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Barangay Clearance</span>
          <input type="number" min="0" wire:model.defer="barangay_clearance" class="form-control" {{ $documentEdit }}>
        </div>
        @error('barangay_clearance') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text">Business Clearance</span>
          <input type="number" min="0" wire:model.defer="business_clearance" class="form-control" {{ $documentEdit }}>
        </div>
        @error('business_clearance') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="d-flex justify-content-end gap-3 {{ $documentEdit === 'disabled' ? 'd-none' : '' }}">
        <button type="button" wire:click="documentSave" class="btn btn-primary">Save</button>
        <button type="button" wire:click="cancelEditDocument" class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </div>

</div>
