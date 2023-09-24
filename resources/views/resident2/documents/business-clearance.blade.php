@extends('resident2.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="container w-50 docs-form-container">
      <div class="row docs-form-header justify-content-center rounded py-3 mb-3">
        <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mb-3">
          <span class="material-symbols-outlined fs-2">
            description
          </span>
        </div>
        <h5 class="text-center text-white">Business Clearance</h5>
      </div>
      <div class="row">
        <form id="biz-clearance-form" class="biz-clearance-form" action="{{ route('resident.validate.biz-clearance') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="biz-nature" class="form-label px-0">Nature of Business</label>
            <input type="text" id="biz-nature" autocomplete="false" class="form-control" name="business_nature" value="{{ old('business_nature') }}">
            @error('business_nature') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="name" class="form-label px-0">Name</label>
            <input type="text" id="name" class="form-control mb-2"  name="owner_name" 
            @if (auth()->guard('web')->user()->mname !== null && auth()->guard('web')->user()->sname !== null)
              value="{{ old('owner_name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->mname[0] . '. ' . auth()->guard('web')->user()->lname . ' ' . auth()->guard('web')->user()->sname) }}"
            @elseif (auth()->guard('web')->user()->mname !== null && auth()->guard('web')->user()->sname === null)
              value="{{ old('owner_name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->mname[0] . '. ' . auth()->guard('web')->user()->lname) }}"
            @elseif (auth()->guard('web')->user()->sname !== null && auth()->guard('web')->user()->mname === null)
              value="{{ old('owner_name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->lname . ' ' . auth()->guard('web')->user()->sname) }}"
            @elseif (auth()->guard('web')->user()->sname === null && auth()->guard('web')->user()->mname === null)
              value="{{ old('owner_name', auth()->guard('web')->user()->fname . ' ' . auth()->guard('web')->user()->lname) }}"
            @else
              value="{{ old('owner_name') }}"
            @endif 
            placeholder="Business Owner">
            @error('owner_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" class="form-control" name="business_name" value="{{ old('business_name') }}" placeholder="Name of Business">
            @error('business_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="address" class="form-label px-0">Address</label>
            <input type="text" id="address" class="form-control mb-2" name="owner_address" value="{{ old('owner_address', 'Zone ' . auth()->guard('web')->user()->zone . ', Nancayasan Urdaneta City, Pangasinan') }}" placeholder="Owner Address">
            @error('owner_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" class="form-control" name="business_address" value="{{ old('business_address') }}" placeholder="Business Address">
            @error('business_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="proof" class="form-label px-0"><b>Proof of your business </b>(DTI, Business Clearance, etc.)</label>
            <input type="file" accept="image/*" id="proof" class="form-control form-control-sm" name="proof" value="{{ old('proof') }}">
            @error('proof') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <button type="submit" class="btn text-white my-4 rounded-pill px-4">Submit</button>
        </form>
      </div>
    </div>

  </div>

@endsection

@section('scripts')

  <script>

    document.getElementById('biz-clearance-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Request Business Clearance?',
        text: "Are you sure you want to submit this request?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#biz-clearance-form').submit();
        }
      });
    });

  </script>

@endsection