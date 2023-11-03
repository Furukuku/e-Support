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

    public function updatingSearch()
    {
        $this->resetPage('businessesPage');
    }

    public function resetVariables()
    {
        $this->profile_image = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->suffix_name = '';
        $this->email = '';
        $this->contact = '';
        $this->business_id = '';
        $this->business_name = '';
        $this->business_clearance = '';
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
        $this->contact = $business->mobile;
    }

    public function editBusiness($id)
    {
        $business = Business::find($id);
        
        $this->business_id = $business->id;
        $this->status = $business->is_active;
    }

    public function updateBusiness()
    {
        $validated = $this->validate([
            'status' => 'required|integer|max:1'
        ]);

        if($validated){
            $converted_status = intval($this->status);
            
            $business = Business::find($this->business_id);
    
            $business->is_active = $converted_status;
            $business->update();
    
            $this->dispatchBrowserEvent('close-modal');
            $this->resetVariables();
            $this->resetErrorBag();
        }
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
