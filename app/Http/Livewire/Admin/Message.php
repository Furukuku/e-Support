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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetMessage()
    {
        $this->message_content = '';
    }

    public function send()
    {
        $this->validate([
            'message_content' => 'required|string|max:160',
        ]);

        $residents = User::all();

        Notification::send($residents, new SMSBroadcast($this->message_content));

        SmsMessage::create([
            'content' => $this->message_content,
        ]);

        $this->dispatchBrowserEvent('success', ['success' => 'Message sent!']);
        $this->resetMessage();
    }

    public function render()
    {
        $messages = SmsMessage::where('content', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.message', ['messages' => $messages]);
    }
}
