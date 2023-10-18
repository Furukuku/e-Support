<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Barangay Clearance</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/documents/clearance.css') }}">

  @livewireStyles
</head>
<body class="bg-light">
  @if ($document->is_released == false && $document->status == 'Pending')
    <div class="container d-flex gap-3 justify-content-end mb-2" style="width: 800px">
      <button class="btn btn-primary print-btn" id="print-btn">
        <span class="material-symbols-outlined align-middle">print</span>
      </button>
      <button class="btn btn-success px-3" data-bs-toggle="modal" data-bs-target="#confirm">
        <i class="fa-solid fa-file-circle-check"></i>
      </button>
    </div>

    <div wire:ignore.self class="modal fade release-modal" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header border-0 pb-0 justify-content-end">
            <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" aria-label="Close">
              cancel
            </span>
          </div>
          <div class="modal-body pt-0">
            <div class="d-flex justify-content-center mb-3">
              <span class="material-symbols-outlined fs-1 text-warning">
                warning
              </span>
            </div>
            <h4 class="text-center mb-3">Release Certificate of Indigency?</h4>
            <p class="text-center confirm-fs">Are you sure you're done printing this document? You cannot revert this.</p>
          </div>
          <div class="modal-footer d-flex justify-content-center border-0">
            <button type="button" class="btn btn-secondary px-4 mx-3" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="confirm-btn" class="btn btn-success px-4 mx-3">Release</button>
          </div>
        </div>
      </div>
    </div>
  @endif

  @livewire('admin.doc-templates.indigency', ['document' => $document])

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  @if ($document->is_released == false && $document->status == 'Pending')
    <script>
      const printBtn = document.getElementById('print-btn');
      const confirmBtn = document.getElementById('confirm-btn');

      printBtn.addEventListener('click', () => {
        window.print();
      })

      confirmBtn.addEventListener('click', () => {
        Livewire.emit('confirm');
      });

      window.addEventListener('close-modal', () => {
        $('#confirm').modal('hide');
      });
    </script>
  @endif
</body>
</html>