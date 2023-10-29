<?php

namespace App\Http\Livewire\SubBHW;

use App\Models\FamilyHead;
use Livewire\Component;
use Livewire\WithPagination;

class OnlineFamilyProfile extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate1 = 5;
    public $paginate2 = 5;

    public $paginate1_values = [5, 10, 50, 100];
    public $paginate2_values = [5, 10, 50, 100];

    public $search1 = '';
    public $search2 = '';

    public $family_head, $family_head_id;

    public $tab = 1;

    public function updatingSearch()
    {
        $this->resetPage('approvedFamilies');
        $this->resetPage('notApproveFamilies');
    }

    public function closeModal()
    {
        $this->reset(
            'family_head',
            'family_head_id',
            'tab'
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

    public function approveFamily()
    {
        $family = FamilyHead::find($this->family_head->id);
        $family->is_approved = true;
        $family->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function deleteConfirmation($id)
    {
        $this->family_head_id = $id;
    }

    public function deleteFamily()
    {
        FamilyHead::find($this->family_head_id)->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $onlineApprovedFamilies = FamilyHead::where('user_id', '!=', null)
            ->where('zone', auth()->guard('bhw')->user()->assigned_zone)
            ->where('is_approved', true)
            ->where(function($query) {
                $query->where('fullname', 'like', '%' . $this->search1 . '%')
                ->orWhere('fname', 'like', '%' . $this->search1 . '%')
                ->orWhere('mname', 'like', '%' . $this->search1 . '%')
                ->orWhere('lname', 'like', '%' . $this->search1 . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate2, ['*'], 'approvedFamilies');
        

        $onlinenNotApproveFamilies = FamilyHead::where('user_id', '!=', null)
            ->where('zone', auth()->guard('bhw')->user()->assigned_zone)
            ->where('is_approved', false)
            ->where(function($query) {
                $query->where('fullname', 'like', '%' . $this->search2 . '%')
                ->orWhere('fname', 'like', '%' . $this->search2 . '%')
                ->orWhere('mname', 'like', '%' . $this->search2 . '%')
                ->orWhere('lname', 'like', '%' . $this->search2 . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate2, ['*'], 'notApproveFamilies');

        return view('livewire.sub-b-h-w.online-family-profile', [
            'onlineApprovedFamilies' => $onlineApprovedFamilies,
            'onlinenNotApproveFamilies' => $onlinenNotApproveFamilies,
        ]);
    }
}
