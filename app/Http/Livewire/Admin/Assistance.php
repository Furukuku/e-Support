<?php

namespace App\Http\Livewire\Admin;

use App\Models\Assistance as ModelsAssistance;
use Livewire\Component;
use Livewire\WithPagination;

class Assistance extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $pending_paginate = 5;
    public $pending_paginate_values = [5, 10, 50, 100];

    public $search = '';
    public $pending_search = '';

    public $name, $zone, $need, $purpose, $date, $time, $status;
    public $assistance_id;

    public $reason, $other;

    public $tab = 0;

    public function updatingSearch()
    {
        $this->resetPage('assistance');
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(
            'name',
            'zone',
            'need',
            'purpose',
            'date',
            'time',
            'assistance_id',
            'status',
            'reason',
            'other'
        );
    }

    public function view(ModelsAssistance $assistance)
    {
        $this->assistance_id = $assistance->id;
        $this->name = $assistance->resident->fname . ' ' . $assistance->resident->lname;
        $this->zone = $assistance->resident->zone;
        $this->need = $assistance->need;
        $this->purpose = $assistance->purpose;
        $this->date = $assistance->date;
        $this->time = $assistance->time;
        $this->status = $assistance->status;
    }

    public function approve()
    {
        $assistance = ModelsAssistance::find($this->assistance_id);
        $assistance->status = 'Approved';
        $assistance->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Assistance approved successfully']);
    }

    public function declineConfirmation()
    {
        $this->dispatchBrowserEvent('decline-modal');
    }

    public function decline()
    {
        $assistance = ModelsAssistance::find($this->assistance_id);

        if($this->reason === 'Other'){
            $this->validate([
                'other' => ['required', 'string', 'max:150'],
            ]);

            $assistance->reason = $this->other;
        }else{
            $this->validate([
                'reason' => ['required', 'string', 'max:150'],
            ]);

            $assistance->reason = $this->reason;
        }

        $assistance->status = 'Declined';
        $assistance->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('successToast', ['success' => 'Assistance declined successfully']);
    }

    public function done()
    {
        $assistance = ModelsAssistance::find($this->assistance_id);
        $assistance->status = 'Done';
        $assistance->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Assistance updated successfully']);
    }

    public function render()
    {
        $assistances = ModelsAssistance::with('resident')
            ->orWhere('status', 'Approved')
            ->where(function($query) {
                $res_search = $this->search;
                $query->where('need', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('purpose', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('resident', function($query) use ($res_search){
                        $query->where('fname', 'LIKE', '%' . $res_search . '%')
                            ->orWhere('lname', 'LIKE', '%' . $res_search . '%')
                            ->orWhere('zone', 'LIKE', '%' . $res_search . '%');
                    });
            })
            ->orderBy('updated_at', 'asc')
            ->paginate($this->paginate, ['*'], 'assistance');


        $pending_assistances = ModelsAssistance::with('resident')
            ->where('status', 'Pending')
            ->where(function($query) {
                $pending_res_search = $this->pending_search;
                $query->where('need', 'LIKE', '%' . $this->pending_search . '%')
                    ->orWhere('purpose', 'LIKE', '%' . $this->pending_search . '%')
                    ->orWhereHas('resident', function($query) use ($pending_res_search){
                        $query->where('fname', 'LIKE', '%' . $pending_res_search . '%')
                            ->orWhere('lname', 'LIKE', '%' . $pending_res_search . '%')
                            ->orWhere('zone', 'LIKE', '%' . $pending_res_search . '%');
                    });
            })
            ->orderBy('created_at', 'asc')
            ->paginate($this->pending_paginate, ['*'], 'history');

        return view('livewire.admin.assistance', [
            'assistances' => $assistances,
            'pending_assistances' => $pending_assistances
        ]);
    }
}
