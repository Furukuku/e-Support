<?php

namespace App\Http\Livewire\Admin\Manage;

use Livewire\Component;
use App\Models\Business;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class BusinessApproval extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $business_paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $email, $contact, $business_clearance, $business_name, $business_address, $business_nature;

    public $business_id;

    public $reason, $other;

    protected $listeners = ['closeModal'];

    public function updatingSearch()
    {
        $this->resetPage('businessesPage');
    }

    public function resetVariables()
    {
        $this->reset(
            'profile_image',
            'last_name',
            'first_name',
            'middle_name',
            'suffix_name',
            'email',
            'contact',
            'business_id',
            'business_name',
            'business_clearance',
            'business_address',
            'business_nature',
            'reason',
            'other'
        );
    }

    public function closeModal()
    {
        $this->resetVariables();
    }

    public function viewBusiness($id)
    {
        $business = Business::find($id);
        $this->business_id = $business->id;
        $this->profile_image = $business->profile;
        $this->business_name = $business->biz_name;
        $this->business_address = $business->biz_address;
        $this->business_nature = $business->biz_nature;
        $this->last_name = $business->lname;
        $this->first_name = $business->fname;
        $this->middle_name = $business->mname;
        $this->suffix_name = $business->sname;
        $this->email = $business->email;
        $this->contact = $business->mobile;
        $this->business_clearance = $business->biz_clearance;
    }

    public function approve()
    {
        $business = Business::find($this->business_id);
        $business->decline_msg = null;
        $business->is_approved = true;
        $business->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'User approved successfully']);
    }

    public function declineBusinessConfirm()
    {
        $this->dispatchBrowserEvent('declineConfirm');
    }

    public function decline()
    {
        $business = Business::find($this->business_id);

        if($this->reason === 'Other'){
            $this->validate([
                'other' => ['required', 'string', 'max:150']
            ]);

            $business->decline_msg = $this->other;
        }else {
            $this->validate([
                'reason' => ['required', 'string', 'max:150']
            ]);

            $business->decline_msg = $this->reason;
        }

        $business->is_approved = false;
        $business->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'User declined successfully']);
    }

    // public function showBizVerification($id)
    // {
    //     $business = Business::find($id);
    //     $this->business_id = $business->id;
    //     $this->business_clearance = $business->biz_clearance;
    // }

    // public function acceptBusiness()
    // {
    //     $business = Business::find($this->business_id);
    //     $business->is_approved = true;
    //     $business->update();

    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->resetVariables();
    // }

    // public function declineBusiness()
    // {
    //     Business::find($this->business_id)->delete();
        
    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->resetVariables();
    // }

    // public function archiveBizConfirmation($id)
    // {
    //     $business = Business::find($id);
    //     $this->business_id = $business->id;
    // }

    // public function archiveBusiness()
    // {
    //     Business::find($this->business_id)->delete();

    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->resetVariables();
    // }

    public function render()
    {
        $businesses = Business::where('is_approved', false)
            ->where('decline_msg', null)
            ->where(function (Builder $query) {
                $query->where('lname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('sname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('biz_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('biz_nature', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->business_paginate, ['*'], 'businessesPage');

        return view('livewire.admin.manage.business-approval', [
            'businesses' => $businesses,
        ]);
    }
}
