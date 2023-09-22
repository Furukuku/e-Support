<?php

namespace App\Http\Livewire\BHW;

use App\Models\Family;
use Livewire\Component;
use App\Models\FamilyMember;
use Livewire\WithPagination;
use Illuminate\Support\Collection;

class Residents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    // Family Head variables
    public $family_head_last_name, $family_head_first_name, $family_head_middle_name, $family_head_suffix_name, $family_head_birthday, $family_head_birthplace, $family_head_civil_status, $family_head_eductaional_attainment, $family_head_zone, $family_head_religion, $family_head_occupation, $family_head_contact, $family_head_philhealth, $family_head_first_dose_date, $family_head_second_dose_date, $family_head_vaccine_brand, $family_head_booster_date, $family_head_booster_brand;

    // Wife variables
    public $wife_last_name, $wife_first_name, $wife_middle_name, $wife_suffix_name, $wife_birthday, $wife_birthplace, $wife_civil_status, $wife_eductaional_attainment, $wife_zone, $wife_religion, $wife_occupation, $wife_contact, $wife_philhealth, $wife_first_dose_date, $wife_second_dose_date, $wife_vaccine_brand, $wife_booster_date, $wife_booster_brand;

    // Family Members variables/collection of Family Members
    public Collection $members;

    // variable for viewing family
    public $family;

    // variable for old members
    public Collection $old_members;

    // variable for new members
    public Collection $new_members;

    public $family_id;

    // array of ids of members that will removed
    public $removed_members = [];

    // Additional Info variables
    public $total_family_member, $water_source, $type_of_house, $toilet, $garden, $electricity;

    // Members variables
    public $pwd, $solo_parent, $senior_citizen, $pregnant;

    public $search = "";

    protected $listeners = ['closeModal'];

    protected $rules = [
        'family_head_last_name' => 'required|string|max:255', 
        'family_head_first_name' => 'required|string|max:255',
        'family_head_middle_name' => 'nullable|string|max:255', 
        'family_head_suffix_name' => 'nullable|string|max:255', 
        'family_head_birthday' => 'required|date', 
        'family_head_birthplace' => 'required|string|max:255', 
        'family_head_civil_status' => 'required|string|max:10', 
        'family_head_eductaional_attainment' => 'required|string|max:255', 
        'family_head_zone' => 'required|string|max:2', 
        'family_head_religion' => 'required|string|max:255', 
        'family_head_occupation' => 'required|string|max:255', 
        'family_head_contact' => 'required|digits:11', 
        'family_head_philhealth' => 'required|string|max:3',  
        'family_head_first_dose_date' => 'nullable|date', 
        'family_head_second_dose_date' => 'nullable|date', 
        'family_head_vaccine_brand' => 'nullable|string|max:255', 
        'family_head_booster_date' => 'nullable|date', 
        'family_head_booster_brand' => 'nullable|string|max:255',
        
        'wife_last_name' => 'required|string|max:255', 
        'wife_first_name' => 'required|string|max:255',
        'wife_middle_name' => 'nullable|string|max:255', 
        'wife_suffix_name' => 'nullable|string|max:255', 
        'wife_birthday' => 'required|date', 
        'wife_birthplace' => 'required|string|max:255', 
        'wife_civil_status' => 'required|string|max:10', 
        'wife_eductaional_attainment' => 'required|string|max:255', 
        'wife_zone' => 'required|string|max:2', 
        'wife_religion' => 'required|string|max:255', 
        'wife_occupation' => 'required|string|max:255', 
        'wife_contact' => 'required|digits:11', 
        'wife_philhealth' => 'required|string|max:3', 
        'wife_first_dose_date' => 'nullable|date', 
        'wife_second_dose_date' => 'nullable|date', 
        'wife_vaccine_brand' => 'nullable|string|max:255', 
        'wife_booster_date' => 'nullable|date', 
        'wife_booster_brand' => 'nullable|string|max:255',

        'members.*.family_member_last_name' => 'required|string|max:255',
        'members.*.family_member_first_name' => 'required|string|max:255',
        'members.*.family_member_middle_name' => 'nullable|string|max:255',
        'members.*.family_member_suffix_name' => 'nullable|string|max:255',
        'members.*.family_member_birthday' => 'required|date',
        'members.*.family_member_birthplace' => 'required|string|max:255',
        'members.*.family_member_educational_attainment' => 'required|string|max:255',
        'members.*.family_member_first_dose_date' => 'nullable|date',
        'members.*.family_member_second_dose_date' => 'nullable|date',
        'members.*.family_member_vaccine_brand' => 'nullable|string|max:255',
        'members.*.family_member_booster_date' => 'nullable|date',
        'members.*.family_member_booster_brand' => 'nullable|string|max:255',

        'total_family_member' => 'required|integer|gte:0',
        'water_source' => 'required|string|max:12',
        'type_of_house' => 'required|string|max:10',
        'toilet' => 'required|string|max:8',
        'garden' => 'required|string|max:20',
        'electricity' => 'required|string|max:8',

        'pwd' => 'nullable|integer|gte:0',
        'solo_parent' => 'nullable|integer|gte:0',
        'senior_citizen' => 'nullable|integer|gte:0',
        'pregnant' => 'nullable|integer|gte:0',
    ];

    protected $messages = [
        'members.*.family_member_last_name' => [
            'required' => 'The last name field is required.',
            'string' => 'The last name field must be a string type.',
            'max' => 'The last name field must not exceed 255 characters.',
        ],
        'members.*.family_member_first_name' => [
            'required' => 'The first name field is required.',
            'string' => 'The first name field must be a string type.',
            'max' => 'The first name field must not exceed 255 characters.',
        ],
        'members.*.family_member_middle_name' => [
            'string' => 'The middle name field must be a string type.',
            'max' => 'The middle name field must not exceed 255 characters.',
        ],
        'members.*.family_member_suffix_name' => [
            'string' => 'The suffix name field must be a string type.',
            'max' => 'The suffix name field must not exceed 255 characters.',
        ],
        'members.*.family_member_birthday' => [
            'required' => 'The birthday field is required.',
            'date' => 'The birthday field must be a valid date.',
        ],
        'members.*.family_member_birthplace' => [
            'required' => 'The birthplace field is required.',
            'string' => 'The birthplace field must be a string type.',
            'max' => 'The birthplace field must not exceed 255 characters.',
        ],
        'members.*.family_member_educational_attainment' => [
            'required' => 'The educational attainment field is required.',
            'string' => 'The educational attainment field must be a string type.',
            'max' => 'The educational attainment field must not exceed 255 characters.',
        ],
        'members.*.family_member_first_dose_date' => [
            'date' => 'The first dose field must be a valid date.',
        ],
        'members.*.family_member_second_dose_date' => [
            'date' => 'The second dose field must be a valid date.',
        ],
        'members.*.family_member_vaccine_brand' => [
            'required' => 'The vaccine brand field is required.',
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 255 characters.',
        ],
        'members.*.family_member_booster_date' => [
            'date' => 'The booster dose field must be a valid date.',
        ],
        'members.*.family_member_booster_brand' => [
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
        $this->family_head_last_name = null;
        $this->family_head_first_name = null;
        $this->family_head_middle_name = null;
        $this->family_head_suffix_name = null;
        $this->family_head_birthday = null;
        $this->family_head_birthplace = null;
        $this->family_head_civil_status = null;
        $this->family_head_eductaional_attainment = null;
        $this->family_head_zone = null;
        $this->family_head_religion = null;
        $this->family_head_occupation = null;
        $this->family_head_contact = null;
        $this->family_head_philhealth = null;
        $this->family_head_first_dose_date = null;
        $this->family_head_second_dose_date = null;
        $this->family_head_vaccine_brand = null;
        $this->family_head_booster_date = null;
        $this->family_head_booster_brand = null;

        // Wife
        $this->wife_last_name = null;
        $this->wife_first_name = null;
        $this->wife_middle_name = null;
        $this->wife_suffix_name = null;
        $this->wife_birthday = null;
        $this->wife_birthplace = null;
        $this->wife_civil_status = null;
        $this->wife_eductaional_attainment = null;
        $this->wife_zone = null;
        $this->wife_religion = null;
        $this->wife_occupation = null;
        $this->wife_contact = null;
        $this->wife_philhealth = null;
        $this->wife_first_dose_date = null;
        $this->wife_second_dose_date = null;
        $this->wife_vaccine_brand = null;
        $this->wife_booster_date = null;
        $this->wife_booster_brand = null;

        // Additional Info
        $this->total_family_member = null;
        $this->water_source = null;
        $this->type_of_house = null;
        $this->toilet = null;
        $this->garden = null;
        $this->electricity = null;

        // Beneficiaries
        $this->pwd = null;
        $this->solo_parent = null;
        $this->senior_citizen = null;
        $this->pregnant = null;

        $this->family = null;

        $this->removed_members = [];

        $this->mount();

        $this->old_members = collect();

        $this->new_members = collect();
    }

    public function mount()
    {
        $this->fill([
            'members' => collect([[
                'family_member_last_name' => null,
                'family_member_first_name' => null,
                'family_member_middle_name' => null,
                'family_member_suffix_name' => null,
                'family_member_birthday' => null,
                'family_member_birthplace' => null,
                'family_member_educational_attainment' => null,
                'family_member_first_dose_date' => null,
                'family_member_second_dose_date' => null,
                'family_member_vaccine_brand' => null,
                'family_member_booster_date' => null,
                'family_member_booster_brand' => null,
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

    public function addMember()
    {
        $this->members->push([
            'family_member_last_name' => null,
            'family_member_first_name' => null,
            'family_member_middle_name' => null,
            'family_member_suffix_name' => null,
            'family_member_birthday' => null,
            'family_member_birthplace' => null,
            'family_member_educational_attainment' => null,
            'family_member_first_dose_date' => null,
            'family_member_second_dose_date' => null,
            'family_member_vaccine_brand' => null,
            'family_member_booster_date' => null,
            'family_member_booster_brand' => null,
        ]);

        $this->dispatchBrowserEvent('addMembers');
    }

    public function removeMember($key)
    {
        $this->members->pull($key);

        // $reindex_members = collect($this->members)->all();
        $reindex_members = $this->members->values();

        $this->members = $reindex_members;

        $this->dispatchBrowserEvent('addMembers');
    }

    public function addFamily()
    {
        $this->validate();

        $family = new Family();

        // Family Head
        $family->head_lname = $this->family_head_last_name;
        $family->head_fname = $this->family_head_first_name;
        $family->head_mname = $this->family_head_middle_name;
        $family->head_sname = $this->family_head_suffix_name;
        $family->head_bday = $this->family_head_birthday;
        $family->head_bplace = $this->family_head_birthplace;
        $family->head_civil_status = $this->family_head_civil_status;
        $family->head_educ_attainment = $this->family_head_eductaional_attainment;
        $family->head_zone = $this->family_head_zone;
        $family->head_religion = $this->family_head_religion;
        $family->head_occupation = $this->family_head_occupation;
        $family->head_contact = $this->family_head_contact;
        $family->head_philhealth = $this->family_head_philhealth;

        $family->head_first_dose = $this->family_head_first_dose_date === '' ? null : $this->family_head_first_dose_date;

        $family->head_second_dose = $this->family_head_second_dose_date === '' ? null : $this->family_head_second_dose_date;

        $family->head_vaccine_brand = $this->family_head_vaccine_brand;

        $family->head_booster = $this->family_head_booster_date === '' ? null : $this->family_head_booster_date;

        $family->head_booster_brand = $this->family_head_booster_brand;

        // Wife
        $family->wife_lname = $this->wife_last_name;
        $family->wife_fname = $this->wife_first_name;
        $family->wife_mname = $this->wife_middle_name;
        $family->wife_sname = $this->wife_suffix_name;
        $family->wife_bday = $this->wife_birthday;
        $family->wife_bplace = $this->wife_birthplace;
        $family->wife_civil_status = $this->wife_civil_status;
        $family->wife_educ_attainment = $this->wife_eductaional_attainment;
        $family->wife_zone = $this->wife_zone;
        $family->wife_religion = $this->wife_religion;
        $family->wife_occupation = $this->wife_occupation;
        $family->wife_contact = $this->wife_contact;
        $family->wife_philhealth = $this->wife_philhealth;

        $family->wife_first_dose = $this->wife_first_dose_date === '' ? null : $this->wife_first_dose_date;

        $family->wife_second_dose = $this->wife_second_dose_date === '' ? null : $this->wife_second_dose_date;

        $family->wife_vaccine_brand = $this->wife_vaccine_brand;

        $family->wife_booster = $this->wife_booster_date === '' ? null : $this->wife_booster_date;

        $family->wife_booster_brand = $this->wife_booster_brand;

        // Additional Info
        $family->total_family_member = $this->total_family_member;
        $family->water_source = $this->water_source;
        $family->house = $this->type_of_house;
        $family->toilet = $this->toilet;
        $family->garden = $this->garden;
        $family->electricity = $this->electricity;

        // Beneficiaries
        $family->pwd = $this->pwd == '0' ? null : $this->pwd;
        $family->solo_parent = $this->solo_parent == '0' ? null : $this->solo_parent;
        $family->senior_citizen = $this->senior_citizen == '0' ? null : $this->senior_citizen;
        $family->pregnant = $this->pregnant == '0' ? null : $this->pregnant;
        $family->save();

        $final_members = collect($this->members)->all();
        $final_members = array_values($final_members);

        if(sizeof($final_members) > 0){
            for($i = 0; $i < sizeof($final_members); $i++){
                FamilyMember::create([
                    'family_id' => $family->id,
                    'lname' => $final_members[$i]['family_member_last_name'],
                    'fname' => $final_members[$i]['family_member_first_name'],
                    'mname' => $final_members[$i]['family_member_middle_name'],
                    'sname' => $final_members[$i]['family_member_suffix_name'],
                    'bday' => $final_members[$i]['family_member_birthday'],
                    'bplace' => $final_members[$i]['family_member_birthplace'],
                    'educ_attainment' => $final_members[$i]['family_member_educational_attainment'],

                    'first_dose' => $final_members[$i]['family_member_first_dose_date'] === '' ? null : $final_members[$i]['family_member_first_dose_date'],

                    'second_dose' => $final_members[$i]['family_member_second_dose_date'] === '' ? null : $final_members[$i]['family_member_second_dose_date'],

                    'vaccine_brand' => $final_members[$i]['family_member_vaccine_brand'],
                    'booster' => $final_members[$i]['family_member_booster_date'] === '' ? null : $final_members[$i]['family_member_booster_date'],
                    'booster_brand' => $final_members[$i]['family_member_booster_brand'],
                ]);
            }
        }

        if(!is_null($family->getKey())){
            $this->dispatchBrowserEvent('close-modal');
            $this->resetInputs();
            $this->resetErrorBag();
        }else{
            dd($php_errormsg);
        }
    }

    public function viewFamily($id)
    {
        $this->family = Family::with('familyMembers')->find($id);
    }

    public function editFamily($id)
    {
        $family = Family::with('familyMembers')->find($id);

        $this->old_members = collect($family->familyMembers);

        $this->family_id = $family->id;

        // Family Head
        $this->family_head_last_name = $family->head_lname;
        $this->family_head_first_name = $family->head_fname;
        $this->family_head_middle_name = $family->head_mname;
        $this->family_head_suffix_name = $family->head_sname;
        $this->family_head_birthday = $family->head_bday;
        $this->family_head_birthplace = $family->head_bplace;
        $this->family_head_civil_status = $family->head_civil_status;
        $this->family_head_eductaional_attainment = $family->head_educ_attainment;
        $this->family_head_zone = $family->head_zone;
        $this->family_head_religion = $family->head_religion;
        $this->family_head_occupation = $family->head_occupation;
        $this->family_head_contact = $family->head_contact;
        $this->family_head_philhealth = $family->head_philhealth;
        $this->family_head_first_dose_date = $family->head_first_dose;
        $this->family_head_second_dose_date = $family->head_second_dose;
        $this->family_head_vaccine_brand = $family->head_vaccine_brand;
        $this->family_head_booster_date = $family->head_booster;
        $this->family_head_booster_brand = $family->head_booster_brand;

        // Wife
        $this->wife_last_name = $family->wife_lname;
        $this->wife_first_name = $family->wife_fname;
        $this->wife_middle_name = $family->wife_mname;
        $this->wife_suffix_name = $family->wife_sname;
        $this->wife_birthday = $family->wife_bday;
        $this->wife_birthplace = $family->wife_bplace;
        $this->wife_civil_status = $family->wife_civil_status;
        $this->wife_eductaional_attainment = $family->wife_educ_attainment;
        $this->wife_zone = $family->wife_zone;
        $this->wife_religion = $family->wife_religion;
        $this->wife_occupation = $family->wife_occupation;
        $this->wife_contact = $family->wife_contact;
        $this->wife_philhealth = $family->wife_philhealth;
        $this->wife_first_dose_date = $family->wife_first_dose;
        $this->wife_second_dose_date = $family->wife_second_dose;
        $this->wife_vaccine_brand = $family->wife_vaccine_brand;
        $this->wife_booster_date = $family->wife_booster;
        $this->wife_booster_brand = $family->wife_booster_brand;

        // Additional Info
        $this->total_family_member = $family->total_family_member;
        $this->water_source = $family->water_source;
        $this->type_of_house = $family->house;
        $this->toilet = $family->toilet;
        $this->garden = $family->garden;
        $this->electricity = $family->electricity;

        // Beneficiaries
        $this->pwd = $family->pwd;
        $this->solo_parent = $family->solo_parent;
        $this->senior_citizen = $family->senior_citizen;
        $this->pregnant = $family->pregnant;
    }

    public function addNewMember()
    {
        $this->new_members->push([
            'family_member_last_name' => null,
            'family_member_first_name' => null,
            'family_member_middle_name' => null,
            'family_member_suffix_name' => null,
            'family_member_birthday' => null,
            'family_member_birthplace' => null,
            'family_member_educational_attainment' => null,
            'family_member_first_dose_date' => null,
            'family_member_second_dose_date' => null,
            'family_member_vaccine_brand' => null,
            'family_member_booster_date' => null,
            'family_member_booster_brand' => null,
        ]);

        $this->dispatchBrowserEvent('addMembers');
    }

    public function removeOldMember($key)
    {
        // dd($this->old_members[$key]['id']);
        // $member = $this->old_members[$key]['id'];

        array_push($this->removed_members, $this->old_members[$key]['id']);

        $this->old_members->pull($key);


        // dd(array_push($this->removed_members, $this->old_members[$key]['id']));

        $this->dispatchBrowserEvent('addMembers');
    }

    public function removeNewMember($key)
    {
        $this->new_members->pull($key);

        $this->dispatchBrowserEvent('addMembers');
    }
    
    public function updateFamily()
    {
        $this->validate([
            'family_head_last_name' => 'required|string|max:255', 
            'family_head_first_name' => 'required|string|max:255',
            'family_head_middle_name' => 'nullable|string|max:255', 
            'family_head_suffix_name' => 'nullable|string|max:255', 
            'family_head_birthday' => 'required|date', 
            'family_head_birthplace' => 'required|string|max:255', 
            'family_head_civil_status' => 'required|string|max:10', 
            'family_head_eductaional_attainment' => 'required|string|max:255', 
            'family_head_zone' => 'required|string|max:2', 
            'family_head_religion' => 'required|string|max:255', 
            'family_head_occupation' => 'required|string|max:255', 
            'family_head_contact' => 'required|digits:11', 
            'family_head_philhealth' => 'required|string|max:3',  
            'family_head_first_dose_date' => 'nullable|date', 
            'family_head_second_dose_date' => 'nullable|date', 
            'family_head_vaccine_brand' => 'nullable|string|max:255', 
            'family_head_booster_date' => 'nullable|date', 
            'family_head_booster_brand' => 'nullable|string|max:255',
            
            'wife_last_name' => 'required|string|max:255', 
            'wife_first_name' => 'required|string|max:255',
            'wife_middle_name' => 'nullable|string|max:255', 
            'wife_suffix_name' => 'nullable|string|max:255', 
            'wife_birthday' => 'required|date', 
            'wife_birthplace' => 'required|string|max:255', 
            'wife_civil_status' => 'required|string|max:10', 
            'wife_eductaional_attainment' => 'required|string|max:255', 
            'wife_zone' => 'required|string|max:2', 
            'wife_religion' => 'required|string|max:255', 
            'wife_occupation' => 'required|string|max:255', 
            'wife_contact' => 'required|digits:11', 
            'wife_philhealth' => 'required|string|max:3', 
            'wife_first_dose_date' => 'nullable|date', 
            'wife_second_dose_date' => 'nullable|date', 
            'wife_vaccine_brand' => 'nullable|string|max:255', 
            'wife_booster_date' => 'nullable|date', 
            'wife_booster_brand' => 'nullable|string|max:255',

            'old_members.*.lname' => 'required|string|max:255',
            'old_members.*.fname' => 'required|string|max:255',
            'old_members.*.mname' => 'nullable|string|max:255',
            'old_members.*.sname' => 'nullable|string|max:255',
            'old_members.*.bday' => 'required|date',
            'old_members.*.bplace' => 'required|string|max:255',
            'old_members.*.educ_attainment' => 'required|string|max:255',
            'old_members.*.first_dose' => 'nullable|date',
            'old_members.*.second_dose' => 'nullable|date',
            'old_members.*.vaccine_brand' => 'nullable|string|max:255',
            'old_members.*.booster' => 'nullable|date',
            'old_members.*.booster_brand' => 'nullable|string|max:255',

            'new_members.*.family_member_last_name' => 'required|string|max:255',
            'new_members.*.family_member_first_name' => 'required|string|max:255',
            'new_members.*.family_member_middle_name' => 'nullable|string|max:255',
            'new_members.*.family_member_suffix_name' => 'nullable|string|max:255',
            'new_members.*.family_member_birthday' => 'required|date',
            'new_members.*.family_member_birthplace' => 'required|string|max:255',
            'new_members.*.family_member_educational_attainment' => 'required|string|max:255',
            'new_members.*.family_member_first_dose_date' => 'nullable|date',
            'new_members.*.family_member_second_dose_date' => 'nullable|date',
            'new_members.*.family_member_vaccine_brand' => 'nullable|string|max:255',
            'new_members.*.family_member_booster_date' => 'nullable|date',
            'new_members.*.family_member_booster_brand' => 'nullable|string|max:255',
    
            'total_family_member' => 'required|integer|gte:0',
            'water_source' => 'required|string|max:12',
            'type_of_house' => 'required|string|max:10',
            'toilet' => 'required|string|max:8',
            'garden' => 'required|string|max:20',
            'electricity' => 'required|string|max:8',
    
            'pwd' => 'nullable|integer|gte:0',
            'solo_parent' => 'nullable|integer|gte:0',
            'senior_citizen' => 'nullable|integer|gte:0',
            'pregnant' => 'nullable|integer|gte:0',
        ]);

        $updated_family = Family::find($this->family_id);

        $updated_family->head_lname = ucwords($this->family_head_last_name);
        $updated_family->head_fname = ucwords($this->family_head_first_name);
        $updated_family->head_mname = $this->family_head_middle_name == '' ? null : ucwords($this->family_head_middle_name);
        $updated_family->head_sname = $this->family_head_suffix_name == '' ? null : ucwords($this->family_head_suffix_name);
        $updated_family->head_bday = $this->family_head_birthday;
        $updated_family->head_bplace = ucwords($this->family_head_birthplace);
        $updated_family->head_civil_status = ucwords($this->family_head_civil_status);
        $updated_family->head_educ_attainment = ucwords($this->family_head_eductaional_attainment);
        $updated_family->head_zone = $this->family_head_zone;
        $updated_family->head_religion = ucwords($this->family_head_religion);
        $updated_family->head_occupation = ucwords($this->family_head_occupation);
        $updated_family->head_contact = $this->family_head_contact;
        $updated_family->head_philhealth = ucwords($this->family_head_philhealth);

        $updated_family->head_first_dose = $this->family_head_first_dose_date == '' ? null : $this->family_head_first_dose_date;

        $updated_family->head_second_dose = $this->family_head_second_dose_date == '' ? null : $this->family_head_second_dose_date;

        $updated_family->head_vaccine_brand = $this->family_head_vaccine_brand == '' ? null : ucwords($this->family_head_vaccine_brand);

        $updated_family->head_booster = $this->family_head_booster_date == '' ? null : $this->family_head_booster_date;

        $updated_family->head_booster_brand = $this->family_head_booster_brand == '' ? null : ucwords($this->family_head_booster_brand);

        // Wife
        $updated_family->wife_lname = ucwords($this->wife_last_name);
        $updated_family->wife_fname = ucwords($this->wife_first_name);
        $updated_family->wife_mname = $this->wife_middle_name == '' ? null : ucwords($this->wife_middle_name);
        $updated_family->wife_sname = $this->wife_suffix_name == '' ? null : ucwords($this->wife_suffix_name);
        $updated_family->wife_bday = $this->wife_birthday;
        $updated_family->wife_bplace = ucwords($this->wife_birthplace);
        $updated_family->wife_civil_status = ucwords($this->wife_civil_status);
        $updated_family->wife_educ_attainment = ucwords($this->wife_eductaional_attainment);
        $updated_family->wife_zone = $this->wife_zone;
        $updated_family->wife_religion = ucwords($this->wife_religion);
        $updated_family->wife_occupation = ucwords($this->wife_occupation);
        $updated_family->wife_contact = $this->wife_contact;
        $updated_family->wife_philhealth = ucwords($this->wife_philhealth);

        $updated_family->wife_first_dose = $this->wife_first_dose_date == '' ? null : $this->wife_first_dose_date;

        $updated_family->wife_second_dose = $this->wife_second_dose_date == '' ? null : $this->wife_second_dose_date;

        $updated_family->wife_vaccine_brand = $this->wife_vaccine_brand == '' ? null : ucwords($this->wife_vaccine_brand);

        $updated_family->wife_booster = $this->wife_booster_date == '' ? null : $this->wife_booster_date;

        $updated_family->wife_booster_brand = $this->wife_booster_brand == '' ? null : ucwords($this->wife_booster_brand);

        // Additional Info
        $updated_family->total_family_member = $this->total_family_member == '0' ? null : $this->total_family_member;
        $updated_family->water_source = ucwords($this->water_source);
        $updated_family->house = ucwords($this->type_of_house);
        $updated_family->toilet = ucwords($this->toilet);
        $updated_family->garden = ucwords($this->garden);
        $updated_family->electricity = ucwords($this->electricity);

        // Beneficiaries
        $updated_family->pwd = $this->pwd == '0' ? null : $this->pwd;
        $updated_family->solo_parent = $this->solo_parent == '0' ? null : $this->solo_parent;
        $updated_family->senior_citizen = $this->senior_citizen == '0' ? null : $this->senior_citizen;
        $updated_family->pregnant = $this->pregnant == '0' ? null : $this->pregnant;
        $updated_family->update();

        if(sizeof($this->removed_members) > 0){
            foreach($this->removed_members as $removed_member){
                FamilyMember::find($removed_member)->delete();
            }
        }

        $updated_members = collect($this->old_members)->all();
        $updated_members = array_values($updated_members);

        // dd($updated_members);
        // $sample = Family::with('familyMembers')->find($updated_family->id);
        // dd($sample->familyMembers[0]->lname);
        if(sizeof($updated_members) > 0){
            $family = Family::with('familyMembers')->find($updated_family->id);
            for($i = 0; $i < sizeof($updated_members); $i++){
                // $family_member = FamilyMember::find($updated_family->id);
                // dd($sample->familyMembers);
                $family_member = $family->familyMembers[$i];
                $family_member->lname = ucwords($updated_members[$i]['lname']);
                $family_member->fname = ucwords($updated_members[$i]['fname']);
                $family_member->mname = $updated_members[$i]['mname'] == '' ? null : ucwords($updated_members[$i]['mname']);
                $family_member->sname = $updated_members[$i]['sname'] == '' ? null : ucwords($updated_members[$i]['sname']);
                $family_member->bday = $updated_members[$i]['bday'];
                $family_member->bplace = ucwords($updated_members[$i]['bplace']);
                $family_member->educ_attainment = ucwords($updated_members[$i]['educ_attainment']);

                $family_member->first_dose = $updated_members[$i]['first_dose'] == '' ? null : $updated_members[$i]['first_dose'];

                $family_member->second_dose = $updated_members[$i]['second_dose'] == '' ? null : $updated_members[$i]['second_dose'];

                $family_member->vaccine_brand = $updated_members[$i]['vaccine_brand'] == '' ? null : ucwords($updated_members[$i]['vaccine_brand']);
                $family_member->booster = $updated_members[$i]['booster'] == '' ? null : $updated_members[$i]['booster'];
                $family_member->booster_brand = $updated_members[$i]['booster_brand'] == '' ? null : ucwords($updated_members[$i]['booster_brand']);
                $family_member->update();
            }
        }

        $added_members = collect($this->new_members)->all();
        $added_members = array_values($added_members);

        if(sizeof($added_members) > 0){
            for($i = 0; $i < sizeof($added_members); $i++){
                FamilyMember::create([
                    'family_id' => $updated_family->id,
                    'lname' => ucwords($added_members[$i]['family_member_last_name']),
                    'fname' => ucwords($added_members[$i]['family_member_first_name']),
                    'mname' => $added_members[$i]['family_member_middle_name'] == '' ? null : ucwords($added_members[$i]['family_member_middle_name']),
                    'sname' => $added_members[$i]['family_member_suffix_name'] == '' ? null : ucwords($added_members[$i]['family_member_suffix_name']),
                    'bday' => $added_members[$i]['family_member_birthday'],
                    'bplace' => ucwords($added_members[$i]['family_member_birthplace']),
                    'educ_attainment' => ucwords($added_members[$i]['family_member_educational_attainment']),

                    'first_dose' => $added_members[$i]['family_member_first_dose_date'] == '' ? null : $added_members[$i]['family_member_first_dose_date'],

                    'second_dose' => $added_members[$i]['family_member_second_dose_date'] == '' ? null : $added_members[$i]['family_member_second_dose_date'],

                    'vaccine_brand' => $added_members[$i]['family_member_vaccine_brand'] == '' ? null : ucwords($added_members[$i]['family_member_vaccine_brand']),
                    'booster' => $added_members[$i]['family_member_booster_date'] == '' ? null : $added_members[$i]['family_member_booster_date'],
                    'booster_brand' => $added_members[$i]['family_member_booster_brand'] == '' ? null : ucwords($added_members[$i]['family_member_booster_brand']),
                ]);
            }
        }

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function deleteConfirmation($id)
    {
        $deleteFamily = Family::find($id);

        $this->family_id = $deleteFamily->id;
    }

    public function deleteFamily()
    {
        Family::find($this->family_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }
    
    public function render()
    {
        $families = Family::where('head_fname', 'like', '%' . $this->search . '%')
            ->orWhere('head_mname', 'like', '%' . $this->search . '%')
            ->orWhere('head_lname', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        $residents = Family::sum('total_family_member');

        $total_family = Family::count();

        return view('livewire.b-h-w.residents', [
            'families' => $families,
            'residents' => $residents,
            'total_family' => $total_family,
        ]);
    }
}
