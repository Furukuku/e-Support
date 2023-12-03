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

    public $message_content;
    public $recipient;
    public $message_and_recipient;
    public $password;

    public function mount()
    {
        $this->message_content = 'Brgy. Nancayasan ' . '(' . now()->format('d M Y') . ')';
    }

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
            'message_and_recipient',
            'recipient',
            'password'
        );
        $this->mount();
    }

    public function closeModalPass()
    {
        $this->reset('password');
        $this->resetErrorBag(['password']);
    }

    public function confirmSend()
    {
        $this->message_and_recipient = $this->message_content . "\n\n". "To: " . $this->recipient;
        
        $this->validate([
            'recipient' => 'required|string',
            'message_content' => 'required|string',
            'message_and_recipient' => 'required|string|max:160',
        ]);
        
        $this->dispatchBrowserEvent('passwordConfirm');
    }

    public function send()
    {
        $this->validate([
            'password' => 'required|current_password:admin',
        ]);

        $residents = User::where('is_approved', true)->get();

        Notification::send($residents, new SMSBroadcast($this->message_and_recipient));

        SmsMessage::create([
            'content' => $this->message_and_recipient,
        ]);

        $this->dispatchBrowserEvent('success', ['success' => 'Message sent!']);
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $messages = SmsMessage::where('content', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.message', ['messages' => $messages]);
    }
}
