

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
        <div class="border border-1 rounded">
          @if ($event === 'created')
            <div class="col p-2">
              <ul>
                @isset($properties)
                  @foreach ($properties['attributes'] as $attribute => $value)
                      <li class="fw-bold text-break">{{ $attribute }}: 
                        <span class="fw-normal">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active')
                            @if ($value == 1)
                              Yes
                            @else
                              No
                            @endif
                          @else
                            {{ $value }}
                          @endif
                        </span>
                      </li>
                  @endforeach
                @endisset
              </ul>
            </div>
          @elseif ($event === 'updated')
            <div class="col p-2">
              <div>
                <h4>New</h4>
                <ul>
                  @isset($properties)
                    @foreach ($properties['attributes'] as $attribute => $value)
                        <li class="fw-bold text-break">{{ $attribute }}: 
                          <span class="fw-normal">
                            @if ($attribute == 'is_approved' || $attribute == 'is_active')
                              @if ($value == 1)
                                Yes
                              @else
                                No
                              @endif
                            @else
                              {{ $value }}
                            @endif
                          </span>
                        </li>
                    @endforeach
                  @endisset
                </ul>
              </div>
              <div>
                <h4>Old</h4>
                <ul>
                  @isset($properties)
                    @foreach ($properties['old'] as $attribute => $value)
                        <li class="fw-bold text-break">{{ $attribute }}: 
                          <span class="fw-normal">
                            @if ($attribute == 'is_approved' || $attribute == 'is_active')
                              @if ($value == 1)
                                Yes
                              @else
                                No
                              @endif
                            @else
                              {{ $value }}
                            @endif
                          </span>
                        </li>
                    @endforeach
                  @endisset
                </ul>
              </div>
            </div>
          @elseif ($event === 'deleted')
            <div class="col p-2">
              <ul>
                @isset($properties)
                  @foreach ($properties['old'] as $attribute => $value)
                      <li class="fw-bold text-break">{{ $attribute }}: 
                        <span class="fw-normal">
                          @if ($attribute == 'is_approved' || $attribute == 'is_active')
                            @if ($value == 1)
                              Yes
                            @else
                              No
                            @endif
                          @else
                            {{ $value }}
                          @endif
                        </span>
                      </li>
                  @endforeach
                @endisset
              </ul>
            </div>
          @elseif ($event === 'restored')
            <div class="col p-2">
              <ul>
                @isset($properties)
                  @foreach ($properties['attributes'] as $attribute => $value)
                    <li class="fw-bold text-break">{{ $attribute }}: 
                      <span class="fw-normal">
                        @if ($attribute == 'is_approved' || $attribute == 'is_active')
                          @if ($value == 1)
                            Yes
                          @else
                            No
                          @endif
                        @else
                          {{ $value }}
                        @endif
                      </span>
                    </li>
                  @endforeach
                @endisset
              </ul>
            </div>
          @endif
        </div>
      </div>
      <div class="modal-footer border-0">
        
      </div>
    </div>
  </div>
</div>