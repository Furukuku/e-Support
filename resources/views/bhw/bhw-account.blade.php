@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.account')

@endsection

@section('script')

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

    window.addEventListener('refresh-page', e => {
      $('#user-username').text(e.detail.username);
      Toast.fire({
        icon: 'success',
        title: e.detail.usernameChanged,
        color: '#fff',
      });
    });
    
    window.addEventListener('success', e => {
      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });

  </script>

@endsection