<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Absence;
use App\Models\Child;
use App\Models\Reason;
use App\Calendar\CalendarView;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    //
    public function create()
    {
        $reason = new Reason;
        $reasons = $reason->getLists();

        $user = Auth::user();
        $absences = Absence::where('user_id', $user->id )
            ->join('reasons',
                'reasons.id',
                '=',
                'absences.reason_id'
            )
            ->get();
        $now = now()->format('Y-m-d');
        $query = DB::table('absences');

        $today_ab = DB::table('absences');
        $today_ab->where('absences.ab_date', $now);
        $today_ab->join('children',
                'children.user_id',
                '=',
                'absences.user_id'
        );
        $today_ab->join('reasons',
                'reasons.id',
                '=',
                'absences.reason_id'
        );
        $today_ab = $today_ab->get();    

        return view('absence',[
            'today_ab' => $today_ab,
            'reasons' => $reasons,
            'absences' => $absences
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
 
        $request->validate([
            'reason_id' => ['required','string'],
            'other'=>['nullable','string','required_without_all:reason_id'],
            'ab_date'=>['required', 'string'],
        ]);

        $absence = Absence::create([
            'reason_id' => $request->reason_id,
            'other' => $request->other,
            'ab_date'=> $request->ab_date,
            'user_id'=> $user->id,
        ]);
        
        return view('complete');
    }
    public function search(Request $request)
    {
        $where_date = $request->where_date;

        $day = DB::table('absences');
        $day->where('absences.ab_date', $where_date);
        $day->join('children',
                'children.user_id',
                '=',
                'absences.user_id'
        );
        $day->join('reasons',
                'reasons.id',
                '=',
                'absences.reason_id'
        );
        $days = $day->get();

        return view('absence', [
            'days' => $days,
        ]);
    }

    public function delete(Request $request,$id){
        $data = Absence::where('id', $id);
        $data -> delete();
        return redirect(route('create_absence'));
    }

}

