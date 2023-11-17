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
        <h5 class="text-center text-white">Indigency</h5>
      </div>
      <div class="row">
        <form id="indigency-form" class="biz-clearance-form" action="{{ route('resident.validate.indigency') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <p class="p-0" style="font-size: 14px;">Confirm your name...</p>
            <label for="name" class="form-label px-0">Name</label>
            <input type="text" id="name" class="form-control mb-2"  name="name" 
            @if (auth()->guard('web')->user()->mname !== null && auth()->guard('web')->user()->sname !== null)
              value="{{ old('name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->mname[0] . '. ' . auth()->guard('web')->user()->lname . ' ' . auth()->guard('web')->user()->sname) }}"
            @elseif (auth()->guard('web')->user()->mname !== null && auth()->guard('web')->user()->sname === null)
              value="{{ old('name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->mname[0] . '. ' . auth()->guard('web')->user()->lname) }}"
            @elseif (auth()->guard('web')->user()->sname !== null && auth()->guard('web')->user()->mname === null)
              value="{{ old('name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->lname . ' ' . auth()->guard('web')->user()->sname) }}"
            @elseif (auth()->guard('web')->user()->sname === null && auth()->guard('web')->user()->mname === null)
              value="{{ old('name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->lname) }}"
            @else
              value="{{ old('name') }}"
            @endif 
            placeholder="Enter your name">
            @error('name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="purpose" class="form-label px-0">Purpose</label>
            <select name="purpose" id="purpose" class="form-select">
              <option value="">Choose one...</option>
              <option value="For Financial Assistance" {{ old('purpose') === 'For Financial Assistance' ? 'selected' : '' }}>For Financial Assistance</option>
              <option value="For Health Related-Expenses" {{ old('purpose') === 'For Health Related-Expenses' ? 'selected' : '' }}>For Health Related-Expenses</option>
              <option value="For Educational Support" {{ old('purpose') === 'For Educational Support' ? 'selected' : '' }}>For Educational Support</option>
              <option value="For Social Welfare Programs" {{ old('purpose') === 'For Social Welfare Programs' ? 'selected' : '' }}>For Social Welfare Programs</option>
              <option value="Others" {{ old('purpose') === 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" id="other" class="form-control mt-2 d-none" name="others" value="{{ old('others') }}" placeholder="Enter purpose here...">
            @error('others') <span class="error text-danger px-0 d-none" id="others-error" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <button type="submit" class="btn text-white my-4 rounded-pill px-4">Submit</button>
        </form>
      </div>
    </div>

  </div>

@endsection

@section('scripts')

  <script>

    document.getElementById('indigency-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Request Indigency?',
        text: "Are you sure you want to submit this request?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#indigency-form').submit();
        }
      });
    });


    const purpose = document.getElementById('purpose');
    const other = document.getElementById('other');
    const othersErr = document.getElementById('others-error');

    purpose.addEventListener('change', () => {
      if(purpose.value === 'Others'){
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
      if(purpose.value === 'Others'){
        other.classList.remove('d-none');
        if(othersErr){
          othersErr.classList.remove('d-none');
        }
      }
    });

  </script>

@endsection