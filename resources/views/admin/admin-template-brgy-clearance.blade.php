<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Barangay Clearance</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/documents/clearance.css') }}">

  @livewireStyles
</head>
<body class="bg-white">
  <div class="container d-flex justify-content-end" style="width: 800px">
    <button class="btn btn-primary" id="print-btn">Print</button>
  </div>

  @livewire('admin.doc-templates.brgy-clearance', ['document' => $document])

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script>
    const printBtn = document.getElementById('print-btn');

    printBtn.addEventListener('click', () => {
      window.print();
    })
  </script>
</body>
</html>