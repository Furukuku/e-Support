

<!-- View Official Modal -->
<div wire:ignore.self class="modal fade" id="viewActivity" tabindex="-1" aria-labelledby="viewActivityLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewActivityLabel">View Activity</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body p-3">
        <div class="">
          @if ($event === 'created')
            <div class="col p-2">
                @isset($properties)
                  @foreach ($properties['attributes'] as $attribute => $value)
                    <div class="mb-2">
                      <p class="fw-semibold text-break mb-1">{{ $attribute }}</p>
                      <div class="border rounded p-2">
                        @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released' || $attribute == 'pipe_nawasa' || $attribute == 'deep_well' || $attribute == 'nipa' || $attribute == 'concrete' || $attribute == 'sem' || $attribute == 'wood' || $attribute == 'owned_toilet' || $attribute == 'sharing_toilet' || $attribute == 'poultry_livestock' || $attribute == 'iodized_salt' || $attribute == 'owned_electricity' || $attribute == 'sharing_electricity' || $attribute == 'philhealth')
                          @if ($value == 1)
                            <p class="text-break m-0">Yes</p>
                          @else
                            <p class="text-break m-0">No</p>
                          @endif
                        @elseif ($attribute == 'ctc_photo' || $attribute == 'display_img' || $attribute == 'profile' || $attribute == 'biz_clearance' || $attribute == 'proof' || $attribute == 'business_img' || $attribute == 'verification_img')
                          @if (Storage::exists($value))
                            <img src="{{ Storage::url($value) }}" class="w-100 object-fit-contain" style="height: 15rem;" alt="img">
                          @else
                            <p class="text-break m-0">{{ $value }}</p>
                          @endif
                        @elseif (is_null($value) || $value === '')
                          <p class="text-break m-0">N/A</p>
                        @else
                          <p class="text-break m-0">{{ $value }}</p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                @endisset
            </div>
          @elseif ($event === 'updated')
            <div class="col p-2">
              <div class="mb-3">
                <h4>New</h4>
                  @isset($properties)
                    @foreach ($properties['attributes'] as $attribute => $value)
                      <div class="mb-2">
                        <p class="fw-semibold text-break mb-1">{{ $attribute }}</p>
                        <div class="border rounded p-2">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released' || $attribute == 'pipe_nawasa' || $attribute == 'deep_well' || $attribute == 'nipa' || $attribute == 'concrete' || $attribute == 'sem' || $attribute == 'wood' || $attribute == 'owned_toilet' || $attribute == 'sharing_toilet' || $attribute == 'poultry_livestock' || $attribute == 'iodized_salt' || $attribute == 'owned_electricity' || $attribute == 'sharing_electricity' || $attribute == 'philhealth')
                            @if ($value == 1)
                              <p class="text-break m-0">Yes</p>
                            @else
                              <p class="text-break m-0">No</p>
                            @endif
                          @elseif ($attribute == 'ctc_photo' || $attribute == 'display_img' || $attribute == 'profile' || $attribute == 'biz_clearance' || $attribute == 'proof' || $attribute == 'business_img' || $attribute == 'verification_img')
                            @if (Storage::exists($value))
                              <img src="{{ Storage::url($value) }}" class="w-100 object-fit-contain" style="height: 15rem;" alt="img">
                            @else
                              <p class="text-break m-0">{{ $value }}</p>
                            @endif
                          @elseif (is_null($value) || $value === '')
                            <p class="text-break m-0">N/A</p>
                          @else
                            <p class="text-break m-0">{{ $value }}</p>
                          @endif
                        </div>
                      </div>
                    @endforeach
                  @endisset
              </div>
              <div>
                <h4>Old</h4>
                  @isset($properties)
                    @foreach ($properties['old'] as $attribute => $value)
                      <div class="mb-2">
                        <p class="fw-semibold text-break mb-1">{{ $attribute }}</p>
                        <div class="border rounded p-2">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released' || $attribute == 'pipe_nawasa' || $attribute == 'deep_well' || $attribute == 'nipa' || $attribute == 'concrete' || $attribute == 'sem' || $attribute == 'wood' || $attribute == 'owned_toilet' || $attribute == 'sharing_toilet' || $attribute == 'poultry_livestock' || $attribute == 'iodized_salt' || $attribute == 'owned_electricity' || $attribute == 'sharing_electricity' || $attribute == 'philhealth')
                            @if ($value == 1)
                              <p class="text-break m-0">Yes</p>
                            @else
                              <p class="text-break m-0">No</p>
                            @endif
                          @elseif ($attribute == 'ctc_photo' || $attribute == 'display_img' || $attribute == 'profile' || $attribute == 'biz_clearance' || $attribute == 'proof' || $attribute == 'business_img' || $attribute == 'verification_img')
                            @if (Storage::exists($value))
                              <img src="{{ Storage::url($value) }}" class="w-100 object-fit-contain" style="height: 15rem;" alt="img">
                            @else
                              <p class="text-break m-0">{{ $value }}</p>
                            @endif
                          @elseif (is_null($value) || $value === '')
                            <p class="text-break m-0">N/A</p>
                          @else
                            <p class="text-break m-0">{{ $value }}</p>
                          @endif
                        </div>
                      </div>
                    @endforeach
                  @endisset
              </div>
            </div>
          @elseif ($event === 'deleted')
            <div class="col p-2">
                @isset($properties)
                  @foreach ($properties['old'] as $attribute => $value)
                    <div class="mb-2">
                      <p class="fw-semibold text-break mb-1">{{ $attribute }}</p>
                      <div class="border rounded p-2">
                        @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released' || $attribute == 'pipe_nawasa' || $attribute == 'deep_well' || $attribute == 'nipa' || $attribute == 'concrete' || $attribute == 'sem' || $attribute == 'wood' || $attribute == 'owned_toilet' || $attribute == 'sharing_toilet' || $attribute == 'poultry_livestock' || $attribute == 'iodized_salt' || $attribute == 'owned_electricity' || $attribute == 'sharing_electricity' || $attribute == 'philhealth')
                          @if ($value == 1)
                            <p class="text-break m-0">Yes</p>
                          @else
                            <p class="text-break m-0">No</p>
                          @endif
                        @elseif ($attribute == 'ctc_photo' || $attribute == 'display_img' || $attribute == 'profile' || $attribute == 'biz_clearance' || $attribute == 'proof' || $attribute == 'business_img' || $attribute == 'verification_img')
                          @if (Storage::exists($value))
                            <img src="{{ Storage::url($value) }}" class="w-100 object-fit-contain" style="height: 15rem;" alt="img">
                          @else
                            <p class="text-break m-0">{{ $value }}</p>
                          @endif
                        @elseif (is_null($value) || $value === '')
                          <p class="text-break m-0">N/A</p>
                        @else
                          <p class="text-break m-0">{{ $value }}</p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                @endisset
            </div>
          @elseif ($event === 'restored')
            <div class="col p-2">
                @isset($properties)
                  @foreach ($properties['attributes'] as $attribute => $value)
                    <div class="mb-2">
                      <p class="fw-semibold text-break mb-1">{{ $attribute }}</p>
                      <div class="border rounded p-2">
                        @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released' || $attribute == 'pipe_nawasa' || $attribute == 'deep_well' || $attribute == 'nipa' || $attribute == 'concrete' || $attribute == 'sem' || $attribute == 'wood' || $attribute == 'owned_toilet' || $attribute == 'sharing_toilet' || $attribute == 'poultry_livestock' || $attribute == 'iodized_salt' || $attribute == 'owned_electricity' || $attribute == 'sharing_electricity' || $attribute == 'philhealth')
                          @if ($value == 1)
                            <p class="text-break m-0">Yes</p>
                          @else
                            <p class="text-break m-0">No</p>
                          @endif
                        @elseif ($attribute == 'ctc_photo' || $attribute == 'display_img' || $attribute == 'profile' || $attribute == 'biz_clearance' || $attribute == 'proof' || $attribute == 'business_img' || $attribute == 'verification_img')
                          @if (Storage::exists($value))
                            <img src="{{ Storage::url($value) }}" class="w-100 object-fit-contain" style="height: 15rem;" alt="img">
                          @else
                            <p class="text-break m-0">{{ $value }}</p>
                          @endif
                        @elseif (is_null($value) || $value === '')
                          <p class="text-break m-0">N/A</p>
                        @else
                          <p class="text-break m-0">{{ $value }}</p>
                        @endif
                      </div>
                    </div>
                  @endforeach
                @endisset
            </div>
          @endif
        </div>
      </div>
      <div class="modal-footer border-0">
      </div>
    </div>
  </div>
</div>