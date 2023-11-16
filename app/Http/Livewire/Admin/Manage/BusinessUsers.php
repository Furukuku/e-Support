<?php

namespace App\Http\Livewire\Admin\Manage;

use App\Models\Business;
use Livewire\Component;
use Livewire\WithPagination;

class BusinessUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    protected $listeners = ['closeModal'];

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $email, $contact, $business_clearance, $business_name, $business_address, $business_nature;

    public $business_id;

    public $status;
    public $reason, $other;

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
    }

    public function editBusiness($id)
    {
        $business = Business::find($id);
        
        $this->business_id = $business->id;
        $this->status = $business->is_active;

        if(!is_null($business->disable_msg)){
            switch($business->disable_msg){
                case 'You have violated our terms and conditions.': $this->reason = $business->disable_msg;
                    break;
                default:
                    $this->reason = 'Other';
            }
    
            if($this->reason === 'Other'){
                $this->other = $business->disable_msg;
            }
        }
    }

    public function updateBusiness()
    {
        $business = Business::find($this->business_id);

        if($this->status == false){
            if($this->reason === 'Other'){
                $this->validate([
                    'other' => 'required|string|max:100',
                ]);
                
                $business->disable_msg = $this->other;
            }else{
                $this->validate([
                    'reason' => 'required|string|max:100',
                ]);
                
                $business->disable_msg = $this->reason;
            }
        }else{
            $this->validate([
                'status' => 'required|boolean'
            ]);

            $business->disable_msg = null;
        }
        
        $business->is_active = $this->status;
        $business->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->resetErrorBag();
    }

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
        $businesses = Business::where('is_approved', true)
            ->where(function ($query) {
                $query->where('lname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('sname', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'businessesPage');

        return view('livewire.admin.manage.business-users', [
            'businesses' => $businesses,
        ]);
    }
}
