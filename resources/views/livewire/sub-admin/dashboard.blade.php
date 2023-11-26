<div class="p-4 d-flex justify-content-center">
  
  <div class="w-100">
    {{-- <div class="row justify-content-center">
      <div class="col-sm-6 mb-3">
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
                <span class="material-symbols-outlined">store</span>
              </div>
            </div>
            <h3 class="m-0">{{ $businessUsers }}</h3>
            <p class="m-0">Business Users</p>
          </div>
        </div>
      </div>

      <div class="col-sm-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
              <div class="rounded-circle card-icon">
                <span class="material-symbols-outlined">group</span>
              </div>
            </div>
            <h3 class="m-0">{{ array_sum($employStatus) }}</h3>
            <p class="m-0">Resident Users</p>
          </div>
        </div>
      </div>
    </div> --}}
  
    <div class="bg-white rounded shadow p-5 mb-3">
      <div wire:ignore id="population-container" class="row">
        <canvas id="population"></canvas>
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
  
    <div id="reports-container" class="bg-white rounded shadow p-5 mb-3">
      <div class="d-flex gap-3 w-100">
        <button type="button" wire:click="allData" class="btn px-4 {{ $checked === 'all' ? 'btn-secondary' : 'btn-transparent border border-secondary' }} btn-sm">All</button>
        <button type="button" wire:click="thisYear" class="btn {{ $checked === 'year' ? 'btn-secondary' : 'btn-transparent border border-secondary' }} btn-sm">This year</button>
        <button type="button" wire:click="thisMonth" class="btn {{ $checked === 'month' ? 'btn-secondary' : 'btn-transparent border border-secondary' }} btn-sm">This month</button>
        <button type="button" wire:click="thisWeek" class="btn {{ $checked === 'week' ? 'btn-secondary' : 'btn-transparent border border-secondary' }} btn-sm">This week</button>
      </div>
      <div wire:ignore class="row">
        <canvas id="graph-reports"></canvas>
      </div>
    </div>
  </div>

  @push('script')
    <script>
        const population = document.getElementById('population');
        const beneficiaries = document.getElementById('beneficiaries');
        const sex = document.getElementById('sex');
        const reports = document.getElementById('graph-reports');
      
        const populationChart = new Chart(population, {
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
                borderWidth: 1,
                borderRadius: 3,
              },
              {
                label: 'PWDs',
                data: @json($pwd),
                borderWidth: 1,
                borderRadius: 3,
              },
              {
                label: 'Solo Parents',
                data: @json($soloParent),
                borderWidth: 1,
                borderRadius: 3,
              },
              {
                label: 'Senior Citizens',
                data: @json($senior),
                borderWidth: 1,
                borderRadius: 3,
              },
              {
                label: 'Pregnants',
                data: @json($pregnant),
                borderWidth: 1,
                borderRadius: 3,
              },
            ],
          },
          options: {
            maintainAspectRatio: false,
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

        const beneficiariesChart = new Chart(beneficiaries, {
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

        const sexChart = new Chart(sex, {
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
  
        const reportChart = new Chart(reports, {
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
                label: 'Vehicle Accidents',
                data: @json($va),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Calamity and Disaster',
                data: @json($cd),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Illegal Gambling',
                data: @json($ig),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Drag Racing',
                data: @json($dr),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Stoning of Car',
                data: @json($sc),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Trouble',
                data: @json($tr),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Late-Night Karaoke Disturbance',
                data: @json($lnkd),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
              {
                label: 'Others',
                data: @json($others),
                borderWidth: 1,
                tension: 0.4,
                borderRadius: 3,
              },
            ],
          },
          options: {
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Incidents',
                  padding: 10,
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
                text: 'Reports',
              }
            }
          }
        });

        window.addEventListener('refresh-report', e => {
          for($i = 0; $i < 7; $i++){
            reportChart.data.datasets[$i].data = e.detail.reports[$i];
          }

          reportChart.update();
        });
      
    </script>
  @endpush

</div>
