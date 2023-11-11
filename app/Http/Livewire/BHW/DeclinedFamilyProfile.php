<?php

namespace App\Http\Livewire\BHW;

use App\Models\FamilyHead;
use Livewire\Component;
use Livewire\WithPagination;

class DeclinedFamilyProfile extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    public $family_head;

    public $tab = 1;

    public function updatingSearch()
    {
        $this->resetPage('declinedFamilies');
    }

    public function closeModal()
    {
        $this->reset(
            'family_head',
            'tab',
        );
    }

    public function famHead()
    {
        $this->tab = 1;
    }

    public function famWife()
    {
        $this->tab = 2;
    }

    public function famMembers()
    {
        $this->tab = 3;
    }

    public function addInfo()
    {
        $this->tab = 4;
    }


    public function viewFamily($id)
    {
        $this->family_head = FamilyHead::with('familyMembers')->with('wife')->find($id);
    }

    public function restoreFamily()
    {
        $family = FamilyHead::find($this->family_head->id);
        $family->comment = null;
        $family->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $onlineDeclinedFamilies = FamilyHead::where('user_id', '!=', null)
            ->where('is_approved', false)
            ->where('comment', '!=', null)
            ->where(function($query) {
                $query->where('fullname', 'like', '%' . $this->search . '%')
                ->orWhere('fname', 'like', '%' . $this->search . '%')
                ->orWhere('mname', 'like', '%' . $this->search . '%')
                ->orWhere('lname', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'declinedFamilies');
        
        return view('livewire.b-h-w.declined-family-profile', ['onlineDeclinedFamilies' => $onlineDeclinedFamilies]);
    }
}
