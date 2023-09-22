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
    });
  </script>

@endsection