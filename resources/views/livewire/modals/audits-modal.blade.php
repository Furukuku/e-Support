

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
                        <p class="text-break m-0">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released')
                            @if ($value == 1)
                              Yes
                            @else
                              No
                            @endif
                          @elseif (is_null($value) || $value === '')
                            N/A
                          @else
                            {{ $value }}
                          @endif
                        </p>
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
                          <p class="text-break m-0">
                            @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released')
                              @if ($value == 1)
                                Yes
                              @else
                                No
                              @endif
                            @elseif (is_null($value) || $value === '')
                              N/A
                            @else
                              {{ $value }}
                            @endif
                          </p>
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
                          <p class="text-break m-0">
                            @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released')
                              @if ($value == 1)
                                Yes
                              @else
                                No
                              @endif
                            @elseif (is_null($value) || $value === '')
                              N/A
                            @else
                              {{ $value }}
                            @endif
                          </p>
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
                        <p class="text-break m-0">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released')
                            @if ($value == 1)
                              Yes
                            @else
                              No
                            @endif
                          @elseif (is_null($value) || $value === '')
                            N/A
                          @else
                            {{ $value }}
                          @endif
                        </p>
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
                        <p class="text-break m-0">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active' || $attribute == 'document.is_released')
                            @if ($value == 1)
                              Yes
                            @else
                              No
                            @endif
                          @elseif (is_null($value) || $value === '')
                            N/A
                          @else
                            {{ $value }}
                          @endif
                        </p>
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