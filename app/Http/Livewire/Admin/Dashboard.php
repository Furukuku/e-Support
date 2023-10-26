<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Wife;
use App\Models\Report;
use Livewire\Component;
use App\Models\Business;
use App\Models\FamilyHead;
use Illuminate\Support\Facades\DB;

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
        $businessUsers = Business::count();

        $va = [];
        $cd = [];
        $ig = [];
        $ca = [];
        $cc = [];
        $psc = [];
        $lnkd = [];
        $eh = [];
        $ip = [];
        $dr = [];
        $sc = [];
        $cp = [];
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

            $ca_temp = Report::where('report_name', 'Child Abuse')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cc_temp = Report::where('report_name', 'Community Cleanliness')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $psc_temp = Report::where('report_name', 'Public Safety Concern')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $lnkd_temp = Report::where('report_name', 'Late-Night Karaoke Disturbance')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $eh_temp = Report::where('report_name', 'Environmental Hazard')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $ip_temp = Report::where('report_name', 'Infrastructure Problems')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $dr_temp = Report::where('report_name', 'Drug Racing')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $sc_temp = Report::where('report_name', 'Stoning of Car')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $cp_temp = Report::where('report_name', 'Complaint')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            $others_temp = Report::where('report_name', '!=','Vehicle Accident')
                ->where('report_name', '!=', 'Calamity and Disaster')
                ->where('report_name', '!=', 'Illegal Gambling')
                ->where('report_name', '!=', 'Child Abuse')
                ->where('report_name', '!=', 'Community Cleanliness')
                ->where('report_name', '!=', 'Public Safety Concern')
                ->where('report_name', '!=', 'Late-Night Karaoke Disturbance')
                ->where('report_name', '!=', 'Environmental Hazard')
                ->where('report_name', '!=', 'Infrastructure Problems')
                ->where('report_name', '!=', 'Drug Racing')
                ->where('report_name', '!=', 'Stoning of Car')
                ->where('report_name', '!=', 'Complaint')
                ->where('zone', $i)
                ->where('is_exist', true)
                ->count();

            array_push($va, $va_temp);
            array_push($cd, $cd_temp);
            array_push($ig, $ig_temp);
            array_push($ca, $ca_temp);
            array_push($cc, $cc_temp);
            array_push($psc, $psc_temp);
            array_push($lnkd, $lnkd_temp);
            array_push($eh, $eh_temp);
            array_push($ip, $ip_temp);
            array_push($dr, $dr_temp);
            array_push($sc, $sc_temp);
            array_push($cp, $cp_temp);
            array_push($others, $others_temp);
        }

        return view('livewire.admin.dashboard', [
            'businessUsers' => $businessUsers,
            'va' => $va,
            'cd' => $cd,
            'ig' => $ig,
            'ca' => $ca,
            'cc' => $cc,
            'psc' => $psc,
            'lnkd' => $lnkd,
            'eh' => $eh,
            'ip' => $ip,
            'dr' => $dr,
            'sc' => $sc,
            'cp' => $cp,
            'others' => $others,
        ]);
    }
}
