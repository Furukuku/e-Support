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
        <h5 class="text-center text-white">Barangay Clearance</h5>
      </div>
      <div class="row">
        <form id="brgy-clearance-form" class="biz-clearance-form" action="{{ route('resident.validate.brgy-clearance') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <label for="name" class="form-label px-0">Name</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">{{ auth()->guard('web')->user()->fname }} {{ is_null(auth()->guard('web')->user()->mname) ? '' : auth()->guard('web')->user()->mname[0] }}{{ is_null(auth()->guard('web')->user()->mname) ? '' : '. ' }} {{ auth()->guard('web')->user()->lname }} {{ auth()->guard('web')->user()->sname }}</p>
            </div>
            {{-- <input type="text" id="name" class="form-control mb-2" hidden name="name" value="{{ old('name', ) }}"
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
            @error('name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror --}}
          </div>
          <div class="row mb-3">
            <label for="zone" class="form-label px-0">Zone</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">{{ auth()->guard('web')->user()->zone }}</p>
            </div>
            {{-- <select id="zone" class="form-select" hidden name="zone">
              <option value="">Choose one...</option>
              @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}"
                @if (old('zone', auth()->guard('web')->user()->zone) == $i)
                  selected
                @endif
                >{{ $i }}</option>
              @endfor
            </select>
            @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror --}}
          </div>
          <div class="row mb-5">
            <label for="purpose" class="form-label px-0">Purpose</label>
            <select name="purpose" id="purpose" class="form-select">
              <option value="">Choose one...</option>
              <option value="For School Enrollment" {{ old('purpose') === 'For School Enrollment' ? 'selected' : '' }}>For School Enrollment</option>
              <option value="For Scholarship" {{ old('purpose') === 'For Scholarship' ? 'selected' : '' }}>For Scholarship</option>
              <option value="For Employment" {{ old('purpose') === 'For Employment' ? 'selected' : '' }}>For Employment</option>
              <option value="For Business" {{ old('purpose') === 'For Business' ? 'selected' : '' }}>For Business</option>
              <option value="For Passport" {{ old('purpose') === 'For Passport' ? 'selected' : '' }}>For Passport</option>
              <option value="For Marriage" {{ old('purpose') === 'For Marriage' ? 'selected' : '' }}>For Marriage</option>
              <option value="Others" {{ old('purpose') === 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" id="other" class="form-control mt-2 d-none" name="others" value="{{ old('others') }}" placeholder="Enter purpose here...">
            @error('others') <span class="error text-danger px-0 d-none" id="others-error" style="font-size: 0.75rem">{{ $message }}</span> @enderror
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
            <label for="ctc-img" class="form-label px-0"><small>Please insert a clear image of your CTC</small></label>
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

    document.getElementById('brgy-clearance-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Request Barangay Clearance?',
        text: "Are you sure you want to submit this request?",
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

    const ctcImgInput = document.getElementById('ctc-img');
    const previewImg = document.getElementById('ctc-preview');

    ctcImgInput.addEventListener('change', e => {
      if(e.target.files){
        previewImg.classList.remove('d-none');
        previewImg.src = URL.createObjectURL(e.target.files[0]);
      }
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

    // if(window.innerWidth > 870){
    //   previewImg.addEventListener('click', () => {
    //     const backdrop = document.createElement('div');
    //     backdrop.classList.add('backdrop');

    //     backdrop.style.display = 'grid';
    //     backdrop.style.placeItems = 'center';
    //     backdrop.style.backgroundColor = '#00000080';
    //     backdrop.style.placeItems = 'center';
    //     backdrop.style.position = 'fixed';
    //     backdrop.style.top = '0';
    //     backdrop.style.bottom = '0';
    //     backdrop.style.left = '0';
    //     backdrop.style.right = '0';
    //     backdrop.style.zIndex = '10';
  
    //     const imageContainer = document.createElement('div');
    //     const image = document.createElement('img');
    //     imageContainer.style.width = '80%';
    //     imageContainer.style.height = '90vh';
    //     imageContainer.style.display = 'grid';
    //     imageContainer.style.placeItems = 'center';
  
    //     image.src = previewImg.src;
    //     image.style.borderRadius = '10px';
    //     image.style.height = '100%';
    //     image.style.objectFit = 'contain';
    //     imageContainer.appendChild(image);
    //     backdrop.appendChild(imageContainer);
    //     document.body.appendChild(backdrop);
  
    //     backdrop.addEventListener('click', e => {
    //       if((e.target === backdrop || e.target === imageContainer) && e.target !== image){
    //         document.body.removeChild(backdrop);
    //       }
    //     });
    //   });
    // }else {
    //   // Handle modal removal when the window width is below 870px
    //   const backdrop = document.querySelector('.backdrop');
    //   if (backdrop) {
    //     document.body.removeChild(backdrop);
    //   }
    // }

    // Add a resize event listener to check window width changes
    // window.addEventListener('resize', () => {
    //   if (window.innerWidth <= 870) {
    //     const backdrop = document.querySelector('.backdrop');
    //     if (backdrop) {
    //       document.body.removeChild(backdrop);
    //     }
    //   }
    // });


  </script>

@endsection