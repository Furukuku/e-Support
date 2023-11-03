<?php

namespace App\Http\Livewire\BHW;

use App\Models\HealthRecord;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class HealthRecords extends Component
{
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $patient_id;

    public $non_communicable_diseases, $dental, $diabetes_mellitus, $hypertension, $cc;

    public $record_id;

    public $update_error;

    public $add_error;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    protected $rules = [
        'non_communicable_diseases' => ['nullable', 'string', 'size:25'],
        'dental' => ['nullable', 'string', 'size:6'],
        'diabetes_mellitus' => ['nullable', 'string', 'size:17'],
        'hypertension' => ['nullable', 'string', 'size:12'],
        'cc' => ['required', 'string', 'max:255'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->record_id = '';
        $this->non_communicable_diseases = '';
        $this->dental = '';
        $this->diabetes_mellitus = '';
        $this->hypertension = '';
        $this->cc = '';
        $this->add_error = null;
        $this->update_error = null;
    }

    public function updateFalseCheckboxes()
    {
        if($this->non_communicable_diseases === false){
            $this->non_communicable_diseases = null;
        }

        if($this->dental === false){
            $this->dental = null;
        }

        if($this->diabetes_mellitus === false){
            $this->diabetes_mellitus = null;
        }

        if($this->hypertension === false){
            $this->hypertension = null;
        }
    }

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->resetInputs();
    }

    public function add()
    {
        $this->updateFalseCheckboxes();

        $this->validate();

        if($this->non_communicable_diseases || $this->dental || $this->diabetes_mellitus || $this->hypertension){

            HealthRecord::create([
                'patient_id' => $this->patient_id,
                'nc_diseases' => $this->non_communicable_diseases,
                'dental' => $this->dental,
                'diabetes' => $this->diabetes_mellitus,
                'hypertension' => $this->hypertension,
                'cc' => $this->cc,
            ]);
    
            $this->dispatchBrowserEvent('close-modal');
            $this->resetValidation();
            $this->resetErrorBag();
            $this->resetInputs();

        }else{
            $this->add_error = 1;
        }

    }

    public function editHealthRecord(HealthRecord $record)
    {
        $this->record_id = $record->id;
        $this->non_communicable_diseases = $record->nc_diseases;
        $this->dental = $record->dental;
        $this->diabetes_mellitus = $record->diabetes;
        $this->hypertension = $record->hypertension;
        $this->cc = $record->cc;
    }

    public function update()
    {
        $this->updateFalseCheckboxes();

        $this->validate();

        if($this->non_communicable_diseases || $this->dental || $this->diabetes_mellitus || $this->hypertension){
            
            $record = HealthRecord::find($this->record_id);
            $record->nc_diseases = $this->non_communicable_diseases;
            $record->dental = $this->dental;
            $record->diabetes = $this->diabetes_mellitus;
            $record->hypertension = $this->hypertension;
            $record->cc = $this->cc;
            $record->update();
    
            $this->dispatchBrowserEvent('close-modal');
            $this->resetValidation();
            $this->resetErrorBag();
            $this->resetInputs();

        }else{
            $this->update_error = 1;
        }
    }

    public function render()
    {
        $patient = Patient::find($this->patient_id);

        $records = HealthRecord::where('patient_id', $this->patient_id)
            ->where(function($query){
                $query->where('nc_diseases', 'like', '%' . $this->search . '%')
                ->orWhere('dental', 'like', '%' . $this->search . '%')
                ->orWhere('diabetes', 'like', '%' . $this->search . '%')
                ->orWhere('hypertension', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.b-h-w.health-records', [
            'patient' => $patient,
            'records' => $records,
        ]);
    }
}
