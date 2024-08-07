@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'REQUEST DOCUMENT';
    }
  </style>
@endpush

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
            <label for="biz_owner" class="form-label px-0">Business Owner</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">{{ auth()->guard('web')->user()->fname }} {{ is_null(auth()->guard('web')->user()->mname) ? '' : auth()->guard('web')->user()->mname[0] }}{{ is_null(auth()->guard('web')->user()->mname) ? '' : '. ' }} {{ auth()->guard('web')->user()->lname }} {{ auth()->guard('web')->user()->sname }}</p>
            </div>
            {{-- <input type="text" id="biz_owner" class="form-control mb-2"  name="owner_name" 
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
            placeholder="Enter business owner">
            @error('owner_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror --}}
          </div>
          <div class="row mb-3">
            <label for="owner_address" class="form-label px-0">Owner Address</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">Zone {{ auth()->guard('web')->user()->zone }}, Nancayasan Urdaneta City, Pangasinan</p>
            </div>
            {{-- <input type="text" id="owner_address" class="form-control mb-2" name="owner_address" value="{{ old('owner_address', 'Zone ' . auth()->guard('web')->user()->zone . ', Nancayasan Urdaneta City, Pangasinan') }}" placeholder="Enter owner's address">
            @error('owner_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror --}}
          </div>
          <div class="row mb-3">
            <label for="biz-nature" class="form-label px-0">Nature of Business</label>
            <input type="text" id="biz-nature" autocomplete="false" class="form-control" name="business_nature" value="{{ old('business_nature') }}">
            @error('business_nature') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="biz_name" class="form-label px-0">Name of Business</label>
            <input type="text" id="biz_name" class="form-control" name="business_name" value="{{ old('business_name') }}" placeholder="Enter the name of your business">
            @error('business_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="biz_address" class="form-label px-0">Business Address</label>
            <input type="text" id="biz_address" class="form-control" name="business_address" value="{{ old('business_address') }}" placeholder="Enter the address of your business">
            @error('business_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="proof" class="form-label px-0"><b>Proof of your business </b>(DTI, Business Clearance, etc.)</label>
            <input type="file" accept="image/*" id="proof" class="form-control form-control-sm" name="proof" value="{{ old('proof') }}">
            @error('proof') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row justify-content-center mb-5">
            <img id="proof-preview" class="object-fit-scale rounded d-none" alt="proof" style="width: 20rem;">
          </div>
          <div class="position-relative mb-3">
            <hr class="border border-dark m-0 w-100">
            <div class="bg-light position-absolute top-50 start-50 translate-middle" style="width: 13rem;">
              <p class="m-0 text-center fw-semibold">Community Tax Certificate</p>
            </div>
          </div>
          <div class="rounded border p-2 mb-3" style="background-color: #EBF3E8;">
            <p class="text-center m-0"><small>Please only fill out the following if you have a Community Tax Certificate; otherwise, leave it blank.</small></p>
          </div>
          <div class="row mb-2">
            <label for="ctc-img" class="form-label px-0">Please insert a clear image of your CTC</label>
            <input type="file" accept="image/*" id="ctc-img" class="form-control form-control-sm" name="ctc_image" value="{{ old('ctc_image') }}">
            @error('ctc_image') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row justify-content-center mb-3">
            <img id="ctc-preview" class="object-fit-scale rounded d-none" alt="ctc-image" style="width: 20rem;">
          </div>
          <div class="row mb-3">
            <label for="ctc" class="form-label px-0">CTC #</label>
            <input type="text" id="ctc" class="form-control" name="ctc" value="{{ old('ctc') }}">
            @error('ctc') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="issued-at" class="form-label px-0">Issued at</label>
            <input type="text" id="issued-at" class="form-control" name="issued_at" value="{{ old('issued_at') }}">
            @error('issued_at') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="issued-on" class="form-label px-0">Issued on</label>
            <input type="date" id="issued-on" class="form-control" name="issued_on" value="{{ old('issued_on') }}">
            @error('issued_on') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
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


    const ctcImgInput = document.getElementById('ctc-img');
    const previewImg = document.getElementById('ctc-preview');

    ctcImgInput.addEventListener('change', e => {
      if(e.target.files){
        previewImg.classList.remove('d-none');
        previewImg.src = URL.createObjectURL(e.target.files[0]);
      }
    });


    const proofImgInput = document.getElementById('proof');
    const proofPreviewImg = document.getElementById('proof-preview');

    proofImgInput.addEventListener('change', e => {
      if(e.target.files){
        proofPreviewImg.classList.remove('d-none');
        proofPreviewImg.src = URL.createObjectURL(e.target.files[0]);
      }
    });

  </script>

@endsection