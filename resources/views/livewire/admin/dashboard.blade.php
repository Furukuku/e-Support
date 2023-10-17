<div class="p-4 d-flex justify-content-center">
  
  <div style="width: 75vw;">
    <div class="row">
      <div class="col-sm-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">patient_list</span>
              </div>
            </div>
            <h3 class="m-0">{{ array_sum($population) }}</h3>
            <p class="m-0">Total Residents</p>
          </div>
        </div>
      </div>
  
      <div class="col-sm-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">patient_list</span>
              </div>
            </div>
            <h3 class="m-0">{{ array_sum($employStatus) }}</h3>
            <p class="m-0">Total Resident Users</p>
          </div>
        </div>
      </div>
    </div>
  
    <div id="population-container" class="d-flex justify-content-center align-items-center bg-white position-relative border p-5 ps-2 rounded shadow mb-5 py-auto mx-auto" style="height: 80vh; width: 100%;">
      <canvas id="population"></canvas>
    </div>
  
    <div class="d-flex justify-content-center align-items-center bg-white position-relative border p-3 rounded shadow" style="height: 60vh; width: 30vw;">
      <canvas id="employ-status"></canvas>
    </div>
  </div>

  @push('script')
    <script>
      const population = document.getElementById('population');
      const employStatus = document.getElementById('employ-status');
    
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

      new Chart(employStatus, {
        type: 'doughnut',
        data: {
          labels: [
            'Employed',
            'Unemployed',
          ],
          datasets: [
            {
              label: 'Users',
              data: @json($employStatus),
              borderWidth: 1
            },
          ],
        },
        options: {
          plugins: {
            title: {
              display: true,
              text: "Users' Employment Status",
            }
          }
        }
      });
      
    </script>
  @endpush

</div>
