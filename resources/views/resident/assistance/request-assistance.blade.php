@extends('resident.resident-layout.resident-app')

@section('content')

<div class="py-5">

  <div class="container w-50 docs-form-container">
    <div class="row docs-form-header justify-content-center rounded py-3 mb-3">
      <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mb-3">
        <span class="material-symbols-outlined fs-2">
          help
        </span>
      </div>
      <h5 class="text-center text-white">Request Assistance</h5>
    </div>
    <div class="row">
      <form id="assistance-form" class="biz-clearance-form" action="{{ route('resident.assistance') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="date" class="form-label px-0">Date for the Request</label>
          <input type="date" id="date" class="form-control" name="date" value="{{ old('date') }}">
          @error('date') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="row mb-3">
          <label for="time" class="form-label px-0">Time</label>
          <input type="time" id="time" class="form-control" name="time" value="{{ old('time') }}">
          @error('time') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="row mb-3">
          <label for="purpose" class="form-label px-0">Purpose</label>
          <select id="purpose" class="form-select" name="purpose">
            <option value="">Choose one...</option>
            <option value="Borrow Chairs and Tables" {{ old('purpose') === 'Borrow Chairs and Tables' ? 'selected' : '' }}>Borrow Chairs and Tables</option>
            <option value="Vehicle Use" {{ old('purpose') === 'Vehicle Use' ? 'selected' : '' }}>Vehicle Use</option>
            <option value="Crowd Control" {{ old('purpose') === 'Crowd Control' ? 'selected' : '' }}>Crowd Control</option>
            <option value="Streetlight" {{ old('purpose') === 'Streetlight' ? 'selected' : '' }}>StreetLight (Bulb)</option>
          </select>
          @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="row mb-3">
          <label for="description" class="form-label px-0">Description</label>
          <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
          @error('description') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <button type="submit" id="submit-btn" class="btn text-white my-4 rounded-pill px-4">Submit</button>
      </form>
    </div>
  </div>

</div>

@endsection

@section('scripts')

  <script>

    document.getElementById('assistance-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Request Assistance?',
        text: "Are you sure you want to request an assistance?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#assistance-form').submit();
        }
      });
      });

  </script>

@endsection