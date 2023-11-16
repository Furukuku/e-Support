@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.manage.business-approval')

@endsection

@section('script')

  <script>

    $('#viewResident').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });

    // $('#viewBusiness').on('hidden.bs.modal', function (e) {
    //   Livewire.emit('closeModal');
    // });
    
    window.addEventListener('close-modal', () => {
      $('#viewBusiness').modal('hide');
      $('#declineConfirm').modal('hide');
      $('#showVerification').modal('hide');
      $('#archiveResident').modal('hide');
      $('#showBizVerification').modal('hide');
      $('#archiveBusiness').modal('hide');
    });

    window.addEventListener('declineConfirm', () => {
      $('#declineConfirm').modal('show');
    });


    // for resident verification document zooming
    const zoomImage = document.getElementById("zoomImage");
    let scale = 1;
    const zoomSpeed = 0.1; // Adjust the zoom speed as desired
    const maxScale = 5; // Set the maximum scale as desired

    zoomImage.addEventListener("wheel", zoomImageOnWheel);

    function zoomImageOnWheel(event) {
        event.preventDefault();
        const rect = zoomImage.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;
        const scrollAmount = event.deltaY > 0 ? -zoomSpeed : zoomSpeed;

        scale += scrollAmount;
        scale = Math.min(maxScale, Math.max(1, scale)); // Ensure scale is within the limits

        const offsetX = (x / rect.width) * 100;
        const offsetY = (y / rect.height) * 100;

        zoomImage.style.transformOrigin = `${offsetX}% ${offsetY}%`;
        zoomImage.style.transform = `scale(${scale})`;
    }


    // for business clearance zooming
    const bizZoomImage = document.getElementById("bizZoomImage");
    let bizScale = 1;
    const bizZoomSpeed = 0.1; // Adjust the zoom speed as desired
    const bizMaxScale = 5; // Set the maximum scale as desired

    bizZoomImage.addEventListener("wheel", bizZoomImageOnWheel);

    function bizZoomImageOnWheel(event) {
        event.preventDefault();
        const rect = bizZoomImage.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;
        const scrollAmount = event.deltaY > 0 ? -bizZoomSpeed : bizZoomSpeed;

        bizScale += scrollAmount;
        bizScale = Math.min(bizMaxScale, Math.max(1, bizScale)); // Ensure scale is within the limits

        const offsetX = (x / rect.width) * 100;
        const offsetY = (y / rect.height) * 100;

        bizZoomImage.style.transformOrigin = `${offsetX}% ${offsetY}%`;
        bizZoomImage.style.transform = `scale(${bizScale})`;
    }
  </script>

@endsection