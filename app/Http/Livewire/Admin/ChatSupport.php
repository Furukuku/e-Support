<?php

namespace App\Http\Livewire\Admin;

use App\Models\ChatBotTag;
use Livewire\Component;
use Livewire\WithPagination;

class ChatSupport extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $tag_id, $name;

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->reset('tag_id', 'name');
    }

    public function addTag()
    {
        $this->validate([
            'name' => ['unique:chat_bot_tags,tag', 'required', 'string', 'max:255'],
        ]);

        ChatBotTag::create([
            'tag' => $this->name,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Topic successfully created']);
    }

    public function editTag(ChatBotTag $tag)
    {
        $this->tag_id = $tag->id;
        $this->name = $tag->tag;
    }

    public function updateTag()
    {
        $this->validate([
            'name' => ['unique:chat_bot_tags,tag,' . $this->tag_id, 'required', 'string', 'max:255'],
        ]);

        $tag = ChatBotTag::find($this->tag_id);
        $tag->tag = $this->name;
        $tag->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Topic updated successfully']);
    }

    public function deleteConfirmation(ChatBotTag $tag)
    {
        $this->tag_id = $tag->id;
    }

    public function deleteTag()
    {
        ChatBotTag::find($this->tag_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Topic archived successfully']);
    }

    public function render()
    {
        $tags = ChatBotTag::where('tag', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.chat-support', ['tags' => $tags]);
    }
}
