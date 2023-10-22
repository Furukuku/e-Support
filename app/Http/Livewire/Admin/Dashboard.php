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

        // $interval = 30; // Interval in minutes

        // $count = Report::select(DB::raw('COUNT(*) as count'))
        //     ->groupBy(DB::raw('FLOOR(UNIX_TIMESTAMP(created_at) / (60 * :interval))'))
        //     ->setBindings(['interval' => $interval])
        //     ->get();

        // $complaints = [];
        // $sample = Report::select('zone', 'report_name', DB::raw('COUNT(*) as count'), 'created_at')->groupBy('zone', 'report_name', DB::raw('FLOOR(UNIX_TIMESTAMP(created_at) / (60 * :interval))'))->setBindings(['interval' => $interval])->get();

        // $sample = Report::select('zone', 'report_name', DB::raw('FLOOR(UNIX_TIMESTAMP(created_at) / (60 * :interval)) as time_interval'), DB::raw('COUNT(*) as count'))->groupBy('zone', 'report_name', 'created_at')->setBindings(['interval' => $interval])->get();


        // foreach($sample as $sam){
        //     $x = $sam->count . ' ' . $sam->report_name . ' on zone ' . $sam->zone . ' at ' . $sam->time_interval;
        //     array_push($complaints, $x);
        // }

        // dd($complaints);
        // $reports = Report::select('zone', 'report_name')
        //     ->selectRaw('COUNT(*) as count')
        //     ->groupBy('zone', 'report_name')
        //     ->havingRaw('COUNT(*) = 1') 
        //     ->orWhere(function ($query) {
        //         $query->selectRaw('COUNT(*)')
        //             ->from('reports as sub')
        //             ->whereRaw('reports.zone = sub.zone')
        //             ->whereRaw('reports.report_name = sub.report_name')
        //             ->whereRaw('TIMESTAMPDIFF(MINUTE, reports.created_at, sub.created_at) <= 30')
        //             ->whereRaw('TIMESTAMPDIFF(MINUTE, reports.created_at, sub.created_at) >= -30');
        //     })
        //     ->get();

        // $reports = DB::table('reports')
        //     ->select('zone', 'report_name')
        //     ->selectRaw('COUNT(*) as count')
        //     ->groupBy('zone', 'report_name')
        //     ->havingRaw('COUNT(*) = 1')
        //     ->orWhere(function ($query) {
        //         $query->selectRaw('COUNT(*)')
        //             ->from('reports as sub')
        //             ->whereRaw('reports.zone = sub.zone')
        //             ->whereRaw('reports.report_name = sub.report_name')
        //             ->whereRaw('TIMESTAMPDIFF(MINUTE, reports.created_at, sub.created_at) <= 30')
        //             ->whereRaw('TIMESTAMPDIFF(MINUTE, reports.created_at, sub.created_at) >= -30');
        //     })
        //     ->get();

        // dd($reports);
        // $reports = Report::select('zone', 'report_name')
        //     ->selectRaw('COUNT(*) as count')
        //     ->groupBy('zone', 'report_name')
        //     ->havingRaw('COUNT(*) = 1') 
        //     ->orWhere(function ($query) {
        //         $query->selectRaw('COUNT(*)')
        //             ->from('reports as sub')
        //             ->whereRaw('reports.zone = sub.zone')
        //             ->whereRaw('reports.report_name = sub.report_name')
        //             ->whereRaw('TIMESTAMPDIFF(MINUTE, reports.created_at, sub.created_at) <= 30')
        //             ->whereRaw('TIMESTAMPDIFF(MINUTE, reports.created_at, sub.created_at) >= -30');
        //     })
        //     ->get();

        // dd($reports);

        return view('livewire.admin.dashboard', [
            'businessUsers' => $businessUsers
        ]);
    }
}
