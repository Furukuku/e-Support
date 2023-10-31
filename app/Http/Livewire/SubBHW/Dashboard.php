<?php

namespace App\Http\Livewire\SubBHW;

use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $assigned_purok = auth()->guard('bhw')->user()->assigned_zone;

        $family_heads = FamilyHead::with('familyMembers')
            ->where('is_approved', true)
            ->where('zone', $assigned_purok)
            ->get();
            
        $members = 0;
        if($family_heads->isNotEmpty()){
            foreach($family_heads as $head){
                if($head->familyMembers){
                    $members = $members + $head->familyMembers->count();
                }
            }
        }
        $wives = Wife::with('familyHead')
            ->where('zone', $assigned_purok)
            ->whereHas('familyHead', function($query) {
                $query->where('is_approved', true);
            })
            ->count();

        $population = $family_heads->count() + $members + $wives;

        $pwd = $family_heads->sum('pwd');

        $solo_parent = $family_heads->sum('solo_parent');

        $senior = $family_heads->sum('senior_citizen');

        $pregnant = $family_heads->sum('pregnant');



        $male_heads = FamilyHead::where('is_approved', true)
            ->where('sex', 'Male')
            ->where('zone', $assigned_purok)
            ->count();

        $male_members = FamilyMember::with('familyHead')
            ->where('sex', 'Male')
            ->whereHas('familyHead', function($query) use ($assigned_purok) {
                $query->where('is_approved', true)
                    ->where('zone', $assigned_purok);
            })
            ->count();
            
        $total_male = $male_heads + $male_members;

        $female_heads = FamilyHead::where('is_approved', true)
            ->where('sex', 'Female')
            ->where('zone', $assigned_purok)
            ->count();

        $female_members = FamilyMember::with('familyHead')
            ->where('sex', 'Female')
            ->whereHas('familyHead', function($query) use ($assigned_purok) {
                $query->where('is_approved', true)
                    ->where('zone', $assigned_purok);
            })
            ->count();
        
        $females = Wife::with('familyHead')
            ->where('zone', $assigned_purok)
            ->whereHas('familyHead', function($query) {
                $query->where('is_approved', true);
            })
            ->count();

        $total_female = $female_heads + $female_members + $females;

        $total_house_holds = FamilyHead::where('is_approved', true)
            ->where('zone', $assigned_purok)
            ->select('house_no', DB::raw('count(*) as total'))
            ->groupBy('house_no')
            ->get();

        $total_families = FamilyHead::where('is_approved', true)
            ->where('zone', $assigned_purok)
            ->count();

        $beneficiaries = [$pwd, $solo_parent, $senior, $pregnant];
        $sex = [$total_male, $total_female];

        return view('livewire.sub-b-h-w.dashboard', [
            'population' => $population,
            'beneficiaries' => $beneficiaries,
            'sex' => $sex,
            'total_house_holds' => $total_house_holds->count(),
            'total_families' => $total_families,
        ]);
    }
}
