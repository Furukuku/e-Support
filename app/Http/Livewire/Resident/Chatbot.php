<?php

namespace App\Http\Livewire\Resident;

use App\Models\Chatbot as ChatbotModel;
use App\Models\ChatBotPattern;
use App\Models\ChatBotResponse;
use App\Models\ChatBotTag;
use App\Models\FamilyMember;
use Livewire\Component;

class Chatbot extends Component
{
    public $chatBox = '';

    public $question;

    public $messages = [];

    public $stem = [];

    protected $listeners = ['send'];

    public function mount()
    {
        $this->dispatchBrowserEvent('scrollToEnd');
    }

    public function toggleChat()
    {
        if($this->chatBox === 'show'){
            $this->chatBox = 'hide';
            $this->dispatchBrowserEvent('scrollToEnd');
        }else{
            $this->chatBox = 'show';
            $this->dispatchBrowserEvent('scrollToEnd');
        }
        $this->dispatchBrowserEvent('focus');
    }

    public function send()
    {
        $this->validate([
            'question' => ['string', 'required', 'max:255'],
        ]);

        $this->dispatchBrowserEvent('sendQuestion', ['question' => $this->question]);

        // $patterns = ChatBotPattern::inRandomOrder()->get();
        // foreach($patterns as $index => $pattern){
        //     $keyword = $pattern->keyword;
        //     $question = strtolower($this->question);

        //     if(str_contains($question, $keyword)){
        //         $response = $pattern->tag->responses()->inRandomOrder()->first();
        //         if(!is_null($response)){
        //             $this->dispatchBrowserEvent('response', ['message' => $response->response]);
        //         }else{
        //             $this->dispatchBrowserEvent('response', ['message' => "I'm sorry, I don't understand your question."]);
        //         }
        //         break;
        //     }else if($index + 1 == $patterns->count()){
        //         $this->dispatchBrowserEvent('response', ['message' => "I'm sorry, I don't understand your question."]);
        //     }
        // }

        $question = strtolower($this->question);

        $pattern = ChatBotPattern::inRandomOrder()
            ->whereRaw("LOCATE(keyword, ?) > 0", [$question])
            ->first();

        if ($pattern) {
            $response = $pattern->tag->responses()->inRandomOrder()->first();
            if (!is_null($response)) {
                $this->dispatchBrowserEvent('response', ['message' => $response->response]);
            } else {
                $this->dispatchBrowserEvent('response', ['message' => "I'm sorry, I don't understand your question."]);
            }
        } else {
            $this->dispatchBrowserEvent('response', ['message' => "I'm sorry, I don't understand your question."]);
        }

        $this->reset('question');
    }

    public function render()
    {
        return view('livewire.resident.chatbot');
    }
}
