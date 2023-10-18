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
        <form id="brgy-clearance-form" class="biz-clearance-form" action="{{ route('resident.validate.brgy-clearance') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
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
            <label for="zone" class="form-label px-0">Zone</label>
            <select id="zone" class="form-select" name="zone">
              <option value="">Choose one...</option>
              @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}"
                @if (old('zone', auth()->guard('web')->user()->zone) == $i)
                  selected
                @endif
                >{{ $i }}</option>
              @endfor
            </select>
            @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-4">
            <label for="purpose" class="form-label px-0">Purpose</label>
            <input type="text" id="purpose" class="form-control mb-2" name="purpose" value="{{ old('purpose') }}" placeholder="Enter purpose (ex. Scholarship)">
            @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <p class="text-center mb-4 text-secondary"><small>Please fill out the following only if you have a Community Tax Certificate; otherwise, just leave it blank. And if you do, please bring it with you upon claiming your request.</small></p>
          <div class="position-relative mb-4">
            <hr class="border border-dark m-0 w-100">
            <div class="bg-light position-absolute top-50 start-50 translate-middle" style="width: 13rem;">
              <p class="m-0 text-center">Community Tax Certificate</p>
            </div>
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