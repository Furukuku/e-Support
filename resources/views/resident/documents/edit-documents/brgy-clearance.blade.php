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
            <input type="text" id="name" class="form-control mb-2 inputs" disabled name="name" value="{{ old('name', $document->brgyClearance->name) }}" placeholder="Enter your name">
            @error('name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="zone" class="form-label px-0">Zone</label>
            <select id="zone" class="form-select inputs" disabled name="zone">
              <option value="">Choose one...</option>
              @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}"
                @if (old('zone', $document->brgyClearance->zone) == $i)
                  selected
                @endif
                >{{ $i }}</option>
              @endfor
            </select>
            @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-4">
            <label for="purpose" class="form-label px-0">Purpose</label>
            <select name="purpose" id="purpose" class="form-select inputs" disabled>
              <option value="">Choose one...</option>
              <option value="For School Enrollment" {{ old('purpose', $document->brgyClearance->purpose) === 'For School Enrollment' ? 'selected' : '' }}>For School Enrollment</option>
              <option value="For Scholarship" {{ old('purpose', $document->brgyClearance->purpose) === 'For Scholarship' ? 'selected' : '' }}>For Scholarship</option>
              <option value="For Employment" {{ old('purpose', $document->brgyClearance->purpose) === 'For Employment' ? 'selected' : '' }}>For Employment</option>
              <option value="For Business" {{ old('purpose', $document->brgyClearance->purpose) === 'For Business' ? 'selected' : '' }}>For Business</option>
              <option value="For Passport" {{ old('purpose', $document->brgyClearance->purpose) === 'For Passport' ? 'selected' : '' }}>For Passport</option>
              <option value="For Marriage" {{ old('purpose', $document->brgyClearance->purpose) === 'For Marriage' ? 'selected' : '' }}>For Marriage</option>
              <option value="Others" {{ old('purpose', $document->brgyClearance->purpose) === 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            @error('purpose') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" id="other" class="form-control mt-2 d-none inputs" disabled name="others" value="{{ old('others', $document->brgyClearance->purpose) }}" placeholder="Enter purpose here...">
            @error('others') <span class="error text-danger px-0 d-none" id="others-error" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <p class="text-center mb-4 text-secondary"><small>Please fill out the following only if you have a Community Tax Certificate; otherwise, just leave it as it is.</small></p>
          <div class="position-relative mb-4">
            <hr class="border border-dark m-0 w-100">
            <div class="bg-light position-absolute top-50 start-50 translate-middle" style="width: 13rem;">
              <p class="m-0 text-center">Community Tax Certificate</p>
            </div>
          </div>
          <div id="insert-img-input" class="row mb-2 d-none">
            <label for="ctc-img" class="form-label px-0">Please insert a clear image of your CTC</label>
            <input type="file" accept="image/*" id="ctc-img" disabled class="form-control form-control-sm inputs" name="ctc_image" value="{{ old('ctc_image') }}">
            @error('ctc_image') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          @if (!is_null($document->brgyClearance->ctc_photo))
            <div class="row justify-content-center mb-3">
              <img id="ctc-preview" src="{{ Storage::url($document->brgyClearance->ctc_photo) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          @else
            <div id="ctc-preview-container" class="row justify-content-center mb-3 d-none">
              <img id="ctc-preview" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          @endif
          <div class="row mb-3">
            <label for="ctc" class="form-label px-0">CTC #</label>
            <input type="text" id="ctc" disabled class="form-control inputs" name="ctc" value="{{ old('ctc',$document->brgyClearance->ctc) }}">
            @error('ctc') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="issued-at" class="form-label px-0">Issued at</label>
            <input type="text" id="issued-at" disabled class="form-control inputs" name="issued_at" value="{{ old('issued_at',$document->brgyClearance->issued_at) }}">
            @error('issued_at') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="issued-on" class="form-label px-0">Issued on</label>
            <input type="date" id="issued-on" disabled class="form-control inputs" name="issued_on" value="{{ old('issued_on',$document->brgyClearance->issued_on) }}">
            @error('issued_on') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
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
    const ImgInput = document.getElementById('insert-img-input');

    document.getElementById('edit-btn').addEventListener('click', () => {
      const inputs = document.querySelectorAll('.inputs');
      setTimeout(() => {
        inputs.forEach((input) => {
          input.toggleAttribute('disabled');
        });
        confirmBtn.toggleAttribute('hidden');
        ImgInput.classList.toggle('d-none');
      }, 300);
    });

    const ctcImgInput = document.getElementById('ctc-img');
    const previewImg = document.getElementById('ctc-preview');
    const ctcPreviewCont = document.getElementById('ctc-preview-container');

    ctcImgInput.addEventListener('change', e => {
      if(e.target.files){
        previewImg.src = URL.createObjectURL(e.target.files[0]);
        if(ctcPreviewCont){
          ctcPreviewCont.classList.remove('d-none');
        }
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
      switch(purpose.value){
        case 'For School Enrollment' :
          purpose.value = purpose.value;
          other.value = '';
          break;
        case 'For Scholarship' :
          purpose.value = purpose.value;
          other.value = '';
          break;
        case 'For Employment' :
          purpose.value = purpose.value;
          other.value = '';
          break;
        case 'For Business' :
          purpose.value = purpose.value;
          other.value = '';
          break;
        case 'For Passport' :
          purpose.value = purpose.value;
          other.value = '';
          break;
        case 'For Marriage' :
          purpose.value = purpose.value;
          other.value = '';
          break;
        default:
          other.value = other.value;
          purpose.value = 'Others';
          other.classList.remove('d-none');
          if(othersErr){
            othersErr.classList.remove('d-none');
          }
      }
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