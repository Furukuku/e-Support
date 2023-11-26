<div class="p-4 d-flex justify-content-center">
  
  <div class="w-100 px-4">
    <div class="row">
      <div class="col-sm-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">groups</span>
              </div>
            </div>
            <h3 class="m-0">{{ $population }}</h3>
            <p class="m-0">Residents</p>
          </div>
        </div>
      </div>
  
      <div class="col-sm-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">house</span>
              </div>
            </div>
            <h3 class="m-0">{{ $total_house_holds }}</h3>
            <p class="m-0">Households</p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">family_restroom</span>
              </div>
            </div>
            <h3 class="m-0">{{ $total_families }}</h3>
            <p class="m-0">Families</p>
          </div>
        </div>
      </div>
    </div>
  
    <div wire:ignore class="row justify-content-center">
      <div class="col-md-6 mb-3">
        <div wire:ignore id="beneficiaries-container" class="bg-white rounded shadow p-5">
          <canvas id="beneficiaries"></canvas>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div wire:ignore id="sex-container" class="bg-white rounded shadow p-5">
          <canvas id="sex"></canvas>
        </div>
      </div>
    </div>
  </div>

  @push('script')
    <script>
      window.addEventListener('load', () => {
        const beneficiaries = document.getElementById('beneficiaries');
        const sex = document.getElementById('sex');
      
        new Chart(beneficiaries, {
          type: 'pie',
          data: {
            labels: [
              'PWD', 
              'Solo Parent', 
              'Senior',
              'Pregnant',
            ],
            datasets: [
              {
                label: 'Resident',
                data: @json($beneficiaries),
              }
            ],
          },
          options: {
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Beneficiaries',
              }
            }
          }
        });


        new Chart(sex, {
          type: 'doughnut',
          data: {
            labels: [
              'Male', 
              'Female', 
            ],
            datasets: [
              {
                label: 'Resident',
                data: @json($sex),
              }
            ],
          },
          options: {
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Gender',
              }
            }
          }
        });

      });
      
    </script>
  @endpush

</div>