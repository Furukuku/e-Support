<div class="py-5 px-4">
  
  <div class="container bg-light rounded position-relative pt-5 shadow">
    <div class="rounded p-2 shadow-sm message-header">
      <h2 class="px-3">Message</h2>
    </div>
    <div class="px-5 py-3">
      <div class="p-2">
        <label for="recipient">Recipient</label>
        <div class="input-group">
          <span class="input-group-text" id="to">To:</span>
          <input type="text" wire:model.defer="recipient" id="recipient" placeholder="ex. Senior Citizen, etc." class="form-control" aria-describedby="to">
        </div>
        @error('recipient') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="p-2">
        <textarea wire:model.defer="message_content" placeholder="Type something..." class="form-control" rows="5"></textarea>
        @error('message_content') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        @error('message_and_recipient') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
      </div>
      <div class="d-flex justify-content-center py-3">
        <button type="button" wire:click="confirmSend" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Send</button>
      </div>
    </div>
  </div>

  {{-- Send Modal --}}
  <div wire:ignore.self class="modal fade" id="sendMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sendMessageLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0 justify-content-end">
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModalPass" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body pt-0 px-5">
          <div class="d-flex justify-content-center mb-3">
            <span class="material-symbols-outlined fs-1">
              key
            </span>
          </div>
          <h4 class="text-center mb-4">Password</h4>
          <p class="text-center"><span class="fw-semibold">Note: </span>This will broadcast to all resident users!</p>
          <div class="position-relative">
            <input type="password" id="password" class="form-control" wire:model.defer="password" placeholder="Enter your password..." style="padding-right: 35px">
            <i class="fa-solid fa-eye d-none position-absolute top-50 translate-middle-y" id="show-password" style="right: 10px;cursor: pointer;"></i>
          </div>
          @error('password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" wire:click="send" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Send</button>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white officials-profile-table shadow rounded mx-auto mt-5">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>MESSAGES</h3>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="entries">Show</label>
        </div>
        <div class="col-2">
          <input id="entries" wire:model="paginate" type="number" min="0" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
          <label for="entries">entries</label>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="search">Search:</label>
        </div>
        <div class="col-auto">
          <input wire:model="search" id="search" type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="py-1 px-2">
      <table class="table border rounded table-striped">
        <thead>
          <tr>
            <th class="align-middle text-center">Content</th>
            <th class="align-middle text-center">Date</th>
            {{-- <th class="align-middle text-center">Action</th> --}}
          </tr>
        </thead>
        <tbody>
          @forelse ($messages as $message)
            <tr>
              <td class="align-middle text-center">{{ $message->content }}</td>
              <td class="align-middle text-center">{{ $message->created_at->format('M d, Y - h:i A') }}</td>
              {{-- <td class="align-middle text-center">
                <div class="mx-auto actions-container">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="view({{ $place }})" data-bs-toggle="modal" data-bs-target="#viewPlace"></i>
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="edit({{ $place }})" data-bs-toggle="modal" data-bs-target="#updatePlace"></i>
                  <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:click="archiveConfirmation({{ $place }})" data-bs-toggle="modal" data-bs-target="#archivePlace"></i>
                </div>
              </td> --}}
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $messages->links() }}
    </div>
  </div>

</div>
