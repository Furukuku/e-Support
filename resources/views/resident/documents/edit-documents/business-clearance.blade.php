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
        <h5 class="text-center text-white">Business Clearance</h5>
      </div>
      <div class="row">
        <div id="edit-btn" class="d-flex gap-2 align-items-center justify-content-end" style="cursor: pointer;">
          <p class="m-0">Edit</p>
          <i class="fa-solid fa-pen-to-square"></i>
        </div>
        <form id="biz-clearance-form" class="biz-clearance-form" action="{{ route('resident.update.biz-clearnce', ['id' => $document->id]) }}" method="POST" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="row mb-3">
            <label for="biz-nature" class="form-label px-0">Nature of Business</label>
            <input type="text" id="biz-nature" autocomplete="false" class="form-control inputs" disabled name="business_nature" value="{{ old('business_nature', $document->biz_nature) }}">
            @error('business_nature') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="name" class="form-label px-0">Name</label>
            <input type="text" id="name" class="form-control mb-2 inputs" disabled  name="owner_name" value="{{ old('owner_name', $document->biz_owner) }}" placeholder="Business Owner">
            @error('owner_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" class="form-control inputs" disabled name="business_name" value="{{ old('business_name', $document->biz_name) }}" placeholder="Name of Business">
            @error('business_name') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="row mb-3">
            <label for="address" class="form-label px-0">Address</label>
            <input type="text" id="address" class="form-control mb-2 inputs" disabled name="owner_address" value="{{ old('owner_address', $document->owner_address) }}" placeholder="Owner Address">
            @error('owner_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            <input type="text" class="form-control inputs" name="business_address" disabled value="{{ old('business_address', $document->biz_address) }}" placeholder="Business Address">
            @error('business_address') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
          </div>
          <div class="d-flex justify-content-start">
            <img id="preview-image" src="{{ Storage::url($document->proof) }}" alt="proof" style="height: 10rem; width: 10rem;">
          </div>
          <div class="row mb-3">
            <label for="proof" class="form-label px-0"><b>Proof of your business </b>(DTI, Business Clearance, etc.)</label>
            <input type="file" accept="image/*" id="proof" class="form-control form-control-sm inputs" disabled name="proof" value="{{ old('proof') }}">
            @error('proof') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
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
    const proof = document.getElementById('proof');
    const previewImage = document.getElementById('preview-image');

    proof.addEventListener('change', () => {
      previewImage.src = URL.createObjectURL(event.target.files[0]);
    });

    document.getElementById('edit-btn').addEventListener('click', () => {
      const inputs = document.querySelectorAll('.inputs');
      setTimeout(() => {
        inputs.forEach((input) => {
          input.toggleAttribute('disabled');
        });
        confirmBtn.toggleAttribute('hidden');
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

  </script>

@endsection