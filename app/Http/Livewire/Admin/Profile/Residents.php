<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Family;
use App\Models\FamilyHead;
use Livewire\Component;
use App\Models\FamilyMember;
use App\Models\Wife;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\NullableType;

class Residents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    // Family Head variables
    public $last_name, $first_name, $middle_name, $suffix_name, $birthday, $birthplace, $civil_status, $educational_attainment, $zone, $religion, $occupation, $contact, $philhealth, $first_dose_date, $second_dose_date, $vaccine_brand, $booster_date, $booster_brand;

    // Wife variables
    // public $wife_last_name, $wife_first_name, $wife_middle_name, $wife_suffix_name, $wife_birthday, $wife_birthplace, $wife_civil_status, $wife_educational_attainment, $wife_zone, $wife_religion, $wife_occupation, $wife_contact, $wife_philhealth, $wife_first_dose_date, $wife_second_dose_date, $wife_vaccine_brand, $wife_booster_date, $wife_booster_brand;

    // Wife
    public $wife;

    // Family Members variables/collection of Family Members
    public Collection $members;

    // variable for viewing family
    public $family_head;

    // variable for old members
    public Collection $old_members;

    // variable for new members
    public Collection $new_members;

    // variable for family head id
    public $family_head_id;

    // array of ids of members that will removed
    public $removed_members = [];

    // Additional Info variables
    public $water_source, $type_of_house, $toilet, $garden, $electricity, $house_no;

    // Members variables
    public $pwd, $solo_parent, $senior_citizen, $pregnant;

    public $search = "";

    protected $listeners = ['closeModal'];

    protected $rules = [
        'last_name' => 'required|string|max:255', 
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255', 
        'suffix_name' => 'nullable|string|max:255', 
        'birthday' => 'required|date', 
        'birthplace' => 'required|string|max:255', 
        'civil_status' => 'required|string|max:10', 
        'educational_attainment' => 'required|string|max:255', 
        'zone' => 'required|string|max:2', 
        'religion' => 'required|string|max:255', 
        'occupation' => 'required|string|max:255', 
        'contact' => 'required|digits:11', 
        'philhealth' => 'required|boolean',  
        'first_dose_date' => 'nullable|date', 
        'second_dose_date' => 'nullable|date', 
        'vaccine_brand' => 'nullable|string|max:255', 
        'booster_date' => 'nullable|date', 
        'booster_brand' => 'nullable|string|max:255',
        
        'wife.*.lname' => 'required|string|max:255', 
        'wife.*.fname' => 'required|string|max:255',
        'wife.*.mname' => 'nullable|string|max:255', 
        'wife.*.sname' => 'nullable|string|max:255', 
        'wife.*.bday' => 'required|date', 
        'wife.*.bplace' => 'required|string|max:255', 
        'wife.*.civil_status' => 'required|string|max:10', 
        'wife.*.educ_attainment' => 'required|string|max:255', 
        'wife.*.zone' => 'required|string|max:2', 
        'wife.*.religion' => 'required|string|max:255', 
        'wife.*.occupation' => 'required|string|max:255', 
        'wife.*.contact' => 'required|digits:11', 
        'wife.*.philhealth' => 'required|boolean', 
        'wife.*.first_dose' => 'nullable|date', 
        'wife.*.second_dose' => 'nullable|date', 
        'wife.*.vaccine_brand' => 'nullable|string|max:17', 
        'wife.*.booster' => 'nullable|date', 
        'wife.*.booster_brand' => 'nullable|string|max:17',

        'members.*.lname' => 'required|string|max:255',
        'members.*.fname' => 'required|string|max:255',
        'members.*.mname' => 'nullable|string|max:255',
        'members.*.sname' => 'nullable|string|max:255',
        'members.*.bday' => 'required|date',
        'members.*.bplace' => 'required|string|max:255',
        'members.*.educ_attain' => 'required|string|max:255',
        'members.*.fdose' => 'nullable|date',
        'members.*.sdose' => 'nullable|date',
        'members.*.brand' => 'nullable|string|max:17',
        'members.*.booster' => 'nullable|date',
        'members.*.bbrand' => 'nullable|string|max:17',

        'water_source' => 'required|string|max:12',
        'type_of_house' => 'required|string|max:10',
        'toilet' => 'required|string|max:8',
        'garden' => 'required|string|max:20',
        'electricity' => 'required|string|max:8',
        'house_no' => 'required|string|max:255',

        'pwd' => 'nullable|integer|gte:0',
        'solo_parent' => 'nullable|integer|gte:0',
        'senior_citizen' => 'nullable|integer|gte:0',
        'pregnant' => 'nullable|integer|gte:0',
    ];

    protected $messages = [
        // family members
        'members.*.lname' => [
            'required' => 'The last name field is required.',
            'string' => 'The last name field must be a string type.',
            'max' => 'The last name field must not exceed 255 characters.',
        ],
        'members.*.fname' => [
            'required' => 'The first name field is required.',
            'string' => 'The first name field must be a string type.',
            'max' => 'The first name field must not exceed 255 characters.',
        ],
        'members.*.mname' => [
            'string' => 'The middle name field must be a string type.',
            'max' => 'The middle name field must not exceed 255 characters.',
        ],
        'members.*.sname' => [
            'string' => 'The suffix name field must be a string type.',
            'max' => 'The suffix name field must not exceed 255 characters.',
        ],
        'members.*.bday' => [
            'required' => 'The birthday field is required.',
            'date' => 'The birthday field must be a valid date.',
        ],
        'members.*.bplace' => [
            'required' => 'The birthplace field is required.',
            'string' => 'The birthplace field must be a string type.',
            'max' => 'The birthplace field must not exceed 255 characters.',
        ],
        'members.*.educ_attain' => [
            'required' => 'The educational attainment field is required.',
            'string' => 'The educational attainment field must be a string type.',
            'max' => 'The educational attainment field must not exceed 255 characters.',
        ],
        'members.*.fdose' => [
            'date' => 'The first dose field must be a valid date.',
        ],
        'members.*.sdose' => [
            'date' => 'The second dose field must be a valid date.',
        ],
        'members.*.brand' => [
            'required' => 'The vaccine brand field is required.',
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 255 characters.',
        ],
        'members.*.booster' => [
            'date' => 'The booster dose field must be a valid date.',
        ],
        'members.*.bbrand' => [
            'required' => 'The booster brand field is required.',
            'string' => 'The booster brand field must be a string type.',
            'max' => 'The booster brand field must not exceed 255 characters.',
        ],

        // wife
        'wife.*.lname' => [
            'required' => 'The last name field is required.',
            'string' => 'The last name field must be a string type.',
            'max' => 'The last name field must not exceed 255 characters.',
        ],
        'wife.*.fname' => [
            'required' => 'The first name field is required.',
            'string' => 'The first name field must be a string type.',
            'max' => 'The first name field must not exceed 255 characters.',
        ],
        'wife.*.mname' => [
            'string' => 'The middle name field must be a string type.',
            'max' => 'The middle name field must not exceed 255 characters.',
        ],
        'wife.*.sname' => [
            'string' => 'The suffix name field must be a string type.',
            'max' => 'The suffix name field must not exceed 255 characters.',
        ],
        'wife.*.bday' => [
            'required' => 'The birthday field is required.',
            'date' => 'The birthday field must be a valid date.',
        ],
        'wife.*.bplace' => [
            'required' => 'The birthplace field is required.',
            'string' => 'The birthplace  field must be a string type.',
            'max' => 'The birthplace field must not exceed 255 characters.',
        ],
        'wife.*.civil_status' => [
            'required' => 'The civil status field is required.',
            'string' => 'The civil status  field must be a string type.',
            'max' => 'The civil status field must not exceed 255 characters.',
        ],
        'wife.*.educ_attainment' => [
            'required' => 'The educational attainment field is required.',
            'string' => 'The educational attainment field must be a string type.',
            'max' => 'The educational attainment field must not exceed 255 characters.',
        ],
        'wife.*.zone' => [
            'required' => 'The zone field is required.',
            'string' => 'The zone field must be a string type.',
            'max' => 'The zone field must not exceed 1 character.',
        ],
        'wife.*.religion' => [
            'required' => 'The religion field is required.',
            'string' => 'The religion field must be a string type.',
            'max' => 'The religion field must not exceed 255 character.',
        ],
        'wife.*.occupation' => [
            'required' => 'The occupation field is required.',
            'string' => 'The occupation field must be a string type.',
            'max' => 'The occupation field must not exceed 255 character.',
        ],
        'wife.*.contact' => [
            'required' => 'The contact no. field is required.',
            'digits' => 'The contact no. field must be 11 digits.',
        ],
        'wife.*.philhealth' => [
            'required' => 'The philhealth field is required.',
            'boolean' => 'The philhealth field must be true or false.',
        ],
        'wife.*.first_dose' => [
            'date' => 'The first dose field must be a valid date.',
        ],
        'wife.*.second_dose' => [
            'date' => 'The second dose field must be a valid date.',
        ],
        'wife.*.vaccine_brand' => [
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 17 characters.',
        ],
        'wife.*.booster' => [
            'date' => 'The booster field must be a valid date.',
        ],
        'wife.*.booster_brand' => [
            'string' => 'The booster brand field must be a string type.',
            'max' => 'The booster brand field must not exceed 17 characters.',
        ],

        // old family members
        'old_members.*.lname' => [
            'required' => 'The last name field is required.',
            'string' => 'The last name field must be a string type.',
            'max' => 'The last name field must not exceed 255 characters.',
        ],
        'old_members.*.fname' => [
            'required' => 'The first name field is required.',
            'string' => 'The first name field must be a string type.',
            'max' => 'The first name field must not exceed 255 characters.',
        ],
        'old_members.*.mname' => [
            'string' => 'The middle name field must be a string type.',
            'max' => 'The middle name field must not exceed 255 characters.',
        ],
        'old_members.*.sname' => [
            'string' => 'The suffix name field must be a string type.',
            'max' => 'The suffix name field must not exceed 255 characters.',
        ],
        'old_members.*.bday' => [
            'required' => 'The birthday field is required.',
            'date' => 'The birthday field must be a valid date.',
        ],
        'old_members.*.bplace' => [
            'required' => 'The birthplace field is required.',
            'string' => 'The birthplace field must be a string type.',
            'max' => 'The birthplace field must not exceed 255 characters.',
        ],
        'old_members.*.educ_attainment' => [
            'required' => 'The educational attainment field is required.',
            'string' => 'The educational attainment field must be a string type.',
            'max' => 'The educational attainment field must not exceed 255 characters.',
        ],
        'old_members.*.first_dose' => [
            'date' => 'The first dose field must be a valid date.',
        ],
        'old_members.*.second_dose' => [
            'date' => 'The second dose field must be a valid date.',
        ],
        'old_members.*.vaccine_brand' => [
            'required' => 'The vaccine brand field is required.',
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 255 characters.',
        ],
        'old_members.*.booster' => [
            'date' => 'The booster dose field must be a valid date.',
        ],
        'old_members.*.booster_brand' => [
            'required' => 'The booster brand field is required.',
            'string' => 'The booster brand field must be a string type.',
            'max' => 'The booster brand field must not exceed 255 characters.',
        ],

        // new family members
        'new_members.*.lname' => [
            'required' => 'The last name field is required.',
            'string' => 'The last name field must be a string type.',
            'max' => 'The last name field must not exceed 255 characters.',
        ],
        'new_members.*.fname' => [
            'required' => 'The first name field is required.',
            'string' => 'The first name field must be a string type.',
            'max' => 'The first name field must not exceed 255 characters.',
        ],
        'new_members.*.mname' => [
            'string' => 'The middle name field must be a string type.',
            'max' => 'The middle name field must not exceed 255 characters.',
        ],
        'new_members.*.sname' => [
            'string' => 'The suffix name field must be a string type.',
            'max' => 'The suffix name field must not exceed 255 characters.',
        ],
        'new_members.*.bday' => [
            'required' => 'The birthday field is required.',
            'date' => 'The birthday field must be a valid date.',
        ],
        'new_members.*.bplace' => [
            'required' => 'The birthplace field is required.',
            'string' => 'The birthplace field must be a string type.',
            'max' => 'The birthplace field must not exceed 255 characters.',
        ],
        'new_members.*.educ_attain' => [
            'required' => 'The educational attainment field is required.',
            'string' => 'The educational attainment field must be a string type.',
            'max' => 'The educational attainment field must not exceed 255 characters.',
        ],
        'new_members.*.fdose' => [
            'date' => 'The first dose field must be a valid date.',
        ],
        'new_members.*.sdose' => [
            'date' => 'The second dose field must be a valid date.',
        ],
        'new_members.*.brand' => [
            'required' => 'The vaccine brand field is required.',
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 255 characters.',
        ],
        'new_members.*.booster' => [
            'date' => 'The booster dose field must be a valid date.',
        ],
        'new_members.*.bbrand' => [
            'required' => 'The booster brand field is required.',
            'string' => 'The booster brand field must be a string type.',
            'max' => 'The booster brand field must not exceed 255 characters.',
        ],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        // Family Head
        $this->last_name = null;
        $this->first_name = null;
        $this->middle_name = null;
        $this->suffix_name = null;
        $this->birthday = null;
        $this->birthplace = null;
        $this->civil_status = null;
        $this->educational_attainment = null;
        $this->zone = null;
        $this->religion = null;
        $this->occupation = null;
        $this->contact = null;
        $this->philhealth = null;
        $this->first_dose_date = null;
        $this->second_dose_date = null;
        $this->vaccine_brand = null;
        $this->booster_date = null;
        $this->booster_brand = null;

        // Additional Info
        $this->water_source = null;
        $this->type_of_house = null;
        $this->toilet = null;
        $this->garden = null;
        $this->electricity = null;
        $this->house_no = null;

        // Beneficiaries
        $this->pwd = null;
        $this->solo_parent = null;
        $this->senior_citizen = null;
        $this->pregnant = null;

        $this->family_head = null;
        $this->family_head_id = null;

        $this->removed_members = [];

        $this->mount();

        $this->old_members = collect();
    }

    public function mount()
    {
        $this->wife = collect([
            [
                'lname' => null,
                'fname' => null,
                'mname' => null,
                'sname' => null,
                'bday' => null,
                'bplace' => null,
                'civli_status' => null,
                'educ_attainment' => null,
                'zone' => null,
                'religion' => null,
                'occupation' => null,
                'contact' => null,
                'philhealth' => null,
                'first_dose' => null,
                'second_dose' => null,
                'vaccine_brand' => null,
                'booster' => null,
                'booster_brand' => null,
            ],
        ]);

        $this->fill([
            'members' => collect([[
                'lname' => null,
                'fname' => null,
                'mname' => null,
                'sname' => null,
                'bday' => null,
                'bplace' => null,
                'educ_attain' => null,
                'fdose' => null,
                'sdose' => null,
                'brand' => null,
                'booster' => null,
                'bbrand' => null,
            ]]),
        ]);

        $this->fill([
            'new_members' => collect([]),
        ]);
    }

    public function closeModal()
    {
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function addWife()
    {
        $this->wife = collect([
            [
                'lname' => null,
                'fname' => null,
                'mname' => null,
                'sname' => null,
                'bday' => null,
                'bplace' => null,
                'civil_status' => null,
                'educ_attainment' => null,
                'zone' => null,
                'religion' => null,
                'occupation' => null,
                'contact' => null,
                'philhealth' => null,
                'first_dose' => null,
                'second_dose' => null,
                'vaccine_brand' => null,
                'booster' => null,
                'booster_brand' => null,
            ],
        ]);

        $this->dispatchBrowserEvent('addWife');
    }

    public function removeWife()
    {
        $this->wife = collect();

        $this->dispatchBrowserEvent('addWife');
    }

    public function addMember()
    {
        $this->members->push([
            'lname' => null,
            'fname' => null,
            'mname' => null,
            'sname' => null,
            'bday' => null,
            'bplace' => null,
            'educ_attain' => null,
            'fdose' => null,
            'sdose' => null,
            'brand' => null,
            'booster' => null,
            'bbrand' => null,
        ]);

        $this->dispatchBrowserEvent('addMembers');
    }

    public function removeMember($index)
    {
        $this->members->pull($index);
        $reindexed_members = $this->members->values();
        $this->members = $reindexed_members;

        $this->dispatchBrowserEvent('addMembers');
    }

    public function addFamily()
    {
        $this->validate();

        $head_fullname = '';

        if($this->middle_name === '' || is_null($this->middle_name)){
            $head_fullname = $this->first_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }else if($this->suffix_name === '' || is_null($this->suffix_name)){
            $head_fullname = $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }else{
            $head_fullname = $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }

        $family_head = new FamilyHead();
        
        // Family Head
        $family_head->lname = $this->last_name;
        $family_head->fname = $this->first_name;
        $family_head->mname = $this->middle_name;
        $family_head->sname = $this->suffix_name;
        $family_head->fullname = $head_fullname;
        $family_head->bday = $this->birthday;
        $family_head->bplace = $this->birthplace;
        $family_head->civil_status = $this->civil_status;
        $family_head->educ_attainment = $this->educational_attainment;
        $family_head->zone = $this->zone;
        $family_head->religion = $this->religion;
        $family_head->occupation = $this->occupation;
        $family_head->contact = $this->contact;
        $family_head->philhealth = $this->philhealth;

        $family_head->first_dose = $this->first_dose_date === '' ? null : $this->first_dose_date;

        $family_head->second_dose = $this->second_dose_date === '' ? null : $this->second_dose_date;

        $family_head->vaccine_brand = $this->vaccine_brand;

        $family_head->booster = $this->booster_date === '' ? null : $this->booster_date;

        $family_head->booster_brand = $this->booster_brand;

        // Additional Info
        $family_head->water_source = $this->water_source;
        $family_head->house = $this->type_of_house;
        $family_head->toilet = $this->toilet;
        $family_head->garden = $this->garden;
        $family_head->electricity = $this->electricity;
        $family_head->house_no = $this->house_no;

        // Beneficiaries
        $family_head->pwd = $this->pwd == '0' ? null : $this->pwd;
        $family_head->solo_parent = $this->solo_parent == '0' ? null : $this->solo_parent;
        $family_head->senior_citizen = $this->senior_citizen == '0' ? null : $this->senior_citizen;
        $family_head->pregnant = $this->pregnant == '0' ? null : $this->pregnant;
        $family_head->save();

        if(!$this->wife->isEmpty()){
            foreach($this->wife as $wf){
                $wife_fullname = '';
                if($wf['mname'] === ''|| is_null($wf['mname'])){
                    $wife_fullname = $wf['fname'] . ' ' . $wf['lname'] . ' ' . $wf['sname'];
                }else if($wf['sname'] === ''|| is_null($wf['sname'])){
                    $wife_fullname = $wf['fname'] . ' ' . $wf['mname'] . ' ' . $wf['lname'];
                }else{
                    $wife_fullname = $wf['fname'] . ' ' . $wf['mname'] . ' ' . $wf['lname'] . ' ' . $wf['sname'];
                }

                $wife = new Wife();
                $wife->family_head_id = $family_head->id;
                $wife->lname = $wf['lname'];
                $wife->fname = $wf['fname'];
                $wife->mname = $wf['mname'];
                $wife->sname = $wf['sname'];
                $wife->fullname = $wife_fullname;
                $wife->bday = $wf['bday'];
                $wife->bplace = $wf['bplace'];
                $wife->civil_status = $wf['civil_status'];
                $wife->educ_attainment = $wf['educ_attainment'];
                $wife->zone = $wf['zone'];
                $wife->religion = $wf['religion'];
                $wife->occupation = $wf['occupation'];
                $wife->contact = $wf['contact'];
                $wife->philhealth = $wf['philhealth'];
                $wife->first_dose = $wf['first_dose'] === '' ? null : $wf['first_dose'];
                $wife->second_dose = $wf['second_dose'] === '' ? null : $wf['second_dose'];
                $wife->vaccine_brand = $wf['vaccine_brand'];
                $wife->booster = $wf['booster'] === '' ? null : $wf['booster'];
                $wife->booster_brand = $wf['booster_brand'];
                $wife->save();
            }
        }

        if(!$this->members->isEmpty()){
            foreach($this->members as $member){

                $family_member_fullname = '';
                if($member['mname'] === ''|| is_null($member['mname'])){
                    $family_member_fullname = $member['fname'] . ' ' . $member['lname'] . ' ' . $member['sname'];
                }else if($member['sname'] === ''|| is_null($member['sname'])){
                    $family_member_fullname = $member['fname'] . ' ' . $member['mname'] . ' ' . $member['lname'];
                }else{
                    $family_member_fullname = $member['fname'] . ' ' . $member['mname'] . ' ' . $member['lname'] . ' ' . $member['sname'];
                }

                $family_member = new FamilyMember();
                $family_member->family_head_id = $family_head->id;
                $family_member->lname = $member['lname'];
                $family_member->fname = $member['fname'];
                $family_member->mname = $member['mname'];
                $family_member->sname = $member['sname'];
                $family_member->fullname = $family_member_fullname;
                $family_member->bday = $member['bday'];
                $family_member->bplace = $member['bplace'];
                $family_member->educ_attainment = $member['educ_attain'];
                $family_member->first_dose = $member['fdose'] === '' ? null : $member['fdose'];
                $family_member->second_dose = $member['sdose'] === '' ? null : $member['sdose'];
                $family_member->vaccine_brand = $member['brand'];
                $family_member->booster = $member['booster'] === '' ? null : $member['booster'];
                $family_member->booster_brand = $member['bbrand'];
                $family_member->save();
            }
        }

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function viewFamily($id)
    {
        $this->family_head = FamilyHead::with('familyMembers')->with('wife')->find($id);
    }

    public function editFamily($id)
    {
        $family_head = FamilyHead::with('familyMembers')->with('wife')->find($id);

        if($family_head->wife == null){
            $this->wife = collect();
        }else{
            $this->wife = collect([$family_head->wife]);
        }

        $this->old_members = collect($family_head->familyMembers);

        $this->family_head_id = $family_head->id;

        // Family Head
        $this->last_name = $family_head->lname;
        $this->first_name = $family_head->fname;
        $this->middle_name = $family_head->mname;
        $this->suffix_name = $family_head->sname;
        $this->birthday = $family_head->bday;
        $this->birthplace = $family_head->bplace;
        $this->civil_status = $family_head->civil_status;
        $this->educational_attainment = $family_head->educ_attainment;
        $this->zone = $family_head->zone;
        $this->religion = $family_head->religion;
        $this->occupation = $family_head->occupation;
        $this->contact = $family_head->contact;
        $this->philhealth = $family_head->philhealth;
        $this->first_dose_date = $family_head->first_dose;
        $this->second_dose_date = $family_head->second_dose;
        $this->vaccine_brand = $family_head->vaccine_brand;
        $this->booster_date = $family_head->booster;
        $this->booster_brand = $family_head->booster_brand;

        // Additional Info
        $this->house_no = $family_head->house_no;
        $this->water_source = $family_head->water_source;
        $this->type_of_house = $family_head->house;
        $this->toilet = $family_head->toilet;
        $this->garden = $family_head->garden;
        $this->electricity = $family_head->electricity;

        // Beneficiaries
        $this->pwd = $family_head->pwd;
        $this->solo_parent = $family_head->solo_parent;
        $this->senior_citizen = $family_head->senior_citizen;
        $this->pregnant = $family_head->pregnant;
    }

    public function newWife()
    {
        $head = FamilyHead::with('wife')->find($this->family_head_id);

        if(is_null($head->wife)){
            $this->wife = collect([
                [
                    'lname' => null,
                    'fname' => null,
                    'mname' => null,
                    'sname' => null,
                    'bday' => null,
                    'bplace' => null,
                    'civil_status' => null,
                    'educ_attainment' => null,
                    'zone' => null,
                    'religion' => null,
                    'occupation' => null,
                    'contact' => null,
                    'philhealth' => null,
                    'first_dose' => null,
                    'second_dose' => null,
                    'vaccine_brand' => null,
                    'booster' => null,
                    'booster_brand' => null,
                ]
            ]);
        }else{
            $this->wife = collect([$head->wife]);
        }

        $this->dispatchBrowserEvent('addWife');
    }

    public function addNewMember()
    {
        $this->new_members->push([
            'lname' => null,
            'fname' => null,
            'mname' => null,
            'sname' => null,
            'bday' => null,
            'bplace' => null,
            'educ_attain' => null,
            'fdose' => null,
            'sdose' => null,
            'brand' => null,
            'booster' => null,
            'bbrand' => null,
        ]);

        $this->dispatchBrowserEvent('addMembers');
    }

    public function removeOldMember($index)
    {
        array_push($this->removed_members, $this->old_members[$index]['id']);

        $this->old_members->pull($index);

        $this->dispatchBrowserEvent('addMembers');
    }

    public function removeNewMember($index)
    {
        $this->new_members->pull($index);
        $reindexed_new_members = $this->new_members->values();
        $this->new_members = $reindexed_new_members;

        $this->dispatchBrowserEvent('addMembers');
    }
    
    public function updateFamily()
    {
        $this->validate([
            'last_name' => 'required|string|max:255', 
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255', 
            'suffix_name' => 'nullable|string|max:255', 
            'birthday' => 'required|date', 
            'birthplace' => 'required|string|max:255', 
            'civil_status' => 'required|string|max:10', 
            'educational_attainment' => 'required|string|max:255', 
            'zone' => 'required|string|max:2', 
            'religion' => 'required|string|max:255', 
            'occupation' => 'required|string|max:255', 
            'contact' => 'required|digits:11', 
            'philhealth' => 'required|boolean',  
            'first_dose_date' => 'nullable|date', 
            'second_dose_date' => 'nullable|date', 
            'vaccine_brand' => 'nullable|string|max:255', 
            'booster_date' => 'nullable|date', 
            'booster_brand' => 'nullable|string|max:255',
            
            'wife.*.lname' => 'required|string|max:255', 
            'wife.*.fname' => 'required|string|max:255',
            'wife.*.mname' => 'nullable|string|max:255', 
            'wife.*.sname' => 'nullable|string|max:255', 
            'wife.*.bday' => 'required|date', 
            'wife.*.bplace' => 'required|string|max:255', 
            'wife.*.civil_status' => 'required|string|max:10', 
            'wife.*.educ_attainment' => 'required|string|max:255', 
            'wife.*.zone' => 'required|string|max:2', 
            'wife.*.religion' => 'required|string|max:255', 
            'wife.*.occupation' => 'required|string|max:255', 
            'wife.*.contact' => 'required|digits:11', 
            'wife.*.philhealth' => 'required|boolean', 
            'wife.*.first_dose' => 'nullable|date', 
            'wife.*.second_dose' => 'nullable|date', 
            'wife.*.vaccine_brand' => 'nullable|string|max:17', 
            'wife.*.booster' => 'nullable|date', 
            'wife.*.booster_brand' => 'nullable|string|max:17',

            'old_members.*.lname' => 'required|string|max:255',
            'old_members.*.fname' => 'required|string|max:255',
            'old_members.*.mname' => 'nullable|string|max:255',
            'old_members.*.sname' => 'nullable|string|max:255',
            'old_members.*.bday' => 'required|date',
            'old_members.*.bplace' => 'required|string|max:255',
            'old_members.*.educ_attainment' => 'required|string|max:255',
            'old_members.*.first_dose' => 'nullable|date',
            'old_members.*.second_dose' => 'nullable|date',
            'old_members.*.vaccine_brand' => 'nullable|string|max:17',
            'old_members.*.booster' => 'nullable|date',
            'old_members.*.booster_brand' => 'nullable|string|max:17',

            'new_members.*.lname' => 'required|string|max:255',
            'new_members.*.fname' => 'required|string|max:255',
            'new_members.*.mname' => 'nullable|string|max:255',
            'new_members.*.sname' => 'nullable|string|max:255',
            'new_members.*.bday' => 'required|date',
            'new_members.*.bplace' => 'required|string|max:255',
            'new_members.*.educ_attain' => 'required|string|max:255',
            'new_members.*.fdose' => 'nullable|date',
            'new_members.*.sdose' => 'nullable|date',
            'new_members.*.brand' => 'nullable|string|max:17',
            'new_members.*.booster' => 'nullable|date',
            'new_members.*.bbrand' => 'nullable|string|max:17',

            'water_source' => 'required|string|max:12',
            'type_of_house' => 'required|string|max:10',
            'toilet' => 'required|string|max:8',
            'garden' => 'required|string|max:20',
            'electricity' => 'required|string|max:8',
            'house_no' => 'required|string|max:255',

            'pwd' => 'nullable|integer|gte:0',
            'solo_parent' => 'nullable|integer|gte:0',
            'senior_citizen' => 'nullable|integer|gte:0',
            'pregnant' => 'nullable|integer|gte:0',
        ]);

        $head_fullname = '';

        if($this->middle_name === '' || is_null($this->middle_name)){
            $head_fullname = $this->first_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }else if($this->suffix_name === '' || is_null($this->suffix_name)){
            $head_fullname = $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }else{
            $head_fullname = $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }

        $updated_family_head = FamilyHead::find($this->family_head_id);

        $updated_family_head->lname = $this->last_name;
        $updated_family_head->fname = $this->first_name;
        $updated_family_head->mname = $this->middle_name;
        $updated_family_head->sname = $this->suffix_name;
        $updated_family_head->fullname = $head_fullname;
        $updated_family_head->bday = $this->birthday;
        $updated_family_head->bplace = $this->birthplace;
        $updated_family_head->civil_status = $this->civil_status;
        $updated_family_head->educ_attainment = $this->educational_attainment;
        $updated_family_head->zone = $this->zone;
        $updated_family_head->religion = $this->religion;
        $updated_family_head->occupation = $this->occupation;
        $updated_family_head->contact = $this->contact;
        $updated_family_head->philhealth = $this->philhealth;

        $updated_family_head->first_dose = $this->first_dose_date === '' ? null : $this->first_dose_date;

        $updated_family_head->second_dose = $this->second_dose_date === '' ? null : $this->second_dose_date;

        $updated_family_head->vaccine_brand = $this->vaccine_brand;

        $updated_family_head->booster = $this->booster_date === '' ? null : $this->booster_date;

        $updated_family_head->booster_brand = $this->booster_brand;

        // Additional Info
        $updated_family_head->water_source = $this->water_source;
        $updated_family_head->house = $this->type_of_house;
        $updated_family_head->toilet = $this->toilet;
        $updated_family_head->garden = $this->garden;
        $updated_family_head->electricity = $this->electricity;
        $updated_family_head->house_no = $this->house_no;

        // Beneficiaries
        $updated_family_head->pwd = $this->pwd == '0' ? null : $this->pwd;
        $updated_family_head->solo_parent = $this->solo_parent == '0' ? null : $this->solo_parent;
        $updated_family_head->senior_citizen = $this->senior_citizen == '0' ? null : $this->senior_citizen;
        $updated_family_head->pregnant = $this->pregnant == '0' ? null : $this->pregnant;
        $updated_family_head->update();

        if(!empty($this->removed_members)){
            foreach($this->removed_members as $removed_member){
                FamilyMember::find($removed_member)->delete();
            }
        }

        if(!$this->wife->isEmpty() && !is_null($updated_family_head->wife)){
            foreach($this->wife as $wf){
                $wife_fullname = '';
                if($wf['mname'] === ''|| is_null($wf['mname'])){
                    $wife_fullname = $wf['fname'] . ' ' . $wf['lname'] . ' ' . $wf['sname'];
                }else if($wf['sname'] === ''|| is_null($wf['sname'])){
                    $wife_fullname = $wf['fname'] . ' ' . $wf['mname'] . ' ' . $wf['lname'];
                }else{
                    $wife_fullname = $wf['fname'] . ' ' . $wf['mname'] . ' ' . $wf['lname'] . ' ' . $wf['sname'];
                }

                $updated_family_head->wife->lname = $wf['lname'];
                $updated_family_head->wife->fname = $wf['fname'];
                $updated_family_head->wife->mname = $wf['mname'];
                $updated_family_head->wife->sname = $wf['sname'];
                $updated_family_head->wife->fullname = $wife_fullname;
                $updated_family_head->wife->bday = $wf['bday'];
                $updated_family_head->wife->bplace = $wf['bplace'];
                $updated_family_head->wife->civil_status = $wf['civil_status'];
                $updated_family_head->wife->educ_attainment = $wf['educ_attainment'];
                $updated_family_head->wife->zone = $wf['zone'];
                $updated_family_head->wife->religion = $wf['religion'];
                $updated_family_head->wife->occupation = $wf['occupation'];
                $updated_family_head->wife->contact = $wf['contact'];
                $updated_family_head->wife->philhealth = $wf['philhealth'];
                $updated_family_head->wife->first_dose = $wf['first_dose'] === '' ? null : $wf['first_dose'];
                $updated_family_head->wife->second_dose = $wf['second_dose'] === '' ? null : $wf['second_dose'];
                $updated_family_head->wife->vaccine_brand = $wf['vaccine_brand'];
                $updated_family_head->wife->booster = $wf['booster'] === '' ? null : $wf['booster'];
                $updated_family_head->wife->booster_brand = $wf['booster_brand'];
                $updated_family_head->wife->update();
            }
        }else if(!$this->wife->isEmpty() && is_null($updated_family_head->wife)){
            foreach($this->wife as $wf){
                $wife_fullname = '';
                if($wf['mname'] === ''|| is_null($wf['mname'])){
                    $wife_fullname = $wf['fname'] . ' ' . $wf['lname'] . ' ' . $wf['sname'];
                }else if($wf['sname'] === ''|| is_null($wf['sname'])){
                    $wife_fullname = $wf['fname'] . ' ' . $wf['mname'] . ' ' . $wf['lname'];
                }else{
                    $wife_fullname = $wf['fname'] . ' ' . $wf['mname'] . ' ' . $wf['lname'] . ' ' . $wf['sname'];
                }

                $wife = new Wife();
                $wife->family_head_id = $updated_family_head->id;
                $wife->lname = $wf['lname'];
                $wife->fname = $wf['fname'];
                $wife->mname = $wf['mname'];
                $wife->sname = $wf['sname'];
                $wife->fullname = $wife_fullname;
                $wife->bday = $wf['bday'];
                $wife->bplace = $wf['bplace'];
                $wife->civil_status = $wf['civil_status'];
                $wife->educ_attainment = $wf['educ_attainment'];
                $wife->zone = $wf['zone'];
                $wife->religion = $wf['religion'];
                $wife->occupation = $wf['occupation'];
                $wife->contact = $wf['contact'];
                $wife->philhealth = $wf['philhealth'];
                $wife->first_dose = $wf['first_dose'] === '' ? null : $wf['first_dose'];
                $wife->second_dose = $wf['second_dose'] === '' ? null : $wf['second_dose'];
                $wife->vaccine_brand = $wf['vaccine_brand'];
                $wife->booster = $wf['booster'] === '' ? null : $wf['booster'];
                $wife->booster_brand = $wf['booster_brand'];
                $wife->save();
            }
        }else if($this->wife->isEmpty() && !is_null($updated_family_head->wife)){
            $updated_family_head->wife->delete();
        }

        $updated_members = $this->old_members->values();
        if(!$updated_members->isEmpty()){
            foreach($updated_members as $updated_member){
                foreach($updated_family_head->familyMembers as $familyMember){
                    if($updated_member['id'] === $familyMember->id){

                        $member_fullname = '';

                        if($updated_member['mname'] === ''|| is_null($updated_member['mname'])){
                            $member_fullname = $updated_member['fname'] . ' ' . $updated_member['lname'] . ' ' . $updated_member['sname'];
                        }else if($updated_member['sname'] === ''|| is_null($updated_member['sname'])){
                            $member_fullname = $updated_member['fname'] . ' ' . $updated_member['mname'] . ' ' . $updated_member['lname'];
                        }else{
                            $member_fullname = $updated_member['fname'] . ' ' . $updated_member['mname'] . ' ' . $updated_member['lname'] . ' ' . $updated_member['sname'];
                        }

                        $familyMember->lname = $updated_member['lname'];
                        $familyMember->fname = $updated_member['fname'];
                        $familyMember->mname = $updated_member['mname'];
                        $familyMember->sname = $updated_member['sname'];
                        $familyMember->fullname = $member_fullname;
                        $familyMember->bday = $updated_member['bday'];
                        $familyMember->bplace = $updated_member['bplace'];
                        $familyMember->educ_attainment = $updated_member['educ_attainment'];
                        $familyMember->first_dose = $updated_member['first_dose'] === '' ? null : $updated_member['first_dose'];
                        $familyMember->second_dose = $updated_member['second_dose'] === '' ? null : $updated_member['second_dose'];
                        $familyMember->vaccine_brand = $updated_member['vaccine_brand'];
                        $familyMember->booster = $updated_member['booster'] === '' ? null : $updated_member['booster'];
                        $familyMember->booster_brand = $updated_member['booster_brand'];
                        $familyMember->update();
                    }
                }
            }
        }


        if(!$this->new_members->isEmpty()){
            foreach($this->new_members as $new_member){

                $member_fullname = '';

                if($new_member['mname'] === ''|| is_null($new_member['mname'])){
                    $member_fullname = $new_member['fname'] . ' ' . $new_member['lname'] . ' ' . $new_member['sname'];
                }else if($new_member['sname'] === ''|| is_null($new_member['sname'])){
                    $member_fullname = $new_member['fname'] . ' ' . $new_member['mname'] . ' ' . $new_member['lname'];
                }else{
                    $member_fullname = $new_member['fname'] . ' ' . $new_member['mname'] . ' ' . $new_member['lname'] . ' ' . $new_member['sname'];
                }
                
                $family_member = new FamilyMember();
                $family_member->family_head_id = $updated_family_head->id;
                $family_member->lname = $new_member['lname'];
                $family_member->fname = $new_member['fname'];
                $family_member->mname = $new_member['mname'];
                $family_member->sname = $new_member['sname'];
                $family_member->fullname = $member_fullname;
                $family_member->bday = $new_member['bday'];
                $family_member->bplace = $new_member['bplace'];
                $family_member->educ_attainment = $new_member['educ_attain'];
                $family_member->first_dose = $new_member['fdose'] === '' ? null : $new_member['fdose'];
                $family_member->second_dose = $new_member['sdose'] === '' ? null : $new_member['sdose'];
                $family_member->vaccine_brand = $new_member['brand'];
                $family_member->booster = $new_member['booster'] === '' ? null : $new_member['booster'];
                $family_member->booster_brand = $new_member['bbrand'];
                $family_member->save();
            }
        }

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function deleteConfirmation($id)
    {
        $this->family_head_id = $id;
    }

    public function deleteFamily()
    {
        FamilyHead::find($this->family_head_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }

    public function render()
    {
        $families = FamilyHead::where('fullname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('lname', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.profile.residents', ['families' => $families]);
    }
}
