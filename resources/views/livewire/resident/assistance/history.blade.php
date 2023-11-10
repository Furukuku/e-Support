<div class="w-100 d-flex flex-column align-items-center py-2">

  <div class="row w-100 gap-2 justify-content-center">
    @forelse ($myAssistanceHistories as $myAssistanceHistory)
      <div wire:poll.60s class="col-auto mb-3">
        <a href="{{ route('resident.view.assist', ['assistance' => $myAssistanceHistory]) }}"style="text-decoration: none;">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $myAssistanceHistory->need }}</h5>
              <p class="card-text text-white fw-bold m-0">On: <span class="fw-normal">{{ date('M d, Y', strtotime($myAssistanceHistory->date)) }} - {{ date('h:i A', strtotime($myAssistanceHistory->time)) }}</span></p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-white">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill {{ $myAssistanceHistory->status === 'Declined' ? 'bg-danger' : 'bg-success' }} text-white ms-2 px-3">
                  {{ $myAssistanceHistory->status }}
                </div>
              </div>
              {{-- @if ($myAssistanceHistory->status === 'Declined')
                <div>
                  <span id="comment" class="material-symbols-outlined align-middle" style="cursor: pointer;">comment</span>
                </div>
                <script>
                  document.getElementById('comment').addEventListener('click', () => {
                    Swal.fire({
                      title: "Request Declined!",
                      text: "{{ $myAssistanceHistory->reason }}",
                      icon: "question",
                      confirmButtonColor: '#0e2c15dc'
                    });
                  });
                </script>
              @endif --}}
            </div>
          </div>
        </a>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no request history.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myAssistanceHistories->links() }}
  </div>

  

</div>