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

    protected $listeners = ['closeModal'];

    public function updatingSearch()
    {
        $this->resetPage('businessesPage');
    }

    public function resetVariables()
    {
        $this->profile_image = null;
        $this->last_name = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->suffix_name = '';
        $this->email = '';
        $this->contact = '';
        $this->business_id = '';
        $this->business_name = '';
        $this->business_clearance = null;
        $this->business_address = '';
        $this->business_nature = '';
    }

    public function closeModal()
    {
        $this->resetVariables();
    }

    public function viewBusiness($id)
    {
        $business = Business::find($id);
        $this->profile_image = $business->profile;
        $this->business_name = $business->biz_name;
        $this->business_address = $business->biz_address;
        $this->business_nature = $business->biz_nature;
        $this->last_name = $business->lname;
        $this->first_name = $business->fname;
        $this->middle_name = $business->mname;
        $this->suffix_name = $business->sname;
        $this->email = $business->email;
        $this->contact = $business->contact;
    }

    public function showBizVerification($id)
    {
        $business = Business::find($id);
        $this->business_id = $business->id;
        $this->business_clearance = $business->biz_clearance;
    }

    public function acceptBusiness()
    {
        $business = Business::find($this->business_id);
        $business->is_approved = true;
        $business->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function declineBusiness()
    {
        Business::find($this->business_id)->delete();
        
        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function archiveBizConfirmation($id)
    {
        $business = Business::find($id);
        $this->business_id = $business->id;
    }

    public function archiveBusiness()
    {
        Business::find($this->business_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $businesses = Business::where('is_approved', false)
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
