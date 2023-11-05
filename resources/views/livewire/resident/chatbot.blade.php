<div>
  
  <div id="chat-box" class="bg-white border rounded shadow chat-box {{ $chatBox }}">
    <div class="d-flex justify-content-center align-items-center rounded-top position-relative message-header">
      <h5 class="text-white text-center m-0">Chat Support</h5>
      <span class="position-absolute top-0 d-none chatbot-close-btn" wire:click="toggleChat" style="right: 0.5rem; cursor: pointer;"><i class="fa-solid fa-xmark text-light"></i></span>
    </div>
    <div wire:ignore id="chat-messages" class="d-flex flex-column gap-3 px-2 py-4 overflow-y-auto chat-messages">

    </div>
    <div class="d-flex align-items-center justify-content-between gap-2 px-2 border rounded-bottom message-box">
      <textarea id="question-field" wire:model.defer="question" class="px-2 rounded" placeholder="Ask something..." rows="1"></textarea>
      <div wire:click="send" class="d-flex justify-content-center align-items-center">
        <i class="fa-regular fa-paper-plane"></i>
      </div>
    </div>
  </div>

  <div wire:click="toggleChat" class="rounded-circle shadow chatbot-circle {{ str_contains(Route::currentRouteName(), 'resident.services') ? 'move-up' : '' }}">
    <i class="fa-regular fa-comment text-light fs-4 position-absolute top-50 start-50 translate-middle {{ $chatBox === 'hide' ||  $chatBox === '' ? '' : 'd-none' }}"></i>
    <i class="fa-solid fa-xmark text-light position-absolute top-50 start-50 close-chatbot-icon {{ $chatBox === 'hide' || $chatBox === '' ? 'd-none' : '' }}"></i>
  </div>

  @push('chatbot-js')
    <script>
      
      const messages = document.getElementById("chat-messages");
      const chatBox = document.getElementById("chat-box");
      const qField = document.getElementById("question-field");

      qField.addEventListener('keydown', e => {
        if(e.key === 'Enter' && !event.shiftKey){
          e.preventDefault();
          Livewire.emit('send');
        }
      });

      window.addEventListener('scrollToEnd', () => {
        messages.scrollTop = messages.scrollHeight;
      });

      window.addEventListener('sendQuestion', e => {
        const userMessageCont = document.createElement('div');
        const userMessageInnerCont = document.createElement('div');
        const userMessagePTag = document.createElement('p');

        userMessageCont.className = "d-flex justify-content-end ps-5 w-100";
        userMessageInnerCont.className = "py-2 px-3 text-wrap text-break my-message";
        userMessagePTag.className = "m-0 text-light";
        userMessagePTag.innerText = e.detail.question;

        userMessageInnerCont.append(userMessagePTag);
        userMessageCont.appendChild(userMessageInnerCont);
        messages.appendChild(userMessageCont);
        messages.scrollTop = messages.scrollHeight;
      });

      window.addEventListener('response', e => {
        setTimeout(function(){
          const botMessage = document.createElement('div');
  
          botMessage.className = "d-flex flex-column-reverse gap-2 align-items-start pe-5 w-100";
          botMessage.innerHTML = `
            <div class="rounded-circle bot-icon">
              <img src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" class="rounded-circle">
            </div>
            <div class="p-2 px-3 text-wrap text-break bot-message">
              <p class="m-0">${e.detail.message}</p>
            </div>`;
  
            messages.append(botMessage);
            messages.scrollTop = messages.scrollHeight;
        }, 1000)
      });

      window.addEventListener('focus', () => {
        if(chatBox.classList.contains('show')){
          qField.focus();
        }
      });

    </script>
  @endpush

</div>
