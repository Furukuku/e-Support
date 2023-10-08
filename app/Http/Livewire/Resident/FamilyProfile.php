<?php

namespace App\Http\Livewire\Resident;

use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use Illuminate\Support\Collection;
use Livewire\Component;
use PDO;

class FamilyProfile extends Component
{
    public $family_head_view = '';
    public $wife_view = 'd-none';
    public $member_view = 'd-none';
    public $others_view = 'd-none';


    public $page;

    public $last_name, $first_name, $middle_name, $suffix_name, $birthday, $birthplace, $civil_status, $educational_attainment, $zone, $religion, $occupation, $contact, $philhealth, $first_dose_date, $second_dose_date, $vaccine_brand, $booster_date, $booster_brand;

    public $wife;

    public Collection $members;

    public $water_source, $type_of_house, $toilet, $garden, $electricity, $house_no, $pwd, $solo_parent, $senior_citizen, $pregnant;

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
            'string' => 'The birthplace  field must be a string type.',
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
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 17 characters.',
        ],
        'members.*.booster' => [
            'date' => 'The booster field must be a valid date.',
        ],
        'members.*.bbrand' => [
            'string' => 'The booster brand field must be a string type.',
            'max' => 'The booster brand field must not exceed 17 characters.',
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
        'wife.*.status' => [
            'required' => 'The civil status field is required.',
            'string' => 'The civil status  field must be a string type.',
            'max' => 'The civil status field must not exceed 255 characters.',
        ],
        'wife.*.educ_attain' => [
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
        'wife.*.fdose' => [
            'date' => 'The first dose field must be a valid date.',
        ],
        'wife.*.sdose' => [
            'date' => 'The second dose field must be a valid date.',
        ],
        'wife.*.brand' => [
            'string' => 'The vaccine brand field must be a string type.',
            'max' => 'The vaccine brand field must not exceed 17 characters.',
        ],
        'wife.*.booster' => [
            'date' => 'The booster field must be a valid date.',
        ],
        'wife.*.bbrand' => [
            'string' => 'The booster brand field must be a string type.',
            'max' => 'The booster brand field must not exceed 17 characters.',
        ],
    ];

    public function viewHead()
    {
        $this->family_head_view = '';
        $this->wife_view = 'd-none';
        $this->member_view = 'd-none';
        $this->others_view = 'd-none';
    }

    public function viewWife()
    {
        $this->wife_view = '';
        $this->family_head_view = 'd-none';
        $this->member_view = 'd-none';
        $this->others_view = 'd-none';
    }

    public function viewMembers()
    {
        $this->member_view = '';
        $this->wife_view = 'd-none';
        $this->family_head_view = 'd-none';
        $this->others_view = 'd-none';
    }

    public function viewOthers()
    {
        $this->others_view = '';
        $this->member_view = 'd-none';
        $this->wife_view = 'd-none';
        $this->family_head_view = 'd-none';
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
                    'status' => null,
                    'educ_attain' => null,
                    'zone' => null,
                    'religion' => null,
                    'occupation' => null,
                    'contact' => null,
                    'philhealth' => null,
                    'fdose' => null,
                    'sdose' => null,
                    'brand' => null,
                    'booster' => null,
                    'bbrand' => null,
                ]
            ]);

        $this->fill([
            'members' => collect([
                [
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
                ],
            ])
        ]);
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
                'status' => null,
                'educ_attain' => null,
                'zone' => null,
                'religion' => null,
                'occupation' => null,
                'contact' => null,
                'philhealth' => null,
                'fdose' => null,
                'sdose' => null,
                'brand' => null,
                'booster' => null,
                'bbrand' => null,
            ]
        ]);
    }

    public function removeWife()
    {
        $this->wife = collect();
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
    }

    public function removeMember($index)
    {
        $this->members->pull($index);
        $reindexed_collection = $this->members->values();
        $this->members = $reindexed_collection;
    }

    public function toHead()
    {
        $this->page = 'to-head';
    }

    public function fromHeadToWife()
    {
        $this->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'suffix_name' => ['nullable', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'birthplace' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:9'],
            'educational_attainment' => ['required', 'string', 'max:255'],
            'zone' => ['required', 'string', 'max:1'],
            'religion' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'digits:11'],
            'philhealth' => ['required', 'boolean'],
            'first_dose_date' => ['nullable', 'date'],
            'second_dose_date' => ['nullable', 'date'],
            'vaccine_brand' => ['nullable', 'string', 'max:17'],
            'booster_date' => ['nullable', 'date'],
            'booster_brand' => ['nullable', 'string', 'max:17'],
        ]);

        $this->page = 'from-head-to-wife';
    }

    public function fromMembersToWife()
    {
        $this->page = 'from-members-to-wife';
    }

    public function fromWifeToMembers()
    {
        $this->validate([
            'wife.*.lname' => ['required', 'string', 'max:255'],
            'wife.*.fname' => ['required', 'string', 'max:255'],
            'wife.*.mname' => ['nullable', 'string', 'max:255'],
            'wife.*.sname' => ['nullable', 'string', 'max:255'],
            'wife.*.bday' => ['required', 'date'],
            'wife.*.bplace' => ['required', 'string', 'max:255'],
            'wife.*.status' => ['required', 'string', 'max:9'],
            'wife.*.educ_attain' => ['required', 'string', 'max:255'],
            'wife.*.zone' => ['required', 'string', 'max:1'],
            'wife.*.religion' => ['required', 'string', 'max:255'],
            'wife.*.occupation' => ['required', 'string', 'max:255'],
            'wife.*.contact' => ['required', 'digits:11'],
            'wife.*.philhealth' => ['required', 'boolean'],
            'wife.*.fdose' => ['nullable', 'date'],
            'wife.*.sdose' => ['nullable', 'date'],
            'wife.*.vaccine_brand' => ['nullable', 'string', 'max:17'],
            'wife.*.booster' => ['nullable', 'date'],
            'wife.*.bbrand' => ['nullable', 'string', 'max:17'],
        ]);

        $this->page = 'from-wife-to-members';
    }

    public function fromOthersToMembers()
    {
        $this->page = 'from-others-to-members';
    }

    public function toOthers()
    {
        $this->validate([
            'members.*.lname' => ['required', 'string', 'max:255'],
            'members.*.fname' => ['required', 'string', 'max:255'],
            'members.*.mname' => ['nullable', 'string', 'max:255'],
            'members.*.sname' => ['nullable', 'string', 'max:255'],
            'members.*.bday' => ['required', 'date'],
            'members.*.bplace' => ['required', 'string', 'max:255'],
            'members.*.educ_attain' => ['required', 'string', 'max:255'],
            'members.*.fdose' => ['nullable', 'date'],
            'members.*.sdose' => ['nullable', 'date'],
            'members.*.brand' => ['nullable', 'string', 'max:17'],
            'members.*.booster' => ['nullable', 'date'],
            'members.*.bbrand' => ['nullable', 'string', 'max:17'],
        ]);

        $this->page = 'to-others';
    }

    public function submit()
    {
        $this->validate([
            // family head
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'suffix_name' => ['nullable', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'birthplace' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:9'],
            'educational_attainment' => ['required', 'string', 'max:255'],
            'zone' => ['required', 'string', 'max:1'],
            'religion' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'digits:11'],
            'philhealth' => ['required', 'boolean'],
            'first_dose_date' => ['nullable', 'date'],
            'second_dose_date' => ['nullable', 'date'],
            'vaccine_brand' => ['nullable', 'string', 'max:255'],
            'booster_date' => ['nullable', 'date'],
            'booster_brand' => ['nullable', 'string', 'max:255'],

            // wife
            'wife.*.lname' => ['required', 'string', 'max:255'],
            'wife.*.fname' => ['required', 'string', 'max:255'],
            'wife.*.mname' => ['nullable', 'string', 'max:255'],
            'wife.*.sname' => ['nullable', 'string', 'max:255'],
            'wife.*.bday' => ['required', 'date'],
            'wife.*.bplace' => ['required', 'string', 'max:255'],
            'wife.*.status' => ['required', 'string', 'max:9'],
            'wife.*.educ_attain' => ['required', 'string', 'max:255'],
            'wife.*.zone' => ['required', 'string', 'max:1'],
            'wife.*.religion' => ['required', 'string', 'max:255'],
            'wife.*.occupation' => ['required', 'string', 'max:255'],
            'wife.*.contact' => ['required', 'digits:11'],
            'wife.*.philhealth' => ['required', 'boolean'],
            'wife.*.fdose' => ['nullable', 'date'],
            'wife.*.sdose' => ['nullable', 'date'],
            'wife.*.vaccine_brand' => ['nullable', 'string', 'max:17'],
            'wife.*.booster' => ['nullable', 'date'],
            'wife.*.bbrand' => ['nullable', 'string', 'max:17'],

            // family member
            'members.*.lname' => ['required', 'string', 'max:255'],
            'members.*.fname' => ['required', 'string', 'max:255'],
            'members.*.mname' => ['nullable', 'string', 'max:255'],
            'members.*.sname' => ['nullable', 'string', 'max:255'],
            'members.*.bday' => ['required', 'date'],
            'members.*.bplace' => ['required', 'string', 'max:255'],
            'members.*.educ_attain' => ['required', 'string', 'max:255'],
            'members.*.fdose' => ['nullable', 'date'],
            'members.*.sdose' => ['nullable', 'date'],
            'members.*.brand' => ['nullable', 'string', 'max:255'],
            'members.*.booster' => ['nullable', 'date'],
            'members.*.bbrand' => ['nullable', 'string', 'max:255'],

            // other info.
            'water_source' => ['required', 'string', 'max:11'],
            'type_of_house' => ['required', 'string', 'max:8'],
            'toilet' => ['required', 'string', 'max:7'],
            'garden' => ['required', 'string', 'max:17'],
            'electricity' => ['required', 'string', 'max:7'],
            'house_no' => ['required', 'string', 'max:255'],
            'pwd' => ['nullable', 'integer', 'gte:0'],
            'solo_parent' => ['nullable', 'integer', 'gte:0'],
            'senior_citizen' => ['nullable', 'integer', 'gte:0'],
            'pregnant' => ['nullable', 'integer', 'gte:0'],
        ]);

        $head_fullname = '';

        if($this->middle_name === '' || is_null($this->middle_name)){
            $head_fullname = $this->first_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }else if($this->suffix_name === '' || is_null($this->suffix_name)){
            $head_fullname = $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
        }else{
            $head_fullname = $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name . ' ' . $this->suffix_name;
        }

        $family_head = new FamilyHead();
        $family_head->user_id = auth()->guard('web')->id();
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
        $family_head->water_source = $this->water_source;
        $family_head->house = $this->type_of_house;
        $family_head->toilet = $this->toilet;
        $family_head->garden = $this->garden;
        $family_head->electricity = $this->electricity;
        $family_head->house_no = $this->house_no;
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
                $wife->civil_status = $wf['status'];
                $wife->educ_attainment = $wf['educ_attain'];
                $wife->zone = $wf['zone'];
                $wife->religion = $wf['religion'];
                $wife->occupation = $wf['occupation'];
                $wife->contact = $wf['contact'];
                $wife->philhealth = $wf['philhealth'];
                $wife->first_dose = $wf['fdose'] === '' ? null : $wf['fdose'];
                $wife->second_dose = $wf['sdose'] === '' ? null : $wf['sdose'];
                $wife->vaccine_brand = $wf['brand'];
                $wife->booster = $wf['booster'] === '' ? null : $wf['booster'];
                $wife->booster_brand = $wf['bbrand'];
                $wife->save();
            }
        }

        if(!$this->members->isEmpty()){
            foreach($this->members as $member) {

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

        return redirect()->route('resident.family-profile');
    }

    public function render()
    {
        return view('livewire.resident.family-profile');
    }
}
