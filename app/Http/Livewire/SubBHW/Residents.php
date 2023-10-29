<?php

namespace App\Http\Livewire\SubBHW;

use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use Livewire\Component;
use Livewire\WithPagination;

class Residents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    // variable for viewing family
    public $family_head;

    // tabs of category of the family
    public $tab = 1;

    public $search = "";

    protected $listeners = ['closeModal'];

    public $category = 0;

    public function updatingSearch()
    {
        $this->resetPage('allFamilyProfilePage');
    }

    public function famHead()
    {
        $this->tab = 1;
    }

    public function famWife()
    {
        $this->tab = 2;
    }

    public function famMembers()
    {
        $this->tab = 3;
    }

    public function addInfo()
    {
        $this->tab = 4;
    }

    public function resetInputs()
    {
        $this->tab = 1;
    }

    public function closeModal()
    {
        $this->reset('family_head', 'tab', 'category');
        $this->resetErrorBag();
    }

    public function viewFamily($id)
    {
        $this->family_head = FamilyHead::with('familyMembers')->with('wife')->find($id);
    }
    
    public function render()
    {
        $families = FamilyHead::where('is_approved', true)
            ->where('zone', auth()->guard('bhw')->user()->assigned_zone)
            ->where(function($query) {
                $query->where('fullname', 'like', '%' . $this->search . '%')
                ->orWhere('fname', 'like', '%' . $this->search . '%')
                ->orWhere('mname', 'like', '%' . $this->search . '%')
                ->orWhere('lname', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'allFamilyProfilePage');

        $heads = FamilyHead::where('is_approved', true)
            ->where('zone', auth()->guard('bhw')->user()->assigned_zone)
            ->count();

        $wives = Wife::with('familyHead')
            ->whereHas('familyHead', function($query) {
                $query->where('is_approved', true);
            })
            ->where('zone', auth()->guard('bhw')->user()->assigned_zone)
            ->count();

        $members = FamilyMember::with('familyHead')
            ->whereHas('familyHead', function($query) {
                $query->where('is_approved', true)
                ->where('zone', auth()->guard('bhw')->user()->assigned_zone);
            })
            ->count();

        $residents = $heads + $wives + $members;

        return view('livewire.sub-b-h-w.residents', [
            'families' => $families,
            'residents' => $residents,
            'total_family' => $heads,
        ]);
    }
}
