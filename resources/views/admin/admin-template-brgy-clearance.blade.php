<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Barangay Clearance</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/documents/clearance.css') }}">

  @livewireStyles
</head>
<body class="bg-light">

  @livewire('admin.doc-templates.brgy-clearance', ['document' => $document])

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  @if ($document->is_released == false)
    <script>
      const printBtn = document.getElementById('print-btn');
      // const confirmBtn = document.getElementById('confirm-btn');

      printBtn.addEventListener('click', () => {
        window.print();
      })

      // confirmBtn.addEventListener('click', () => {
      //   Livewire.emit('confirm');
      // });

      window.addEventListener('close-modal', () => {
        $('#confirm').modal('hide');
      });

    </script>
  @endif

</body>
</html>