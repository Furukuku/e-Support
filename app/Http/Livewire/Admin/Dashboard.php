<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Wife;
use App\Models\Report;
use Livewire\Component;
use App\Models\Business;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $checked = 'all';

    public function allData()
    {
        $va = [];
        $cd = [];
        $ig = [];
        $dr = [];
        $sc = [];
        $tr = [];
        $lnkd = [];
        $others = [];

        for($i = 1; $i <= 6; $i++){
            $va_temp = Report::where('report_name', 'Vehicle Accident')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cd_temp = Report::where('report_name', 'Calamity and Disaster')    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $ig_temp = Report::where('report_name', 'Illegal Gambling')    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $dr_temp = Report::where('report_name', 'Drag Racing')    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $sc_temp = Report::where('report_name', 'Stoning of Car')    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $tr_temp = Report::where('report_name', 'Trouble')    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $lnkd_temp = Report::where('report_name', 'Late-Night Karaoke Disturbance')    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $others_temp = Report::where('report_name', '!=','Vehicle Accident')
                ->where('report_name', '!=', 'Calamity and Disaster')
                ->where('report_name', '!=', 'Illegal Gambling')
                ->where('report_name', '!=', 'Drag Racing')
                ->where('report_name', '!=', 'Stoning of Car')
                ->where('report_name', '!=', 'Trouble')
                ->where('report_name', '!=', 'Late-Night Karaoke Disturbance')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            array_push($va, $va_temp);
            array_push($cd, $cd_temp);
            array_push($ig, $ig_temp);
            array_push($dr, $dr_temp);
            array_push($sc, $sc_temp);
            array_push($tr, $tr_temp);
            array_push($lnkd, $lnkd_temp);
            array_push($others, $others_temp);
        }

        $this->dispatchBrowserEvent('refresh-report', [
            'reports' => [$va, $cd, $ig, $dr, $sc, $tr, $lnkd, $others]
        ]);

        $this->checked = 'all';
    }

    public function thisYear()
    {
        $currentYear = now()->year;
        $va = [];
        $cd = [];
        $ig = [];
        $dr = [];
        $sc = [];
        $tr = [];
        $lnkd = [];
        $others = [];

        for($i = 1; $i <= 6; $i++){
            $va_temp = Report::where('report_name', 'Vehicle Accident')
                ->whereYear('created_at', $currentYear)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cd_temp = Report::where('report_name', 'Calamity and Disaster')
                ->whereYear('created_at', $currentYear)    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $ig_temp = Report::where('report_name', 'Illegal Gambling')
                ->whereYear('created_at', $currentYear)    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $dr_temp = Report::where('report_name', 'Drag Racing')
                ->whereYear('created_at', $currentYear)    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $sc_temp = Report::where('report_name', 'Stoning of Car')
                ->whereYear('created_at', $currentYear)    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $tr_temp = Report::where('report_name', 'Trouble')
                ->whereYear('created_at', $currentYear)    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $lnkd_temp = Report::where('report_name', 'Late-Night Karaoke Disturbance')
                ->whereYear('created_at', $currentYear)    
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $others_temp = Report::where('report_name', '!=','Vehicle Accident')
                ->where('report_name', '!=', 'Calamity and Disaster')
                ->where('report_name', '!=', 'Illegal Gambling')
                ->where('report_name', '!=', 'Drag Racing')
                ->where('report_name', '!=', 'Stoning of Car')
                ->where('report_name', '!=', 'Trouble')
                ->where('report_name', '!=', 'Late-Night Karaoke Disturbance')
                ->whereYear('created_at', $currentYear)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            array_push($va, $va_temp);
            array_push($cd, $cd_temp);
            array_push($ig, $ig_temp);
            array_push($dr, $dr_temp);
            array_push($sc, $sc_temp);
            array_push($tr, $tr_temp);
            array_push($lnkd, $lnkd_temp);
            array_push($others, $others_temp);
        }

        $this->dispatchBrowserEvent('refresh-report', [
            'reports' => [$va, $cd, $ig, $dr, $sc, $tr, $lnkd, $others]
        ]);

        $this->checked = 'year';
    }

    public function thisMonth()
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $va = [];
        $cd = [];
        $ig = [];
        $dr = [];
        $sc = [];
        $tr = [];
        $lnkd = [];
        $others = [];

        for($i = 1; $i <= 6; $i++){
            $va_temp = Report::where('report_name', 'Vehicle Accident')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cd_temp = Report::where('report_name', 'Calamity and Disaster')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $ig_temp = Report::where('report_name', 'Illegal Gambling')
                ->whereYear('created_at', $currentYear)  
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $dr_temp = Report::where('report_name', 'Drag Racing')
                ->whereYear('created_at', $currentYear)  
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $sc_temp = Report::where('report_name', 'Stoning of Car')
                ->whereYear('created_at', $currentYear)    
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $tr_temp = Report::where('report_name', 'Trouble')
                ->whereYear('created_at', $currentYear)    
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $lnkd_temp = Report::where('report_name', 'Late-Night Karaoke Disturbance')
                ->whereYear('created_at', $currentYear)    
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $others_temp = Report::where('report_name', '!=','Vehicle Accident')
                ->where('report_name', '!=', 'Calamity and Disaster')
                ->where('report_name', '!=', 'Illegal Gambling')
                ->where('report_name', '!=', 'Drag Racing')
                ->where('report_name', '!=', 'Stoning of Car')
                ->where('report_name', '!=', 'Trouble')
                ->where('report_name', '!=', 'Late-Night Karaoke Disturbance')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            array_push($va, $va_temp);
            array_push($cd, $cd_temp);
            array_push($ig, $ig_temp);
            array_push($dr, $dr_temp);
            array_push($sc, $sc_temp);
            array_push($tr, $tr_temp);
            array_push($lnkd, $lnkd_temp);
            array_push($others, $others_temp);
        }

        $this->dispatchBrowserEvent('refresh-report', [
            'reports' => [$va, $cd, $ig, $dr, $sc, $tr, $lnkd, $others]
        ]);

        $this->checked = 'month';
    }

    public function thisWeek()
    {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        $va = [];
        $cd = [];
        $ig = [];
        $dr = [];
        $sc = [];
        $tr = [];
        $lnkd = [];
        $others = [];

        for($i = 1; $i <= 6; $i++){
            $va_temp = Report::where('report_name', 'Vehicle Accident')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cd_temp = Report::where('report_name', 'Calamity and Disaster')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $ig_temp = Report::where('report_name', 'Illegal Gambling')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $dr_temp = Report::where('report_name', 'Drag Racing')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $sc_temp = Report::where('report_name', 'Stoning of Car')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $tr_temp = Report::where('report_name', 'Trouble')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $lnkd_temp = Report::where('report_name', 'Late-Night Karaoke Disturbance')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $others_temp = Report::where('report_name', '!=','Vehicle Accident')
                ->where('report_name', '!=', 'Calamity and Disaster')
                ->where('report_name', '!=', 'Illegal Gambling')
                ->where('report_name', '!=', 'Drag Racing')
                ->where('report_name', '!=', 'Stoning of Car')
                ->where('report_name', '!=', 'Trouble')
                ->where('report_name', '!=', 'Late-Night Karaoke Disturbance')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            array_push($va, $va_temp);
            array_push($cd, $cd_temp);
            array_push($ig, $ig_temp);
            array_push($dr, $dr_temp);
            array_push($sc, $sc_temp);
            array_push($tr, $tr_temp);
            array_push($lnkd, $lnkd_temp);
            array_push($others, $others_temp);
        }

        $this->dispatchBrowserEvent('refresh-report', [
            'reports' => [$va, $cd, $ig, $dr, $sc, $tr, $lnkd, $others]
        ]);

        $this->checked = 'week';
    }

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


        $employStatus = [];
        $employed = User::where('is_employed', true)->count();
        $unemployed = User::where('is_employed', false)->count();

        array_push($employStatus, $employed, $unemployed);


        $businessUsers = Business::count();

        $va = [];
        $cd = [];
        $ig = [];
        $dr = [];
        $sc = [];
        $tr = [];
        $lnkd = [];
        $others = [];

        for($i = 1; $i <= 6; $i++){
            $va_temp = Report::where('report_name', 'Vehicle Accident')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cd_temp = Report::where('report_name', 'Calamity and Disaster')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $ig_temp = Report::where('report_name', 'Illegal Gambling')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $dr_temp = Report::where('report_name', 'Drag Racing')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $sc_temp = Report::where('report_name', 'Stoning of Car')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $tr_temp = Report::where('report_name', 'Trouble')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $lnkd_temp = Report::where('report_name', 'Late-Night Karaoke Disturbance')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $others_temp = Report::where('report_name', '!=','Vehicle Accident')
                ->where('report_name', '!=', 'Calamity and Disaster')
                ->where('report_name', '!=', 'Illegal Gambling')
                ->where('report_name', '!=', 'Drag Racing')
                ->where('report_name', '!=', 'Stoning of Car')
                ->where('report_name', '!=', 'Trouble')
                ->where('report_name', '!=', 'Late-Night Karaoke Disturbance')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            array_push($va, $va_temp);
            array_push($cd, $cd_temp);
            array_push($ig, $ig_temp);
            array_push($dr, $dr_temp);
            array_push($sc, $sc_temp);
            array_push($tr, $tr_temp);
            array_push($lnkd, $lnkd_temp);
            array_push($others, $others_temp);
        }

        return view('livewire.admin.dashboard', [
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
            'employStatus' => $employStatus,
            'businessUsers' => $businessUsers,
            'va' => $va,
            'cd' => $cd,
            'ig' => $ig,
            'dr' => $dr,
            'sc' => $sc,
            'tr' => $tr,
            'lnkd' => $lnkd,
            'others' => $others,
        ]);
    }
}
