@extends('sub-bhw.sub-bhw-layout.sub-bhw-layout')

@section('content')

  @livewire('sub-b-h-w.residents')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addResident').modal('hide');
      $('#updateResident').modal('hide');
      $('#deleteResident').modal('hide');
      $('#deleteFamily').modal('hide');
      $('#viewResident').modal('hide');
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

    // // addWife
    // window.addEventListener('addWife', function(){
    //   // add modal
    //   $('#add-wife').addClass('border-black');
    //   $('#add-family-member').removeClass('border-black');
    //   $('#add-family-head').removeClass('border-black');
    //   $('#add-info').removeClass('border-black');
    //   $('#add-member').removeClass('border-black');
      
    //   $('#add-wife-container').removeClass('d-none');
    //   $('#add-family-member-container').addClass('d-none');
    //   $('#add-family-head-container').addClass('d-none');
    //   $('#add-info-container').addClass('d-none');
    //   $('#add-member-container').addClass('d-none');

    //   // edit modal
    //   $('#edit-wife').addClass('border-black');
    //   $('#edit-family-member').removeClass('border-black');
    //   $('#edit-family-head').removeClass('border-black');
    //   $('#edit-info').removeClass('border-black');
    //   $('#edit-member').removeClass('border-black');
      
    //   $('#edit-wife-container').removeClass('d-none');
    //   $('#edit-family-member-container').addClass('d-none');
    //   $('#edit-family-head-container').addClass('d-none');
    //   $('#edit-info-container').addClass('d-none');
    //   $('#edit-member-container').addClass('d-none');
    // });

    // // add modals
    // $('#add-family-head').click(function(){
    //   $('#add-family-head').addClass('border-black');
    //   $('#add-wife').removeClass('border-black');
    //   $('#add-family-member').removeClass('border-black');
    //   $('#add-info').removeClass('border-black');
    //   $('#add-member').removeClass('border-black');

    //   $('#add-family-head-container').removeClass('d-none');
    //   $('#add-wife-container').addClass('d-none');
    //   $('#add-family-member-container').addClass('d-none');
    //   $('#add-info-container').addClass('d-none');
    //   $('#add-member-container').addClass('d-none');
    // });

    // $('#add-wife').click(function(){
    //   $('#add-wife').addClass('border-black');
    //   $('#add-family-head').removeClass('border-black');
    //   $('#add-family-member').removeClass('border-black');
    //   $('#add-info').removeClass('border-black');
    //   $('#add-member').removeClass('border-black');
      
    //   $('#add-wife-container').removeClass('d-none');
    //   $('#add-family-head-container').addClass('d-none');
    //   $('#add-family-member-container').addClass('d-none');
    //   $('#add-info-container').addClass('d-none');
    //   $('#add-member-container').addClass('d-none');
    // });

    // $('#add-family-member').click(function(){
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
    // });

    // $('#add-info').click(function(){
    //   $('#add-info').addClass('border-black');
    //   $('#add-family-head').removeClass('border-black');
    //   $('#add-wife').removeClass('border-black');
    //   $('#add-family-member').removeClass('border-black');
    //   $('#add-member').removeClass('border-black');
      
    //   $('#add-info-container').removeClass('d-none');
    //   $('#add-family-head-container').addClass('d-none');
    //   $('#add-wife-container').addClass('d-none');
    //   $('#add-family-member-container').addClass('d-none');
    //   $('#add-member-container').addClass('d-none');
    // });

    // $('#add-member').click(function(){
    //   $('#add-member').addClass('border-black');
    //   $('#add-family-head').removeClass('border-black');
    //   $('#add-wife').removeClass('border-black');
    //   $('#add-family-member').removeClass('border-black');
    //   $('#add-info').removeClass('border-black');
      
    //   $('#add-member-container').removeClass('d-none');
    //   $('#add-family-head-container').addClass('d-none');
    //   $('#add-wife-container').addClass('d-none');
    //   $('#add-family-member-container').addClass('d-none');
    //   $('#add-info-container').addClass('d-none');
    // });

    // // edit modals
    // $('#edit-family-head').click(function(){
    //   $('#edit-family-head').addClass('border-black');
    //   $('#edit-wife').removeClass('border-black');
    //   $('#edit-family-member').removeClass('border-black');
    //   $('#edit-info').removeClass('border-black');
    //   $('#edit-member').removeClass('border-black');

    //   $('#edit-family-head-container').removeClass('d-none');
    //   $('#edit-wife-container').addClass('d-none');
    //   $('#edit-family-member-container').addClass('d-none');
    //   $('#edit-info-container').addClass('d-none');
    //   $('#edit-member-container').addClass('d-none');
    // });

    // $('#edit-wife').click(function(){
    //   $('#edit-wife').addClass('border-black');
    //   $('#edit-family-head').removeClass('border-black');
    //   $('#edit-family-member').removeClass('border-black');
    //   $('#edit-info').removeClass('border-black');
    //   $('#edit-member').removeClass('border-black');
      
    //   $('#edit-wife-container').removeClass('d-none');
    //   $('#edit-family-head-container').addClass('d-none');
    //   $('#edit-family-member-container').addClass('d-none');
    //   $('#edit-info-container').addClass('d-none');
    //   $('#edit-member-container').addClass('d-none');
    // });

    // $('#edit-family-member').click(function(){
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

    // $('#edit-info').click(function(){
    //   $('#edit-info').addClass('border-black');
    //   $('#edit-family-head').removeClass('border-black');
    //   $('#edit-wife').removeClass('border-black');
    //   $('#edit-family-member').removeClass('border-black');
    //   $('#edit-member').removeClass('border-black');
      
    //   $('#edit-info-container').removeClass('d-none');
    //   $('#edit-family-head-container').addClass('d-none');
    //   $('#edit-wife-container').addClass('d-none');
    //   $('#edit-family-member-container').addClass('d-none');
    //   $('#edit-member-container').addClass('d-none');
    // });

    // $('#edit-member').click(function(){
    //   $('#edit-member').addClass('border-black');
    //   $('#edit-family-head').removeClass('border-black');
    //   $('#edit-wife').removeClass('border-black');
    //   $('#edit-family-member').removeClass('border-black');
    //   $('#edit-info').removeClass('border-black');
      
    //   $('#edit-member-container').removeClass('d-none');
    //   $('#edit-family-head-container').addClass('d-none');
    //   $('#edit-wife-container').addClass('d-none');
    //   $('#edit-family-member-container').addClass('d-none');
    //   $('#edit-info-container').addClass('d-none');
    // });

  </script>

@endsection