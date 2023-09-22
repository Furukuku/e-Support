<?php

namespace App\Http\Livewire\Admin\Manage;

use App\Models\Business;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ResidentApproval extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $resident_paginate = 5;

    public $search = "";

    // public $founded_fname, $founded_mname, $founded_lname, $not_found;

    // public function resetModal()
    // {
    //     $this->founded_fname = null;
    //     $this->founded_mname = null;
    //     $this->founded_lname = null;
    //     $this->not_found = null;
    // }

    // public function closeModal()
    // {
    //     $this->resetModal();
    // }

    // public function verifyResident($fname, $lname)
    // {
    //     $head_fname = Family::where('head_fname', 'like', '%' . $fname . '%')
    //     ->select('head_fname', 'head_mname', 'head_lname')
    //     ->first();
    //     $head_lname = Family::where('head_lname', 'like', '%' . $lname . '%')->first();

    //     $wife_fname = Family::where('wife_fname', 'like', '%' . $fname . '%')
    //     ->select('wife_fname', 'wife_mname', 'wife_lname')
    //     ->first();
    //     $wife_lname = Family::where('wife_lname', 'like', '%' . $lname . '%')->first();

    //     $member_fname = FamilyMember::where('fname', 'like', '%' . $fname . '%')
    //     ->select('fname', 'mname', 'lname')
    //     ->first();
    //     $member_lname = FamilyMember::where('lname', 'like', '%' . $lname . '%')->first();

    //     if(isset($head_fname) && isset($head_lname)){
    //         if(strtolower($head_fname->head_fname) == strtolower($fname) && strtolower($head_fname->head_lname) == strtolower($lname)){
    //             $this->founded_fname = $head_fname->head_fname;
    //             $this->founded_mname = $head_fname->head_mname;
    //             $this->founded_lname = $head_fname->head_lname;
    //         }else{
    //             dd('not equal');
    //         }
    //     }else if(isset($wife_fname) && isset($wife_lname)){
    //         if(strtolower($wife_fname->wife_fname) == strtolower($fname) && strtolower($wife_fname->wife_lname) == strtolower($lname)){
    //             $this->founded_fname = $wife_fname->wife_fname;
    //             $this->founded_mname = $wife_fname->wife_mname;
    //             $this->founded_lname = $wife_fname->wife_lname;
    //         }else{
    //             dd('not equal');
    //         }
    //     }else if(isset($member_fname) && isset($member_lname)){
    //         if(strtolower($member_fname->fname) == strtolower($fname) && strtolower($member_fname->lname) == strtolower($lname)){
    //             $this->founded_fname = $member_fname->fname;
    //             $this->founded_mname = $member_fname->mname;
    //             $this->founded_lname = $member_fname->lname;
    //         }else{
    //             dd('not equal');
    //         }
    //     }else{
    //         $this->not_found = 'Resident Not Found!';
    //     }
    // }

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender, $family_head;

    public $resident_id;

    public $resident_verification_img;

    protected $listeners = ['closeModal'];

    public function updatingSearch()
    {
        $this->resetPage('residentsPage');
    }

    public function resetVariables()
    {
        $this->resident_id = '';
        $this->resident_verification_img = null;
        $this->profile_image = null;
        $this->last_name = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->suffix_name = '';
        $this->birthday = '';
        $this->email = '';
        $this->contact = '';
        $this->zone = '';
        $this->employment_status = '';
        $this->gender = '';
        $this->family_head = '';
    }

    public function closeModal()
    {
        $this->resetVariables();
    }

    public function viewResident($id)
    {
        $resident = User::find($id);
        $this->profile_image = $resident->profile;
        $this->last_name = $resident->lname;
        $this->first_name = $resident->fname;
        $this->middle_name = $resident->mname;
        $this->suffix_name = $resident->sname;
        $this->birthday = $resident->bday;
        $this->email = $resident->email;
        $this->contact = $resident->contact;
        $this->zone = $resident->zone;
        $this->employment_status = $resident->employ_status;
        $this->gender = $resident->gender;
        $this->family_head = $resident->is_head;
    }

    public function showVerification($id)
    {
        $resident = User::find($id);
        $this->resident_id = $resident->id;
        $this->resident_verification_img = $resident->verification_img;
    }

    public function acceptResident()
    {
        $resident = User::find($this->resident_id);
        $resident->is_approved = true;
        $resident->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function declineResident()
    {
        User::find($this->resident_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function archiveConfirmation($id)
    {
        $resident = User::find($id);
        $this->resident_id = $resident->id;
    }

    public function archiveResident()
    {
        User::find($this->resident_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $residents = User::where('is_approved', false)
            ->where(function ($query) {
                $query->where('lname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('sname', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->resident_paginate, ['*'], 'residentsPage');

        return view('livewire.admin.manage.resident-approval', [
            'residents' => $residents,
        ]);
    }
}
