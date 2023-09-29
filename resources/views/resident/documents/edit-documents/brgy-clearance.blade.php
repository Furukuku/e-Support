@extends('resident.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="container w-50 docs-form-container">
      <div class="row docs-form-header justify-content-center rounded py-3 mb-3">
        <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mb-3">
          <span class="material-symbols-outlined fs-2">
            description
          </span>
        </div>
        <h5 class="text-center text-white">Barangay Clearance</h5>
      </div>
      <div class="row">
        <div id="edit-btn" class="d-flex gap-2 align-items-center justify-content-end" style="cursor: pointer;">
          <p class="m-0">Edit</p>
          <i class="fa-solid fa-pen-to-square"></i>
        </div>
        <form id="brgy-clearance-form" class="biz-clearance-form" action="{{ route('resident.update.brgy-clearnce', ['id' => $document->id]) }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="row mb-3">
            <label for="name" class="form-label px-0">Name</label>
            <input type="text" id="name" class="form-control mb-2 inputs" disabled name="name" value="{{ old('name', $document->name) }}" placeholder="Enter your name">
            @error('name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="zone" class="form-label px-0">Zone</label>
            <select id="zone" class="form-select inputs" disabled name="zone">
              <option value="">Choose one...</option>
              @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}"
                @if (old('zone', $document->zone) == $i)
                  selected
                @endif
                >{{ $i }}</option>
              @endfor
            </select>
            @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="purpose" class="form-label px-0">Purpose</label>
            <input type="text" id="purpose" class="form-control mb-2 inputs" disabled name="purpose" value="{{ old('purpose', $document->purpose) }}" placeholder="Enter purpose (ex. Scholarship)">
            @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <button id="confirmation" type="submit" hidden class="btn text-white my-4 rounded-pill px-4">Update</button>
        </form>
      </div>
    </div>

  </div>

@endsection

@section('scripts')

  <script>

    const confirmBtn = document.getElementById('confirmation');

    document.getElementById('edit-btn').addEventListener('click', () => {
      const inputs = document.querySelectorAll('.inputs');
      setTimeout(() => {
        inputs.forEach((input) => {
          input.toggleAttribute('disabled');
        });
        confirmBtn.toggleAttribute('hidden');
      }, 300);
    });
    
    // confirmBtn.addEventListener('click', () => {
    //   Swal.fire({
    //     title: 'Update Barangay Clearance?',
    //     text: "Are you sure you want to update this request?",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#0e2c15dc',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes!'
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //       $('#brgy-clearance-form').submit();
    //     }
    //   });
    // });

    document.getElementById('brgy-clearance-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Update Barangay Clearance?',
        text: "Are you sure you want to update this request?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#brgy-clearance-form').submit();
        }
      });
    });

  </script>

@endsection