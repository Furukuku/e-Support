<?php

namespace App\Http\Livewire\Admin;

use App\Models\FamilyHead;
use App\Models\User;
use App\Models\Wife;
use Livewire\Component;

class Dashboard extends Component
{

    public $population = [];
    public $pwd = [];
    public $soloParent = [];
    public $senior = [];
    public $pregnant = [];
    public $familyHeads = [];

    public $employStatus = [];

    public function mount()
    {
        for($zone = 1; $zone <= 6; $zone++){
            $family_heads = FamilyHead::with('familyMembers')
                ->where('zone', $zone)
                ->get();
                
            $members = 0;
            if($family_heads->isNotEmpty()){
                foreach($family_heads as $head){
                    if($head->familyMembers){
                        $members = $members + $head->familyMembers->count();
                    }
                }
            }
            $wives = Wife::where('zone', $zone)->count();

            $total_members = $family_heads->count() + $members + $wives;

            array_push($this->population, $total_members);

            $pwd = $family_heads->sum('pwd');
            array_push($this->pwd, $pwd);

            $solo_parent = $family_heads->sum('solo_parent');
            array_push($this->soloParent, $solo_parent);

            $senior = $family_heads->sum('senior_citizen');
            array_push($this->senior, $senior);

            $pregnant = $family_heads->sum('pregnant');
            array_push($this->pregnant, $pregnant);

            $heads = $family_heads->count();
            array_push($this->familyHeads, $heads);
        }

        $employed = User::where('is_employed', true)->count();
        $unemployed = User::where('is_employed', false)->count();

        array_push($this->employStatus, $employed, $unemployed);
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
