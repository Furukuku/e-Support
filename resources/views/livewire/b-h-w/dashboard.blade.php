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
            <h3 class="m-0">{{ array_sum($population) }}</h3>
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
  
    <div id="population-container" class="d-flex justify-content-center align-items-center bg-white position-relative border p-5 ps-2 rounded shadow mb-5 py-auto mx-auto" style="height: 80vh; width: 100%;">
      <canvas id="population"></canvas>
    </div>
  
    <div class="d-flex gap-4 justify-content-center">
      <div id="beneficiaries-container" class="d-flex justify-content-center align-items-center bg-white position-relative border p-5 rounded shadow mb-5 py-auto mx-auto" style="height: 80vh; width: 50%;">
        <canvas id="beneficiaries"></canvas>
      </div>

      <div id="sex-container" class="d-flex justify-content-center align-items-center bg-white position-relative border p-5 rounded shadow mb-5 py-auto mx-auto" style="height: 80vh; width: 50%;">
        <canvas id="sex"></canvas>
      </div>
    </div>
  </div>

  @push('script')
    <script>
      window.addEventListener('load', () => {
        const population = document.getElementById('population');
        const beneficiaries = document.getElementById('beneficiaries');
        const sex = document.getElementById('sex');
      
        new Chart(population, {
          type: 'bar',
          data: {
            labels: [
              '1',
              '2', 
              '3', 
              '4', 
              '5', 
              '6',
            ],
            datasets: [
              {
                label: 'Residents',
                data: @json($population),
                borderWidth: 1
              },
              {
                label: 'Males',
                data: @json($male),
                borderWidth: 1
              },
              {
                label: 'Females',
                data: @json($female),
                borderWidth: 1
              },
              {
                label: 'PWDs',
                data: @json($pwd),
                borderWidth: 1
              },
              {
                label: 'Solo Parents',
                data: @json($soloParent),
                borderWidth: 1
              },
              {
                label: 'Senior Citizens',
                data: @json($senior),
                borderWidth: 1
              },
              {
                label: 'Pregnants',
                data: @json($pregnant),
                borderWidth: 1
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Residents',
                  padding: 20,
                },
                ticks: {
                  precision: 0
                }
              },
              x: {
                title: {
                  display: true,
                  text: 'Zone',
                  padding: 20,
                }
              }
            },
            plugins: {
              title: {
                display: true,
                text: 'Population',
              }
            }
          }
        });

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
            responsive: true,
            maintainAspectRatio: true,
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
            responsive: true,
            maintainAspectRatio: true,
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

