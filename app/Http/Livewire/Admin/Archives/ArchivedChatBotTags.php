<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\ChatBotTag;
use Livewire\Component;
use Livewire\WithPagination;

class ArchivedChatBotTags extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $tag_id;

    public function updatingSearch()
    {
        $this->resetPage('chatTagsPage');
    }

    public function resetVariables()
    {
        $this->reset('tag_id');
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $chatTag = ChatBotTag::onlyTrashed()->find($id);
        $this->tag_id = $chatTag->id;
    }

    public function restoreTag()
    {
        $chatTag = ChatBotTag::onlyTrashed()->find($this->tag_id);
        $chatTag->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Topic restored successfully']);
    }

    public function render()
    {
        $chatTags = ChatBotTag::onlyTrashed()
            ->where('tag', 'like', '%' . $this->search . '%')
            ->orderBy('deleted_at', 'desc')
            ->paginate($this->paginate, ['*'], 'chatTagsPage');

        return view('livewire.admin.archives.archived-chat-bot-tags', ['chatTags' => $chatTags]);
    }
}
