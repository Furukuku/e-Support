<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Notifications\SMSBroadcast;
use Illuminate\Support\Facades\Notification;
use App\Models\Message as SmsMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $search = '';

    public $message_content, $password;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(
            'message_content',
            'password'
        );
    }

    public function confirmSend()
    {
        $this->validate([
            'message_content' => 'required|string|max:160',
        ]);

        $this->dispatchBrowserEvent('passwordConfirm');
    }

    public function send()
    {
        $this->validate([
            'password' => 'required|current_password:admin',
        ]);

        $residents = User::all();

        $notification = Notification::send($residents, new SMSBroadcast($this->message_content));

        if($notification){
            SmsMessage::create([
                'content' => $this->message_content,
            ]);

            $this->dispatchBrowserEvent('success', ['success' => 'Message sent!']);
            $this->dispatchBrowserEvent('close-modal');
            $this->closeModal();
        }else{
            $this->dispatchBrowserEvent('failed', ['failed' => 'Message not sent!']);
            $this->dispatchBrowserEvent('close-modal');
            $this->closeModal();
        }

    }

    public function render()
    {
        $messages = SmsMessage::where('content', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.message', ['messages' => $messages]);
    }
}
