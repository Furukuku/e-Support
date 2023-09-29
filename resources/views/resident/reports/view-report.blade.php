@extends('resident.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="container py-3 d-flex gap-2 justify-content-around view-report-container">
      @if ($report->status === 'Pending')
        <div class="col rounded py-3 mb-3">
          <img id="preview-image" class="object-fit-contain border rounded" src="{{ Storage::url($report->report_img) }}" alt="preview-image" style="max-width: 20rem;">
        </div>
        <div class="col">
          <form id="report-form" class="biz-clearance-form" action="{{ route('resident.update-report', ['report' => $report]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row mb-3">
              <label for="report" class="form-label px-0">Kind of Report</label>
              <select name="kind_of_report" class="form-select" id="report">
                <option value="">Choose One...</option>
                <option value="Vehicle Accident" {{ old('kind_of_report', $report->report_name) == 'Vehicle Accident' ? 'selected' : '' }}>Vehicle Accident</option>
                <option value="Drag Racing" {{ old('kind_of_report', $report->report_name) == 'Drag Racing' ? 'selected' : '' }}>Drag Racing</option>
                <option value="Stoning of Car" {{ old('kind_of_report', $report->report_name) == 'Stoning of Car' ? 'selected' : '' }}>Stoning of Car</option>
                <option value="Complaint" {{ old('kind_of_report', $report->report_name) == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                <option value="Calamity" {{ old('kind_of_report', $report->report_name) == 'Calamity' ? 'selected' : '' }}>Calamity</option>
                <option value="Others" {{ old('kind_of_report', $report->report_name) == 'Others' ? 'selected' : '' }}>Others</option>
              </select>
              @error('kind_of_report') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-3">
              <label for="zone" class="form-label px-0">Zone</label>
              <select id="zone" class="form-select" name="zone">
                <option value="">Choose one...</option>
                @for ($i = 1; $i <= 6; $i++)
                  <option value="{{ $i }}"
                  @if (old('zone', $report->zone) == $i)
                    selected
                  @endif
                  >{{ $i }}</option>
                @endfor
              </select>
              @error('zone') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-3">
              <label for="photo" class="form-label px-0">Photo <span style="font-size: 0.80rem;">(Insert a photo of your report)</span></label>
              <input type="file" accept="image/*" id="photo" class="form-control form-control-sm mb-2" name="photo">
              @error('photo') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="row mb-3">
              <label for="description" class="form-label px-0">Description</span></label>
              <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $report->description) }}</textarea>
              @error('description') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-between my-4">
              <a href="{{ route('resident.services') }}" class="btn btn-secondary rounded-pill px-4 d-none back-btn">Back</a>
              <button type="submit" class="btn text-white rounded-pill px-4 report-update-btn">Update</button>
            </div>
          </form>
        </div>
      @else
        <div class="col rounded py-3 mb-3">
          <img class="object-fit-contain border rounded" src="{{ Storage::url($report->report_img) }}" alt="preview-image" style="max-width: 20rem;">
        </div>
        <div class="col">
          <div class="row mb-3">
            <h5 class="m-0 fw-bold">Kind of Report: <span class="fw-normal">{{ $report->report_name }}</span></h5>
          </div>
          <div class="row mb-3">
            <p class="m-0 fw-bold">Zone: <span class="fw-normal">{{ $report->zone }}</span></p>
          </div>
          <div class="row mb-3">
            <p class="fw-bold mb-1">Description</p>
            <p class="text-break" style="text-indent: 20px;">{{ $report->description }}</p>
          </div>
          <div class="d-flex justify-content-start">
            <a href="{{ route('resident.services') }}" class="btn btn-secondary rounded-pill px-4 d-none back-btn">Back</a>
          </div>
        </div>
      @endif
    </div>

  </div>

@endsection

@if ($report->status === 'Pending')
  @section('scripts')

    <script>

      const photo = document.getElementById('photo');
      const previewImage = document.getElementById('preview-image');

      photo.addEventListener('change', () => {
        previewImage.src = URL.createObjectURL(event.target.files[0]);
      });

      document.getElementById('report-form').addEventListener('submit', e => {
        e.preventDefault();
        Swal.fire({
          title: 'Update Report?',
          text: "Are you sure you want to update this report?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0e2c15dc',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#report-form').submit();
          }
        });
      });

    </script>

  @endsection
@endif