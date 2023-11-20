<?php

namespace App\Http\Livewire\SubBHW;

use App\Models\BarangayInfo;
use App\Models\FamilyHead;
use App\Models\User;
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

    public $compared_family_head;
    public $reason, $other;

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
            'tab',
            'compared_family_head',
            'reason',
            'other'
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
        $comparedFam = FamilyHead::where('id', '!=', $family->id)
            ->where('fname', $family->fname)
            ->where('mname', $family->mname)
            ->where('lname', $family->lname)
            ->where('bday', $family->bday)
            ->where('sex', $family->sex)
            ->where('civil_status', $family->civil_status)
            ->where('zone', $family->zone)
            ->first();

        if(is_null($comparedFam)){
            $family->is_approved = true;
            $family->comment = 'Family profile has been recorded successfully.';
            $family->update();

            $this->dispatchBrowserEvent('close-modal');
            $this->closeModal();
            $this->dispatchBrowserEvent('successToast', ['success' => 'Family approved successfully']);
        }else{
            $this->compared_family_head = $comparedFam->fullname;
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('redundant-family');
        }
    }

    public function approveRedundant()
    {
        $family = FamilyHead::find($this->family_head->id);
        $family->is_approved = true;
        $family->comment = 'Family profile has been recorded successfully.';
        $family->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Family approved successfully']);
    }

    public function declineConfirmation($id)
    {
        $this->family_head = FamilyHead::with('familyMembers')->with('wife')->find($id);
    }

    public function declineFamily()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('decline-family');
    }

    public function decline()
    {
        $family = FamilyHead::find($this->family_head->id);

        if($this->reason === 'Other'){
            $this->validate([
                'other' => ['required', 'string', 'max:100'],
            ]);

            $family->comment = $this->other;
        }else{
            $this->validate([
                'reason' => ['required', 'string', 'max:36'],
            ]);

            $family->comment = $this->reason;
        }

        $family->is_approved = false;
        $family->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Family declined successfully']);
    }

    // public function deleteConfirmation($id)
    // {
    //     $this->family_head_id = $id;
    // }

    // public function deleteFamily()
    // {
    //     FamilyHead::find($this->family_head_id)->forceDelete();

    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->closeModal();
    // }

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
            ->where('comment', null)
            ->where(function($query) {
                $query->where('fullname', 'like', '%' . $this->search2 . '%')
                ->orWhere('fname', 'like', '%' . $this->search2 . '%')
                ->orWhere('mname', 'like', '%' . $this->search2 . '%')
                ->orWhere('lname', 'like', '%' . $this->search2 . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate2, ['*'], 'notApproveFamilies');

            $brgyInfo = BarangayInfo::first();
            $checkIfCanEdit = !is_null($brgyInfo) ? $brgyInfo->family_profiling : false;

        return view('livewire.sub-b-h-w.online-family-profile', [
            'onlineApprovedFamilies' => $onlineApprovedFamilies,
            'onlinenNotApproveFamilies' => $onlinenNotApproveFamilies,
            'checkIfCanEdit' => $checkIfCanEdit,
        ]);
    }
}
