@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.documents.business-clearances')

@endsection

@section('script')

  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script>

    const scanner = new Html5QrcodeScanner('reader', {
      fps: 60,
      qrbox: {
        width: 400, 
        height: 400,
      },
    }, false);

    function onScanSuccess(decodedText, decodedResult) {
      Livewire.emit('getDocDetails', decodedText);
      scanner.clear();
      // document.getElementById('reader').remove();
      $('#qrCodeScanner').modal('hide');
      $('#qrResult').modal('show');
    }

    function onScanFailure(error) {
      // handle scan failure, usually better to ignore and keep scanning.
      // for example:
      // console.warn(`Code scan error = ${error}`);
    }

    document.getElementById('scanner-btn').addEventListener('click', () => {
      scanner.render(onScanSuccess, onScanFailure);
    });

    document.getElementById('stop-sc').addEventListener('click', () => {
      scanner.clear();
    });

    window.addEventListener('close-modal', () => {
      $('#qrResult').modal('hide');
      $('#editDoc').modal('hide');
      $('#addDoc').modal('hide');
      $('#addDocConfirm').modal('hide');
      $('#releaseDoc').modal('hide');
      $('#bizClearanceInfo').modal('hide');
      $('#generateReport').modal('hide');
      $('#declineDoc').modal('hide');
    });

    window.addEventListener('showConfirmation', () => {
      $('#addDocConfirm').modal('show');
    });

    window.addEventListener('showReleaseConfirm', () => {
      $('#releaseDoc').modal('show');
    });

    const residentNameInput = document.getElementById('biz_owner');
    const suggestionContainer = document.getElementById('name-suggestion-container');

    document.addEventListener('click', e => {
      if(!residentNameInput.contains(e.target)){
        suggestionContainer.classList.add('d-none');
      }
    });
    
    window.addEventListener('hideSuggestions', () => {
      suggestionContainer.classList.add('d-none');
    });

    residentNameInput.addEventListener('focus', () => {
      suggestionContainer.classList.remove('d-none');
    });

    residentNameInput.addEventListener('click', () => {
      suggestionContainer.classList.remove('d-none');
    });


    window.addEventListener('successToast', e => {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      });

      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });

  </script>

  @if (session('success'))
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      });

      Toast.fire({
        icon: 'success',
        title: "{{ session('success') }}",
        color: '#fff',
      });
    </script>
  @endif

@endsection