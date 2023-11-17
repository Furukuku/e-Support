@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.patients')

@endsection

@section('script')
  <script>

    window.addEventListener('close-modal', () => {
      $('#addPatient').modal('hide');
      $('#updatePatient').modal('hide');
      // $('#deleteResident').modal('hide');
    });

    // $('#viewResident').on('hidden.bs.modal', function (e) {
    //   Livewire.emit('closeModal');
    // });

    // window.addEventListener('addMembers', function(){
    //   // add modal
    //   $('#add-family-member').addClass('border-black');
    //   $('#add-family-head').removeClass('border-black');
    //   $('#add-wife').removeClass('border-black');
    //   $('#add-info').removeClass('border-black');
    //   $('#add-member').removeClass('border-black');
      
    //   $('#add-family-member-container').removeClass('d-none');
    //   $('#add-family-head-container').addClass('d-none');
    //   $('#add-wife-container').addClass('d-none');
    //   $('#add-info-container').addClass('d-none');
    //   $('#add-member-container').addClass('d-none');

    //   // edit modal
    //   $('#edit-family-member').addClass('border-black');
    //   $('#edit-family-head').removeClass('border-black');
    //   $('#edit-wife').removeClass('border-black');
    //   $('#edit-info').removeClass('border-black');
    //   $('#edit-member').removeClass('border-black');
      
    //   $('#edit-family-member-container').removeClass('d-none');
    //   $('#edit-family-head-container').addClass('d-none');
    //   $('#edit-wife-container').addClass('d-none');
    //   $('#edit-info-container').addClass('d-none');
    //   $('#edit-member-container').addClass('d-none');
    // });

    // add modals
    $('#add-patient').click(function(){
      $('#add-patient').addClass('border-black');
      $('#add-philhealth').removeClass('border-black');
      $('#add-vital-signs').removeClass('border-black');

      $('#add-patient-container').removeClass('d-none');
      $('#add-philhealth-container').addClass('d-none');
      $('#add-vital-signs-container').addClass('d-none');
    });

    $('#add-philhealth').click(function(){
      $('#add-philhealth').addClass('border-black');
      $('#add-patient').removeClass('border-black');
      $('#add-vital-signs').removeClass('border-black');
      
      $('#add-philhealth-container').removeClass('d-none');
      $('#add-patient-container').addClass('d-none');
      $('#add-vital-signs-container').addClass('d-none');
    });

    $('#add-vital-signs').click(function(){
      $('#add-vital-signs').addClass('border-black');
      $('#add-patient').removeClass('border-black');
      $('#add-philhealth').removeClass('border-black');
      
      $('#add-vital-signs-container').removeClass('d-none');
      $('#add-patient-container').addClass('d-none');
      $('#add-philhealth-container').addClass('d-none');
    });

    // edit modals
    $('#edit-patient').click(function(){
      $('#edit-patient').addClass('border-black');
      $('#edit-philhealth').removeClass('border-black');
      $('#edit-vital-signs').removeClass('border-black');

      $('#edit-patient-container').removeClass('d-none');
      $('#edit-philhealth-container').addClass('d-none');
      $('#edit-vital-signs-container').addClass('d-none');
    });

    $('#edit-philhealth').click(function(){
      $('#edit-philhealth').addClass('border-black');
      $('#edit-patient').removeClass('border-black');
      $('#edit-vital-signs').removeClass('border-black');
      
      $('#edit-philhealth-container').removeClass('d-none');
      $('#edit-patient-container').addClass('d-none');
      $('#edit-vital-signs-container').addClass('d-none');
    });

    $('#edit-vital-signs').click(function(){
      $('#edit-vital-signs').addClass('border-black');
      $('#edit-patient').removeClass('border-black');
      $('#edit-philhealth').removeClass('border-black');
      
      $('#edit-vital-signs-container').removeClass('d-none');
      $('#edit-patient-container').addClass('d-none');
      $('#edit-philhealth-container').addClass('d-none');
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
@endsection