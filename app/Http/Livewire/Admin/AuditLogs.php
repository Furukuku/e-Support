<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BrgyOfficial;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class AuditLogs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    public $old, $new, $event;

    public $properties;

    public $listeners = ['closeModal'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->reset('event', 'properties');
    }

    public function view(Activity $activity)
    {
        // dd($activity->properties['attributes']);
        $this->event = $activity->event;
        $this->properties = $activity->properties;
    }

    public function render()
    {
        $activities = Activity::where('log_name', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->orWhere('subject_id', 'like', '%' . $this->search . '%')
        ->orWhere('causer_type', 'like', '%' . $this->search . '%')
        ->orWhere('causer_id', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate($this->paginate);

        return view('livewire.admin.audit-logs', ['activities' => $activities]);
    }
}
