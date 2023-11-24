@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'UPDATE ASSISTANCE';
    }
  </style>
@endpush

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
      <div class="w-100 d-flex justify-content-end p-0">
        <form id="cancel-assistance-form" action="{{ route('resident.delete.assist', ['id' => $assistance->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger text-white rounded-pill px-4 py-1" style="font-size: 14px;">Cancel Request</button>
        </form>
      </div>
      <form id="assistance-form" class="biz-clearance-form" action="{{ route('resident.update.assist', ['assistance' => $assistance]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row mb-3">
          <label for="date" class="form-label px-0">Date for the Request</label>
          <input type="date" id="date" class="form-control" name="date" value="{{ old('date', $assistance->date) }}">
          @error('date') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="row mb-3">
          <label for="time" class="form-label px-0">Time</label>
          <input type="time" id="time" class="form-control" name="time" value="{{ old('time', is_null($assistance->time) ? null : date('H:i', strtotime($assistance->time))) }}">
          @error('time') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="row mb-3">
          <label for="need" class="form-label px-0">Need</label>
          <select id="need" class="form-select" name="need">
            <option value="">Choose one...</option>
            <option value="Borrow Chairs and Tables" {{ old('need', $assistance->need) === 'Borrow Chairs and Tables' ? 'selected' : '' }}>Borrow Chairs and Tables</option>
            <option value="Vehicle Use" {{ old('need', $assistance->need) === 'Vehicle Use' ? 'selected' : '' }}>Vehicle Use</option>
            <option value="Crowd Control" {{ old('need', $assistance->need) === 'Crowd Control' ? 'selected' : '' }}>Crowd Control</option>
            <option value="Streetlight" {{ old('need', $assistance->need) === 'Streetlight' ? 'selected' : '' }}>StreetLight (Bulb)</option>
            <option value="Others" {{ old('need', $assistance->need) === 'Others' ? 'selected' : '' }}>Others</option>
          </select>
          @error('need') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          <input type="text" id="other" class="form-control mt-2 d-none" value="{{ old('others', $assistance->need) }}" name="others" placeholder="Please specify your need here...">
          @error('others') <span class="error text-danger px-0 d-none" id="others-error" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="row mb-3">
          <label for="purpose" class="form-label px-0">Purpose</label>
          <textarea name="purpose" id="purpose" class="form-control" rows="3">{{ old('purpose', $assistance->purpose) }}</textarea>
          @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <button type="submit" id="submit-btn" class="btn text-white my-4 rounded-pill px-4">Update</button>
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
        title: 'Update Assistance?',
        text: "Are you sure you want to update this assistance?",
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

    document.getElementById('cancel-assistance-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Cancel Requested Assistance?',
        text: "Are you sure you want to cancel this assistance? This will delete your request, you cannot revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#cancel-assistance-form').submit();
        }
      });
    });


    const need = document.getElementById('need');
    const other = document.getElementById('other');
    const othersErr = document.getElementById('others-error');

    need.addEventListener('change', () => {
      if(need.value === 'Others'){
        other.classList.remove('d-none');
        if(othersErr){
          othersErr.classList.remove('d-none');
        }
      }else{
        other.classList.add('d-none');
        if(othersErr){
          othersErr.classList.add('d-none');
        }
        other.value = '';
      }
    });

    window.addEventListener('load', () => {
      switch(need.value){
        case 'Borrow Chairs and Tables' :
          need.value = need.value;
          other.value = '';
          break;
        case 'Vehicle Use' :
          need.value = need.value;
          other.value = '';
          break;
        case 'Crowd Control' :
          need.value = need.value;
          other.value = '';
          break;
        case 'Streetlight' :
          need.value = need.value;
          other.value = '';
          break;
        default:
          other.value = other.value;
          need.value = 'Others';
          other.classList.remove('d-none');
          if(othersErr){
            othersErr.classList.remove('d-none');
          }
      }
    });

  </script>

@endsection