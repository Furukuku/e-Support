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

        // $response = '';

        // $lower_question = strtolower($this->question);
        // if(str_contains($lower_question, 'hello') || str_contains($lower_question, 'hi') || str_contains($lower_question, 'greetings') || str_contains($lower_question, 'kamusta'))
        // {
        //     $chatbot = ChatbotModel::where('question', 'hello')->first();
        //     $this->dispatchBrowserEvent('response', ['message' => $chatbot->response]);
        // }
        // else if(str_contains($lower_question, 'jobs') || str_contains($lower_question, 'job') || str_contains($lower_question, 'trabaho') || str_contains($lower_question, 'works') || str_contains($lower_question, 'work'))
        // {
        //     $chatbot = ChatbotModel::where('question', 'job')->first();
        //     $this->dispatchBrowserEvent('response', ['message' => $chatbot->response]);
        // }
        // else if(str_contains($lower_question, 'putang') || str_contains($lower_question, 'putangina') || str_contains($lower_question, 'putanginamo') || str_contains($lower_question, 'inamo') || str_contains($lower_question, 'ina mo') || str_contains($lower_question, 'fuck') || str_contains($lower_question, 'fuck you'))
        // {
        //     $chatbot = ChatbotModel::where('question', 'badwords')->first();
        //     $this->dispatchBrowserEvent('response', ['message' => $chatbot->response]);
        // }
        // else
        // {
        //     $chatbot = ChatbotModel::where('question', 'like', '%' . $lower_question . '%')->first();
        //     if(is_null($chatbot)){
        //         $this->dispatchBrowserEvent('response', ['message' => "I'm sorry, I don't understand your question."]);
        //     }else{
        //         $this->dispatchBrowserEvent('response', ['message' => $chatbot->response]);
        //     }
        // }
        // $tag = ChatBotTag::first();
        // $response = ChatBotResponse::with('tag')->first();
        // dd($response->tag);

        $patterns = ChatBotPattern::inRandomOrder()->get();
        foreach($patterns as $index => $pattern){
            $keyword = $pattern->keyword;
            $question = strtolower($this->question);

            // if($pattern->tag->is_prior == true){
            //     if(str_contains($question, $keyword)){
            //         $response = $pattern->tag->responses()->inRandomOrder()->first();
            //         $this->dispatchBrowserEvent('response', ['message' => $response->response]);
            //         break;
            //     }
            // }

            if(str_contains($question, $keyword)){
                $response = $pattern->tag->responses()->inRandomOrder()->first();
                $this->dispatchBrowserEvent('response', ['message' => $response->response]);
                break;
            }else if($index + 1 == $patterns->count()){
                $this->dispatchBrowserEvent('response', ['message' => "I'm sorry, I don't understand your question."]);
            }
        }

        $this->reset('question');
    }

    public function render()
    {
        return view('livewire.resident.chatbot');
    }
}
