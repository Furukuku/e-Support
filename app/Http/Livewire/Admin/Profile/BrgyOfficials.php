<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\BrgyOfficial;
use App\Rules\MustBeOneBrgyCaptain;
use App\Rules\MustBeOneBrgyCaptainOnUpdate;
use App\Rules\MustBeOneSecretary;
use App\Rules\MustBeOneSecretaryOnUpdate;
use App\Rules\MustBeOneSkChairman;
use App\Rules\MustBeOneSkChairmanOnUpdate;
use App\Rules\MustBeOneTreasurer;
use App\Rules\MustBeOneTreasurerOnUpdate;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class BrgyOfficials extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $display_image, $last_name, $first_name, $middle_name, $suffix_name, $zone, $gender, $phone_no, $email, $civil_status, $birthday, $position;

    public $view_display_image;

    public $official_id;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected $listeners = ['closeModal'];

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'desc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'desc'
            ? 'asc'
            : 'desc';
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->reset(
            'official_id',
            'view_display_image',
            'display_image',
            'last_name',
            'first_name',
            'middle_name',
            'suffix_name',
            'zone',
            'gender',
            'phone_no',
            'email',
            'civil_status',
            'birthday',
            'position'
        );
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetInputs();
    }

    public function add()
    {
        $this->validate([
            'display_image' => 'required|image',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix_name' => 'nullable|string|max:255',
            'zone' => 'required|string|max:2',
            'gender' => 'required|string|max:6',
            'phone_no' => 'required|digits:11',
            'email' => 'required|string|email|max:255',
            'civil_status' => 'required|string|max:10',
            'birthday' => 'required|date',
            'position' => [
                'required', 
                'string', 
                'max:255', 
                new MustBeOneBrgyCaptain, 
                new MustBeOneSkChairman,
                new MustBeOneTreasurer,
                new MustBeOneSecretary
            ],
        ]);

        // Execution doesn't reach here if validation fails.

        // $display_img_filename = time() . "-" . $this->display_image->getClientOriginalName();

        // $this->display_image->storeAs('public/images/profiles/brgyOfficials', $display_img_filename);

        $display_img_filename = $this->display_image->store('public/images/profiles/brgyOfficials');

        BrgyOfficial::create([
            'display_img' => $display_img_filename,
            'lname' => $this->last_name,
            'fname' => $this->first_name,
            'mname' => $this->middle_name,
            'sname' => $this->suffix_name,
            'zone' => $this->zone,
            'gender' => $this->gender,
            'contact' => $this->phone_no,
            'email' => $this->email,
            'civil_status' => $this->civil_status,
            'bday' => $this->birthday,
            'position' => $this->position,
        ]);

        // $this->dispatchBrowserEvent('add-close-modal', [
        //     'title' => 'Added Successfully',
        //     'icon' => 'success',
        //     'iconColor' => 'green',
        // ]);

        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function view($id)
    {
        $viewOfficials = BrgyOfficial::find($id);

        if($viewOfficials){
            $this->view_display_image = $viewOfficials->display_img;
            $this->last_name = $viewOfficials->lname;
            $this->first_name = $viewOfficials->fname;
            $this->middle_name = $viewOfficials->mname;
            $this->suffix_name = $viewOfficials->sname;
            $this->zone = $viewOfficials->zone;
            $this->gender = $viewOfficials->gender;
            $this->phone_no = $viewOfficials->contact;
            $this->email = $viewOfficials->email;
            $this->civil_status = $viewOfficials->civil_status;
            $this->birthday = $viewOfficials->bday;
            $this->position = $viewOfficials->position;
        }
    }

    public function update()
    {
        $this->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix_name' => 'nullable|string|max:255',
            'zone' => 'required|string|max:2',
            'gender' => 'required|string|max:6',
            'phone_no' => 'required|digits:11',
            'email' => 'required|string|email|max:255',
            'civil_status' => 'required|string|max:10',
            'birthday' => 'required|date',
            'position' => [
                'required', 
                'string', 
                'max:255', 
                new MustBeOneBrgyCaptainOnUpdate($this->official_id), 
                new MustBeOneSkChairmanOnUpdate($this->official_id),
                new MustBeOneTreasurerOnUpdate($this->official_id),
                new MustBeOneSecretaryOnUpdate($this->official_id)
            ],
        ]);

        // Execution doesn't reach here if validation fails.

        $old_official = BrgyOfficial::find($this->official_id);

        if($this->display_image != $old_official->display_img){
            $this->validate([
                'display_image' => 'required|image',
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'suffix_name' => 'nullable|string|max:255',
                'zone' => 'required|string|max:2',
                'gender' => 'required|string|max:6',
                'phone_no' => 'required|digits:11',
                'email' => 'required|string|email|max:255',
                'civil_status' => 'required|string|max:10',
                'birthday' => 'required|date',
                'position' => ['required', 
                'string', 'max:255', 
                new MustBeOneBrgyCaptainOnUpdate($this->official_id), 
                new MustBeOneSkChairmanOnUpdate($this->official_id),
                new MustBeOneTreasurerOnUpdate($this->official_id),
                new MustBeOneSecretaryOnUpdate($this->official_id)
            ],
            ]);

            // Storage::disk('local')->delete('public/images/profiles/brgyOfficials/' . $old_official->display_img);

            // $display_img_filename = time() . "-" . $this->display_image->getClientOriginalName();
    
            // $this->display_image->storeAs('public/images/profiles/brgyOfficials', $display_img_filename);

            Storage::disk('local')->delete($old_official->display_img);

            $display_img_filename = $this->display_image->store('public/images/profiles/brgyOfficials');
    
            $official = BrgyOfficial::find($this->official_id);
            $official->display_img = $display_img_filename;
            $official->lname = $this->last_name;
            $official->fname = $this->first_name;
            $official->mname = $this->middle_name;
            $official->sname = $this->suffix_name;
            $official->zone = $this->zone;
            $official->gender = $this->gender;
            $official->contact = $this->phone_no;
            $official->email = $this->email;
            $official->civil_status = $this->civil_status;
            $official->bday = $this->birthday;
            $official->position = $this->position;
            $official->update();
        }else{
            $this->validate([
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'suffix_name' => 'nullable|string|max:255',
                'zone' => 'required|string|max:2',
                'gender' => 'required|string|max:6',
                'phone_no' => 'required|digits:11',
                'email' => 'required|string|email|max:255',
                'civil_status' => 'required|string|max:10',
                'birthday' => 'required|date',
                'position' => [
                    'required', 
                    'string', 
                    'max:255', 
                    new MustBeOneBrgyCaptainOnUpdate($this->official_id), 
                    new MustBeOneSkChairmanOnUpdate($this->official_id),
                    new MustBeOneTreasurerOnUpdate($this->official_id),
                    new MustBeOneSecretaryOnUpdate($this->official_id)
                ],
            ]);

            $official = BrgyOfficial::find($this->official_id);
            $official->lname = $this->last_name;
            $official->fname = $this->first_name;
            $official->mname = $this->middle_name;
            $official->sname = $this->suffix_name;
            $official->zone = $this->zone;
            $official->gender = $this->gender;
            $official->contact = $this->phone_no;
            $official->email = $this->email;
            $official->civil_status = $this->civil_status;
            $official->bday = $this->birthday;
            $official->position = $this->position;
            $official->update();
        }


        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function edit($id)
    {
        $editOfficials = BrgyOfficial::find($id);
        if($editOfficials){
            $this->official_id = $editOfficials->id;
            $this->display_image = $editOfficials->display_img;
            $this->last_name = $editOfficials->lname;
            $this->first_name = $editOfficials->fname;
            $this->middle_name = $editOfficials->mname;
            $this->suffix_name = $editOfficials->sname;
            $this->zone = $editOfficials->zone;
            $this->gender = $editOfficials->gender;
            $this->phone_no = $editOfficials->contact;
            $this->email = $editOfficials->email;
            $this->civil_status = $editOfficials->civil_status;
            $this->birthday = $editOfficials->bday;
            $this->position = $editOfficials->position;
        }
    }

    public function deleteConfirmation($id)
    {
        $deleteOfficials = BrgyOfficial::find($id);

        $this->official_id = $deleteOfficials->id;
    }

    public function delete()
    {
        $delete_official = BrgyOfficial::find($this->official_id);

        // Storage::disk('local')->delete('public/images/profiles/brgyOfficials/' . $delete_official->display_img);

        $delete_official->delete();

        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
    }

    public function render()
    {
        $brgyOfficials = BrgyOfficial::where('lname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('sname', 'like', '%' . $this->search . '%')
            ->orWhere('zone', 'like', '%' . $this->search . '%')
            ->orWhere('gender', 'like', '%' . $this->search . '%')
            ->orWhere('bday', 'like', '%' . $this->search . '%')
            ->orWhere('position', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.admin.profile.brgy-officials', [
            'brgyOfficials' => $brgyOfficials,
        ]);
    }
}
