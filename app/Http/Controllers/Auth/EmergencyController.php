<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Emergency;
use App\Models\EmergencyRead;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class EmergencyController extends Controller
{
    //
    public function create()
    {
        $user = Auth::user();        
        $emergencies = Emergency::where('user_id',$user->id)
            ->join('emergency_reads',
                'emergencies.id',
                '=',
                'emergency_reads.emergency_id'
            )
            ->get();
        return view('emergency', [
            'emergencies'=>$emergencies,
        ]);
    }

    public function read(Request $request, $id)
    {
        //未読を既読に
        $user = Auth::user();
        $emergency_id = $id;
        $emergency_read = EmergencyRead::where('user_id',$user->id)
            ->where('emergency_id', $emergency_id)
            ->where('read', false)
            ->get();

        if(!empty($emergency_read)) 
        {
            $read = EmergencyRead::where('user_id', $user->id)
                ->where('emergency_id', $emergency_id)
                ->update([
                'user_id' => $user->id,
                'emergency_id' => $emergency_id,
                'read'=> true,
                ]);

            $emergencies = Emergency::where('user_id',$user->id)
            ->join('emergency_reads',
                'emergencies.id',
                '=',
                'emergency_reads.emergency_id'
            )
            ->get();
            return view('emergency', compact('emergencies'));
        }
        else{
            echo "既読処理できませんでした。";
            $emergencies = Emergency::where('user_id',$user->id)
            ->join('emergency_reads',
                'emergencies.id',
                '=',
                'emergency_reads.emergency_id'
            )
            ->get();
            return view('emergency', compact('emergencies'));
        }
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        return Emergency::whereHas('reads', function($query) use($user){
        //上のwhereHas()でリレーションシップ先で絞り込みをしたデータだけを取得する
            $query->where('user_id', $user->id)
                ->where('read', false);
        });
    }

    public function store(Request $request)
    {
        $users = User::select('id')->get();
        
        $request->validate([
            'title' => ['required', 'string','max:255'],
            'body' => ['required','string'],
        ]);
        $emergency_create = Emergency::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        foreach($users as $user){
            $read = new EmergencyRead();
            $read->user_id = $user->id;
            $read->emergency_id = $emergency_create->id;
            $read->save();
        }
        
        // 二重送信防止
        $request->session()->regenerateToken();
        
        return view('complete');
    }
    
    public function delete(Request $request,$id){
        $data = Emergency::where('id', $id);
        $data -> delete();

        $read = EmergencyRead::where('emergency_id', $id);
        $read -> delete();
        
        return redirect(route('create_emergency'));
    }
}
