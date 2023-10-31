<?php

namespace App\Http\Livewire\BHW;

use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\User;
use App\Models\Wife;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $final_population = [];
        $final_pwd = [];
        $final_soloParent = [];
        $final_senior = [];
        $final_pregnant = [];
        $male = [];
        $female = [];

        for($zone = 1; $zone <= 6; $zone++){
            $family_heads = FamilyHead::with('familyMembers')
                ->where('is_approved', true)
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
            $wives = Wife::with('familyHead')
                ->where('zone', $zone)
                ->whereHas('familyHead', function($query) {
                    $query->where('is_approved', true);
                })
                ->count();

            $total_members = $family_heads->count() + $members + $wives;

            array_push($final_population, $total_members);

            $pwd = $family_heads->sum('pwd');
            array_push($final_pwd, $pwd);

            $solo_parent = $family_heads->sum('solo_parent');
            array_push($final_soloParent, $solo_parent);

            $senior = $family_heads->sum('senior_citizen');
            array_push($final_senior, $senior);

            $pregnant = $family_heads->sum('pregnant');
            array_push($final_pregnant, $pregnant);



            $male_heads = FamilyHead::where('is_approved', true)
                ->where('sex', 'Male')
                ->where('zone', $zone)
                ->count();

            $male_members = FamilyMember::with('familyHead')
                ->where('sex', 'Male')
                ->whereHas('familyHead', function($query) use ($zone) {
                    $query->where('is_approved', true)
                        ->where('zone', $zone);
                })
                ->count();
                
            $total_male = $male_heads + $male_members;
            array_push($male, $total_male);

            $female_heads = FamilyHead::where('is_approved', true)
                ->where('sex', 'Female')
                ->where('zone', $zone)
                ->count();

            $female_members = FamilyMember::with('familyHead')
                ->where('sex', 'Female')
                ->whereHas('familyHead', function($query) use ($zone) {
                    $query->where('is_approved', true)
                        ->where('zone', $zone);
                })
                ->count();
            
            $females = Wife::with('familyHead')
                ->where('zone', $zone)
                ->whereHas('familyHead', function($query) {
                    $query->where('is_approved', true);
                })
                ->count();

            $total_female = $female_heads + $female_members + $females;
            array_push($female, $total_female);
        }

        $total_house_holds = FamilyHead::where('is_approved', true)
            ->select('house_no', DB::raw('count(*) as total'))
            ->groupBy('house_no')
            ->get();

        $total_families = FamilyHead::where('is_approved', true)->count();

        $beneficiaries = [array_sum($final_pwd), array_sum($final_soloParent), array_sum($final_senior), array_sum($final_pregnant)];

        $sex = [array_sum($male), array_sum($female)];

        return view('livewire.b-h-w.dashboard', [
            'population' => $final_population,
            'pwd' => $final_pwd,
            'soloParent' => $final_soloParent,
            'senior' => $final_senior,
            'pregnant' => $final_pregnant,
            'male' => $male,
            'female' => $female,
            'beneficiaries' => $beneficiaries,
            'sex' => $sex,
            'total_house_holds' => $total_house_holds->count(),
            'total_families' => $total_families,
        ]);
    }
}
