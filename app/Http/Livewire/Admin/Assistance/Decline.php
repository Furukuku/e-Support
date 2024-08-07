<?php

namespace App\Http\Livewire\Admin\Assistance;

use App\Models\Assistance;
use Livewire\Component;
use Livewire\WithPagination;

class Decline extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    public $name, $zone, $need, $purpose, $date, $time, $reason;
    public $assistance_id;

    public function updatingSearch()
    {
        $this->resetPage('declinedAssistance');
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
            'reason'
        );
    }

    public function view(Assistance $assistance)
    {
        $this->assistance_id = $assistance->id;
        $this->name = $assistance->resident->fname . ' ' . $assistance->resident->lname;
        $this->zone = $assistance->resident->zone;
        $this->need = $assistance->need;
        $this->purpose = $assistance->purpose;
        $this->date = $assistance->date;
        $this->time = $assistance->time;
        $this->reason = $assistance->reason;
    }

    public function render()
    {
        $assistances = Assistance::with('resident')
        ->orWhere('status', 'Declined')
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
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate, ['*'], 'declinedAssistance');

        return view('livewire.admin.assistance.decline', ['assistances' => $assistances]);
    }
}
