<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link rel="stylesheet" href="{{ asset('css/generated-reports/residents.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

</head>
<body id="body" class="py-5 bg-light">

  <div id="btn-container" class="container d-flex justify-content-end py-2" style="width: 800px">
    <button type="button" id="print-btn" class="btn btn-primary"><span class="material-symbols-outlined align-middle">print</span></button>
  </div>

  <div id="printing-file" class="container bg-white border rounded shadow px-5 pt-4 pb-5" style="width: 800px">
    <header class="position-relative pt-2">
      <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg-enhanced.png') }}" class="position-absolute" alt="logo" style="height: 6rem; left: 0; top: 10px;">
      <p class="text-center m-0">CITY OF URDANETA</p>
      <p class="text-center">PROVINCE OF PANGASINAN</p>
      <h5 class="text-center fw-bold">AGE AND SEX DISAGGREGATED (80 YEARS OLD & ABOVE)</h5>
      <h5 class="text-center fw-bold">CY {{ now()->year }}</h5>
      <h6 class="mb-4 fw-semibold">BARANGAY: <u>NANCAYASAN</u></h6>
    </header>

    <main class="row mb-4">
      <div class="col-4">
        <table class="table-bordered w-100">
          <thead>
            <tr>
              <th class="px-2 fw-normal align-middle text-center fw-medium">AGE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">MALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">FEMALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ageCounts as $index => $ageCount)
              @if ($index <= 30)
                <tr>
                  <td class="align-middle text-center fw-medium">{{ $index }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['male'] }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['female'] }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['total'] }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <table class="table-bordered w-100">
          <thead>
            <tr>
              <th class="px-2 fw-normal align-middle text-center fw-medium">AGE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">MALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">FEMALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ageCounts as $index => $ageCount)
              @if ($index > 30 && $index <= 61)
                <tr>
                  <td class="align-middle text-center fw-medium">{{ $index }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['male'] }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['female'] }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['total'] }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <table class="table-bordered w-100">
          <thead>
            <tr>
              <th class="px-2 fw-normal align-middle text-center fw-medium">AGE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">MALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">FEMALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ageCounts as $index => $ageCount)
              @if ($index > 61)
                <tr>
                  @if ($index === 80)
                    <td class="align-middle text-center fw-medium">{{ $index }} & Above</td>
                  @else
                    <td class="align-middle text-center fw-medium">{{ $index }}</td>
                  @endif
                  <td class="align-middle text-center fw-medium">{{ $ageCount['male'] }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['female'] }}</td>
                  <td class="align-middle text-center fw-medium">{{ $ageCount['total'] }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </main>

    <footer class="row">
      <div class="col-6">
        <table class="table-bordered w-100">
          <caption class="caption-top text-center fw-medium border border-secondary border-bottom-0 text-dark">SUMMARY</caption>
          <thead>
            <tr>
              <th class="px-2 fw-normal align-middle text-center fw-medium">AGE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">MALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">FEMALE</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle text-center fw-medium">0 - 17</td>
              <td class="align-middle text-center fw-medium">{{ $minor_male }}</td>
              <td class="align-middle text-center fw-medium">{{ $minor_female }}</td>
              <td class="align-middle text-center fw-medium">{{ $minor_total }}</td>
            </tr>
            <tr>
              <td class="align-middle text-center fw-medium">18 - 79</td>
              <td class="align-middle text-center fw-medium">{{ $adult_male }}</td>
              <td class="align-middle text-center fw-medium">{{ $adult_female }}</td>
              <td class="align-middle text-center fw-medium">{{ $adult_total }}</td>
            </tr>
            <tr>
              <td class="align-middle text-center fw-medium">80 ABOVE</td>
              <td class="align-middle text-center fw-medium">{{ $senior_male }}</td>
              <td class="align-middle text-center fw-medium">{{ $senior_female }}</td>
              <td class="align-middle text-center fw-medium">{{ $senior_total }}</td>
            </tr>
            <tr>
              <td class="align-middle text-center fw-medium">TOTAL</td>
              <td class="align-middle text-center fw-medium">{{ $minor_male + $adult_male + $senior_male }}</td>
              <td class="align-middle text-center fw-medium">{{ $minor_female + $adult_female + $senior_female }}</td>
              <td class="align-middle text-center fw-medium">{{ $minor_total + $adult_total + $senior_total }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <table class="table-bordered w-100">
          <thead>
            <tr>
              <th class="px-2 fw-normal align-middle text-center fw-medium">YEAR</th>
              <th class="px-2 fw-normal align-middle text-center fw-medium">{{ now()->year }}</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle text-center fw-medium">NO. OF INHABITANTS</td>
              <td class="align-middle text-center fw-medium">{{ $minor_total + $adult_total + $senior_total }}</td>
            </tr>
            <tr>
              <td class="align-middle text-center fw-medium">NO. OF HOUSEHOLDS</td>
              <td class="align-middle text-center fw-medium">{{ $total_households }}</td>
            </tr>
            <tr>
              <td class="align-middle text-center fw-medium">NO. OF FAMILIES</td>
              <td class="align-middle text-center fw-medium">{{ $total_fam }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </footer>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script>

    const printBtn = document.getElementById('print-btn');

    printBtn.addEventListener('click', () => {
      window.print();
    });
  </script>
</body>
</html>