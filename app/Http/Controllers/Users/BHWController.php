<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\FamilyHead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BHWController extends Controller
{
    public function generateReportResidents()
    {
        $heads = FamilyHead::with(['wife', 'familyMembers'])
            ->where('is_approved', true)
            ->get();
        
        $ageCounts = [];

        // Initialize the ageCounts array with counts set to 0 for ages from 0 to 80
        for ($i = 0; $i <= 80; $i++) {
            $ageCounts[$i] = [
                'male' => 0,
                'female' => 0,
                'total' => 0,
            ];
        }

        foreach ($heads as $head) {
            $head_age = Carbon::parse($head->bday)->age;
            
            // Increment the count for the corresponding age
            if ($head_age >= 0 && $head_age < 80) {
                $ageCounts[$head_age]['total']++;
                if($head->sex === 'Male'){
                    $ageCounts[$head_age]['male']++;
                }else if($head->sex === 'Female'){
                    $ageCounts[$head_age]['female']++;
                }
            }else if($head_age >= 80){
                $ageCounts[80]['total']++;
                if($head->sex === 'Male'){
                    $ageCounts[80]['male']++;
                }else if($head->sex === 'Female'){
                    $ageCounts[80]['female']++;
                }
            }
            
            if($head->wife){
                $wife_age = Carbon::parse($head->wife->bday)->age;
                if ($wife_age >= 0 && $wife_age < 80) {
                    $ageCounts[$wife_age]['total']++;
                    $ageCounts[$wife_age]['female']++;
                }else if($wife_age >= 80){
                    $ageCounts[80]['total']++;
                    $ageCounts[80]['female']++;
                }
            }

            if($head->familyMembers && count($head->familyMembers) > 0){
                foreach($head->familyMembers as $member){
                    $member_age = Carbon::parse($member->bday)->age;

                    if ($member_age >= 0 && $member_age < 80) {
                        $ageCounts[$member_age]['total']++;
                        if($member->sex === 'Male'){
                            $ageCounts[$member_age]['male']++;
                        }else if($member->sex === 'Female'){
                            $ageCounts[$member_age]['female']++;
                        }
                    }else if($member_age >= 80){
                        $ageCounts[80]['total']++;
                        if($member->sex === 'Male'){
                            $ageCounts[80]['male']++;
                        }else if($member->sex === 'Female'){
                            $ageCounts[80]['female']++;
                        }
                    }
                }
            }
        }

        $minor_male = 0;
        $minor_female = 0;
        $minor_total = 0;
        for($i = 0; $i < 18; $i++){
            $minor_male += $ageCounts[$i]['male'];
            $minor_female += $ageCounts[$i]['female'];
            $minor_total += $ageCounts[$i]['total'];
        }

        $adult_male = 0;
        $adult_female = 0;
        $adult_total = 0;
        for($i = 18; $i < 80; $i++){
            $adult_male += $ageCounts[$i]['male'];
            $adult_female += $ageCounts[$i]['female'];
            $adult_total += $ageCounts[$i]['total'];
        }

        
        $senior_male = $ageCounts[80]['male'];
        $senior_female = $ageCounts[80]['female'];
        $senior_total = $ageCounts[80]['total'];

        $total_fam = $heads->count();

        $households = FamilyHead::where('is_approved', true)
            ->select('house_no', DB::raw('count(*) as total'))
            ->groupBy('house_no')
            ->get();

        $total_households = $households->count();

        return view('bhw.bhw-generate-report-residents', [
            'ageCounts' => $ageCounts,
            'minor_male' => $minor_male,
            'minor_female' => $minor_female,
            'minor_total' => $minor_total,
            'adult_male' => $adult_male,
            'adult_female' => $adult_female,
            'adult_total' => $adult_total,
            'senior_male' => $senior_male,
            'senior_female' => $senior_female,
            'senior_total' => $senior_total,
            'total_fam' => $total_fam,
            'total_households' => $total_households,
        ]);
    }

    public function residentAccounts()
    {
        auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->markAsRead();

        if(auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->count() > 0){
            return redirect()->route('bhw.manage.resident-accounts');
        }

        return view('bhw.bhw-resident-accounts');
    }

    public function familyProfiles()
    {
        auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\FamilyNotification')->markAsRead();

        if(auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\FamilyNotification')->count() > 0){
            return redirect()->route('bhw.family-profiles');
        }

        return view('bhw.bhw-family-profiles');
    }
}
