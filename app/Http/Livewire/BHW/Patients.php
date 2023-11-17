<?php

namespace App\Http\Livewire\BHW;

use App\Models\HealthRecord;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $last_name, $first_name, $middle_name, $suffix_name, $gender, $patient_civil_status, $age, $patient_birthday, $mother_name, $mobile_no, $blood_type, $religion, $patient_education, $patient_occupation, $municipality, $barangay, $zone, $street;

    public $philhealth_no, $member_name, $membership_type, $category_type, $expiry, $philhealth_birthday, $philhealth_civil_status, $philhealth_education, $philhealth_occupation;

    public $weight, $temperature, $bp, $height, $pulse_rate, $respiratory_rate;

    public $patient_id;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    protected $rules = [
        'last_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'middle_name' => ['nullable', 'string', 'max:255'],
        'suffix_name' => ['nullable', 'string', 'max:255'],
        'gender' => ['required', 'string', 'max:6'],
        'patient_civil_status' => ['required', 'string', 'max:10'],
        'age' => ['required', 'integer', 'min:0'],
        'patient_birthday' => ['required', 'date'],
        'mother_name' => ['required', 'string', 'max:255'],
        'mobile_no' => ['required', 'digits:11'],
        'blood_type' => ['required', 'string', 'max:100'],
        'religion' => ['required', 'string', 'max:255'],
        'patient_education' => ['required', 'string', 'max:255'],
        'patient_occupation' => ['required', 'string', 'max:255'],
        'municipality' => ['required', 'string', 'max:255'],
        'barangay' => ['required', 'string', 'max:255'],
        'zone' => ['required', 'string', 'max:2'],
        'street' => ['required', 'string', 'max:255'],
        'philhealth_no' => ['nullable', 'string', 'max:255'],
        'member_name' => ['nullable', 'string', 'max:255'],
        'membership_type' => ['nullable', 'string', 'max:255'],
        'category_type' => ['nullable', 'string', 'max:255'],
        'expiry' => ['nullable', 'string', 'max:255'],
        'philhealth_birthday' => ['nullable', 'date'],
        'philhealth_civil_status' => ['nullable', 'string', 'max:10'],
        'philhealth_education' => ['nullable', 'string', 'max:255'],
        'philhealth_occupation' => ['nullable', 'string', 'max:255'],
        'weight' => ['required', 'string', 'max:255'],
        'temperature' => ['required', 'string', 'max:255'],
        'bp' => ['required', 'string', 'max:255'],
        'height' => ['required', 'string', 'max:255'],
        'pulse_rate' => ['required', 'string', 'max:255'],
        'respiratory_rate' => ['required', 'string', 'max:255'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function resetInputs()
    // {
    //     $this->patient_id = null;
    //     $this->last_name = null;
    //     $this->first_name = null;
    //     $this->middle_name = null;
    //     $this->suffix_name = null;
    //     $this->gender = null;
    //     $this->patient_civil_status = null;
    //     $this->age = null;
    //     $this->patient_birthday = null;
    //     $this->mother_name = null;
    //     $this->mobile_no = null;
    //     $this->blood_type = null;
    //     $this->religion = null;
    //     $this->patient_education = null;
    //     $this->patient_occupation = null;
    //     $this->municipality = null;
    //     $this->barangay = null;
    //     $this->zone = null;
    //     $this->street = null;
    //     $this->philhealth_no = null;
    //     $this->member_name = null;
    //     $this->membership_type = null;
    //     $this->category_type = null;
    //     $this->expiry = null;
    //     $this->philhealth_birthday = null;
    //     $this->philhealth_civil_status = null;
    //     $this->philhealth_education = null;
    //     $this->philhealth_occupation = null;
    //     $this->weight = null;
    //     $this->temperature = null;
    //     $this->bp = null;
    //     $this->height = null;
    //     $this->pulse_rate = null;
    //     $this->respiratory_rate = null;
    // }

    public function closeModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function addPatient()
    {
        $this->validate();

        Patient::create([
            'lname' => $this->last_name,
            'fname' => $this->first_name,
            'mname' => $this->middle_name,
            'sname' => $this->suffix_name,
            'gender' => $this->gender,
            'p_civil_status' => $this->patient_civil_status,
            'age' => $this->age,
            'p_bday' => $this->patient_birthday,
            'mother_maiden_name' => $this->mother_name,
            'mobile' => $this->mobile_no,
            'blood_type' => $this->blood_type,
            'religion' => $this->religion,
            'p_education' => $this->patient_education,
            'p_occupation' => $this->patient_occupation,
            'municipality' => $this->municipality,
            'barangay' => $this->barangay,
            'zone' => $this->zone,
            'street' => $this->street,
            'philhealth_no' => $this->philhealth_no,
            'member_name' => $this->member_name,
            'membership_type' => $this->membership_type,
            'category_type' => $this->category_type,
            'expiry' => $this->expiry,
            'ph_bday' => $this->philhealth_birthday,
            'ph_civil_status' => $this->philhealth_civil_status,
            'ph_education' => $this->philhealth_education,
            'ph_occupation' => $this->philhealth_occupation,
            'weight' => $this->weight,
            'temp' => $this->temperature,
            'bp' => $this->bp,
            'height' => $this->height,
            'pulse_rate' => $this->pulse_rate,
            'respiratory_rate' => $this->respiratory_rate,
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->resetValidation();
        $this->reset();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Patient successfully added']);
    }

    public function editPatient(Patient $patient)
    {
        $this->patient_id = $patient->id;
        $this->last_name = $patient->lname;
        $this->first_name = $patient->fname;
        $this->middle_name = $patient->mname;
        $this->suffix_name = $patient->sname;
        $this->gender = $patient->gender;
        $this->patient_civil_status = $patient->p_civil_status;
        $this->age = $patient->age;
        $this->patient_birthday = $patient->p_bday;
        $this->mother_name = $patient->mother_maiden_name;
        $this->mobile_no = $patient->mobile;
        $this->blood_type = $patient->blood_type;
        $this->religion = $patient->religion;
        $this->patient_education = $patient->p_education;
        $this->patient_occupation = $patient->p_occupation;
        $this->municipality = $patient->municipality;
        $this->barangay = $patient->barangay;
        $this->zone = $patient->zone;
        $this->street = $patient->street;
        $this->philhealth_no = $patient->philhealth_no;
        $this->member_name = $patient->member_name;
        $this->membership_type = $patient->membership_type;
        $this->category_type = $patient->category_type;
        $this->expiry = $patient->expiry;
        $this->philhealth_birthday = $patient->ph_bday;
        $this->philhealth_civil_status = $patient->ph_civil_status;
        $this->philhealth_education = $patient->ph_education;
        $this->philhealth_occupation = $patient->ph_occupation;
        $this->weight = $patient->weight;
        $this->temperature = $patient->temp;
        $this->bp = $patient->bp;
        $this->height = $patient->height;
        $this->pulse_rate = $patient->pulse_rate;
        $this->respiratory_rate = $patient->respiratory_rate;
    }

    public function updatePatient()
    {
        $this->validate();

        $patient = Patient::find($this->patient_id);
        $patient->lname = $this->last_name;
        $patient->fname = $this->first_name;
        $patient->mname = $this->middle_name;
        $patient->sname = $this->suffix_name;
        $patient->gender = $this->gender;
        $patient->p_civil_status = $this->patient_civil_status;
        $patient->age = $this->age;
        $patient->p_bday = $this->patient_birthday;
        $patient->mother_maiden_name = $this->mother_name;
        $patient->mobile = $this->mobile_no;
        $patient->blood_type = $this->blood_type;
        $patient->religion = $this->religion;
        $patient->p_education = $this->patient_education;
        $patient->p_occupation = $this->patient_occupation;
        $patient->municipality = $this->municipality;
        $patient->barangay = $this->barangay;
        $patient->zone = $this->zone;
        $patient->street = $this->street;
        $patient->philhealth_no = $this->philhealth_no;
        $patient->member_name = $this->member_name;
        $patient->membership_type = $this->membership_type;
        $patient->category_type = $this->category_type;
        $patient->expiry = $this->expiry;
        $patient->ph_bday = $this->philhealth_birthday;
        $patient->ph_civil_status = $this->philhealth_civil_status;
        $patient->ph_education = $this->philhealth_education;
        $patient->ph_occupation = $this->philhealth_occupation;
        $patient->weight = $this->weight;
        $patient->temp = $this->temperature;
        $patient->bp = $this->bp;
        $patient->height = $this->height;
        $patient->pulse_rate = $this->pulse_rate;
        $patient->respiratory_rate = $this->respiratory_rate;
        $patient->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Patient updated successfully']);
    }

    public function render()
    {
        $patients = Patient::where('fname', 'like', '%' . $this->search . '%')
        ->orWhere('mname', 'like', '%' . $this->search . '%')
        ->orWhere('lname', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate($this->paginate);

        // $total_patients = Patient::count();

        $today_patients = HealthRecord::whereDate('created_at', today())->count();

        return view('livewire.b-h-w.patients', [
            'patients' => $patients,
            // 'total_patients' => $total_patients,
            'today_patients' => $today_patients,
        ]);
    }
}
