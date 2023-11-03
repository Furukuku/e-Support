@extends('business.business-layout.business-app')

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
        <div id="edit-btn" class="d-flex gap-2 align-items-center justify-content-end" style="cursor: pointer;">
          <p class="m-0">Edit</p>
          <i class="fa-solid fa-pen-to-square"></i>
        </div>
        <form id="biz-clearance-form" class="biz-clearance-form" action="{{ route('business.update.biz-clearnce', ['id' => $document->id]) }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="row mb-3">
            <label for="biz-nature" class="form-label px-0">Nature of Business</label>
            <input type="text" id="biz-nature" autocomplete="false" class="form-control inputs" disabled name="business_nature" value="{{ old('business_nature', $document->bizClearance->biz_nature) }}">
            @error('business_nature') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="name" class="form-label px-0">Name</label>
            <input type="text" id="name" class="form-control mb-2 inputs" disabled  name="owner_name" value="{{ old('owner_name', $document->bizClearance->biz_owner) }}" placeholder="Business Owner">
            @error('owner_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" class="form-control inputs" disabled name="business_name" value="{{ old('business_name', $document->bizClearance->biz_name) }}" placeholder="Name of Business">
            @error('business_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="address" class="form-label px-0">Address</label>
            <input type="text" id="address" class="form-control mb-2 inputs" disabled name="owner_address" value="{{ old('owner_address', $document->bizClearance->owner_address) }}" placeholder="Owner Address">
            @error('owner_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" class="form-control inputs" name="business_address" disabled value="{{ old('business_address', $document->bizClearance->biz_address) }}" placeholder="Business Address">
            @error('business_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div id="proof-img-input" class="row mb-3 d-none">
            <label for="proof" class="form-label px-0"><b>Proof of your business </b>(DTI, Business Clearance, etc.)</label>
            <input type="file" accept="image/*" id="proof" class="form-control form-control-sm inputs" disabled name="proof" value="{{ old('proof') }}">
            @error('proof') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row justify-content-center mb-4">
            <img id="proof-preview" src="{{ Storage::url($document->bizClearance->proof) }}" class="object-fit-scale rounded" alt="proof" style="width: 20rem;">
          </div>
          <p class="text-center mb-4 text-secondary"><small>Please fill out the following only if you have a Community Tax Certificate; otherwise, just leave it as it is.</small></p>
          <div class="position-relative mb-4">
            <hr class="border border-dark m-0 w-100">
            <div class="bg-light position-absolute top-50 start-50 translate-middle" style="width: 13rem;">
              <p class="m-0 text-center">Community Tax Certificate</p>
            </div>
          </div>
          <div id="ctc-img-input" class="row mb-2 d-none">
            <label for="ctc-img" class="form-label px-0">Please insert a clear image of your CTC</label>
            <input type="file" accept="image/*" id="ctc-img" disabled class="form-control form-control-sm inputs" name="ctc_image" value="{{ old('ctc_image') }}">
            @error('ctc_image') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          @if (!is_null($document->bizClearance->ctc_photo))
            <div class="row justify-content-center mb-3">
              <img id="ctc-preview" src="{{ Storage::url($document->bizClearance->ctc_photo) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          @else
            <div id="ctc-preview-container" class="row justify-content-center mb-3 d-none">
              <img id="ctc-preview" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          @endif
          <div class="row mb-3">
            <label for="ctc" class="form-label px-0">CTC #</label>
            <input type="text" id="ctc" disabled class="form-control inputs" name="ctc" value="{{ old('ctc',$document->bizClearance->ctc) }}">
            @error('ctc') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="issued-at" class="form-label px-0">Issued at</label>
            <input type="text" id="issued-at" disabled class="form-control inputs" name="issued_at" value="{{ old('issued_at',$document->bizClearance->issued_at) }}">
            @error('issued_at') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="issued-on" class="form-label px-0">Issued on</label>
            <input type="date" id="issued-on" disabled class="form-control inputs" name="issued_on" value="{{ old('issued_on',$document->bizClearance->issued_on) }}">
            @error('issued_on') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <button id="confirmation" hidden type="submit" class="btn text-white my-4 rounded-pill px-4">Update</button>
        </form>
      </div>
    </div>

  </div>

@endsection

@section('scripts')

  <script>

    const confirmBtn = document.getElementById('confirmation');
    const ctcImgInputCont = document.getElementById('ctc-img-input');
    const proofImgInputCont = document.getElementById('proof-img-input');

    document.getElementById('edit-btn').addEventListener('click', () => {
      const inputs = document.querySelectorAll('.inputs');
      setTimeout(() => {
        inputs.forEach((input) => {
          input.toggleAttribute('disabled');
        });
        confirmBtn.toggleAttribute('hidden');
        ctcImgInputCont.classList.toggle('d-none');
        proofImgInputCont.classList.toggle('d-none');
      }, 300);
    });

    document.getElementById('biz-clearance-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Update Business Clearance?',
        text: "Are you sure you want to update this request?",
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
    const ctcPreviewCont = document.getElementById('ctc-preview-container');

    ctcImgInput.addEventListener('change', () => {
      previewImg.src = URL.createObjectURL(event.target.files[0]);
      if(ctcPreviewCont){
        ctcPreviewCont.classList.remove('d-none');
      }
    });

    const proofImgInput = document.getElementById('proof');
    const proofPreviewImage = document.getElementById('proof-preview');

    proofImgInput.addEventListener('change', () => {
      proofPreviewImage.src = URL.createObjectURL(event.target.files[0]);
    });

  </script>

@endsection