<?php

namespace App\Http\Livewire\Admin\ChatSupportConvo;

use App\Models\ChatBotPattern;
use App\Models\ChatBotTag;
use Livewire\Component;
use Livewire\WithPagination;

class Patterns extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $search = "";

    public $pattern_id, $question;

    public $tag;

    public function mount(ChatBotTag $tag)
    {
        $this->tag = $tag;
    }

    public function updatingSearch()
    {
        $this->resetPage('questionsPage');
    }

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->reset('pattern_id', 'question');
    }

    public function addPattern()
    {
        $this->validate([
            'question' => ['required', 'string', 'max:255'],
        ]);

        ChatBotPattern::create([
            'chat_bot_tag_id' => $this->tag->id,
            'keyword' => $this->question,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function editPattern(ChatBotPattern $question)
    {
        $this->pattern_id = $question->id;
        $this->question = $question->keyword;
    }

    public function updatePattern()
    {
        $this->validate([
            'question' => ['required', 'string', 'max:255'],
        ]);

        $question = ChatBotPattern::find($this->pattern_id);
        $question->keyword = $this->question;
        $question->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }
    
    public function deletePatternConfirmation(ChatBotPattern $question)
    {
        $this->pattern_id = $question->id;
    }

    public function deletePattern()
    {
        ChatBotPattern::find($this->pattern_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $questions = ChatBotPattern::where('chat_bot_tag_id', $this->tag->id)
            ->where(function($query) {
                $query->where('keyword', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'questionsPage');

        return view('livewire.admin.chat-support-convo.patterns', ['questions' => $questions]);
    }
}