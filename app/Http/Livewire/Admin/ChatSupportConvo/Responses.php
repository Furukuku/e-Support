<?php

namespace App\Http\Livewire\Admin\ChatSupportConvo;

use App\Models\ChatBotResponse;
use App\Models\ChatBotTag;
use Livewire\Component;
use Livewire\WithPagination;

class Responses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $response_id, $response;

    public $tag;

    public function mount(ChatBotTag $tag)
    {
        $this->tag = $tag;
    }

    public function updatingSearch()
    {
        $this->resetPage('responsesPage');
    }

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->reset('response_id', 'response');
    }

    public function addResponse()
    {
        $this->validate([
            'response' => ['required', 'string', 'max:255'],
        ]);

        ChatBotResponse::create([
            'chat_bot_tag_id' => $this->tag->id,
            'response' => $this->response,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Response successfully created']);
    }

    public function editResponse(ChatBotResponse $response)
    {
        $this->response_id = $response->id;
        $this->response = $response->response;
    }

    public function updateResponse()
    {
        $this->validate([
            'response' => ['required', 'string', 'max:255'],
        ]);

        $response = ChatBotResponse::find($this->response_id);
        $response->response = $this->response;
        $response->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Response updated successfully']);
    }
    
    public function deleteResponseConfirmation(ChatBotResponse $response)
    {
        $this->response_id = $response->id;
    }

    public function deleteResponse()
    {
        ChatBotResponse::find($this->response_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Response deleted successfully']);
    }

    public function render()
    {
        $responses = ChatBotResponse::where('chat_bot_tag_id', $this->tag->id)
            ->where(function($query) {
                $query->where('response', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'responsesPage');
    
        return view('livewire.admin.chat-support-convo.responses', ['responses' => $responses]);
    }
}
