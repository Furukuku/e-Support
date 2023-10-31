@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.documents.brgy-clearances')

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
      $('#brgyClearanceInfo').modal('hide');
    });

    window.addEventListener('showConfirmation', () => {
      $('#addDocConfirm').modal('show');
    });

    window.addEventListener('showReleaseConfirm', () => {
      $('#releaseDoc').modal('show');
    });

    const residentNameInput = document.getElementById('add-name');
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

  </script>

@endsection