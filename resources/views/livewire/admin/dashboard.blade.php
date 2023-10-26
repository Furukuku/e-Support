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
            <p class="m-0">Total Residents</p>
          </div>
        </div>
      </div>
  
      <div class="col-sm-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">store</span>
              </div>
            </div>
            <h3 class="m-0">{{ $businessUsers }}</h3>
            <p class="m-0">Total Business Users</p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">group</span>
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
  
    <div class="d-flex justify-content-center align-items-center bg-white position-relative border p-3 rounded shadow mb-5" style="width: 100%;">
      <canvas id="graph-reports"></canvas>
    </div>

    <div class="d-flex justify-content-center align-items-center bg-white position-relative border p-3 rounded shadow" style="width: 50%;">
      <canvas id="employ-status"></canvas>
    </div>
  </div>

  @push('script')
    <script>
      window.addEventListener('load', () => {
        const population = document.getElementById('population');
        const employStatus = document.getElementById('employ-status');
        const reports = document.getElementById('graph-reports');
      
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
  
        new Chart(reports, {
          type: 'line',
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
                label: 'Vehicle Accidents',
                data: @json($va),
                borderWidth: 1,
                borderColor: '#C0C0C0',
                backgroundColor: '#C0C0C0',
                tension: 0.4
              },
              {
                label: 'Calamity and Disaster',
                data: @json($cd),
                borderWidth: 1,
                borderColor: '#008080',
                backgroundColor: '#008080',
                tension: 0.4
              },
              {
                label: 'Illegal Gambling',
                data: @json($ig),
                borderWidth: 1,
                borderColor: '#FFD700',
                backgroundColor: '#FFD700',
                tension: 0.4
              },
              {
                label: 'Child Abuse',
                data: @json($ca),
                borderWidth: 1,
                borderColor: '#9932CC',
                backgroundColor: '#9932CC',
                tension: 0.4
              },
              {
                label: 'Community Cleanliness',
                data: @json($cc),
                borderWidth: 1,
                borderColor: '#00FF00',
                backgroundColor: '#00FF00',
                tension: 0.4
              },
              {
                label: 'Public Safety Concern',
                data: @json($psc),
                borderWidth: 1,
                borderColor: '#FF1493',
                backgroundColor: '#FF1493',
                tension: 0.4
              },
              {
                label: 'Late-Night Karaoke Disturbance',
                data: @json($lnkd),
                borderWidth: 1,
                borderColor: '#1E90FF',
                backgroundColor: '#1E90FF',
                tension: 0.4
              },
              {
                label: 'Environmental Hazard',
                data: @json($eh),
                borderWidth: 1,
                borderColor: '#FFEBCD',
                backgroundColor: '#FFEBCD',
                tension: 0.4
              },
              {
                label: 'Infrastructure Problems',
                data: @json($ip),
                borderWidth: 1,
                borderColor: '#800080',
                backgroundColor: '#800080',
                tension: 0.4
              },
              {
                label: 'Drug Racing',
                data: @json($dr),
                borderWidth: 1,
                borderColor: '#008000',
                backgroundColor: '#008000',
                tension: 0.4
              },
              {
                label: 'Stoning of Car',
                data: @json($sc),
                borderWidth: 1,
                borderColor: '#FF6347',
                backgroundColor: '#FF6347',
                tension: 0.4
              },
              {
                label: 'Complaint',
                data: @json($cp),
                borderWidth: 1,
                borderColor: '#F0E68C',
                backgroundColor: '#F0E68C',
                tension: 0.4
              },
              {
                label: 'Others',
                data: @json($others),
                borderWidth: 1,
                borderColor: '#FF8C00',
                backgroundColor: '#FF8C00',
                tension: 0.4
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
              y: {
                grid: {
                  display: false,
                },
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Incidents',
                  padding: 10,
                }
              },
              x: {
                grid: {
                  display: false,
                },
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
                text: 'Reports',
              }
            }
          }
        });
      });
      
    </script>
  @endpush

</div>
