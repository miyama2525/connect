<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Child;
use App\Models\Guardian;
use App\Models\GradeCategory;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredOtherController extends Controller
{
    public function create(): View
    {
        $grade_category = new GradeCategory;
        $grade_categories = $grade_category->getLists();
        return view('registered_other',['grade_categories'=>$grade_categories]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'guardian_name'=>['required','string'],
            'tel'=>['required','string'],
            'workplace'=>['nullable','string'],
            'relationship'=>['required','string'],
            'child_name'=>['required','string'],
            'birthday'=>['required','string'],
            'grade_id'=>['required','string'],
        ]);

        $child = Child::create([
            'child_name' => $request->child_name,
            'birthday' => $request->birthday,
            'grade_id'=> $request->grade_id,
            'user_id'=> $user->id,
        ]);

        $guardian = Guardian::create([
            'guardian_name' => $request->child_name,
            'tel' => $request->tel,
            'workplace'=> $request->workplace,
            'relationship'=> $request->relationship,
            'user_id'=> $user->id,
        ]);

        return view('complete');
    }
    public function create_guardian(Request $request)
    {
        $user = Auth::user();
        //保護者情報更新
        $guardian = Guardian::where('user_id',$user->id);
        $guardians = $guardian->get();

        return view('edit_guardian',['guardians' => $guardians]);
    }

    public function edit_guardian(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'guardian_name'=>['required','string'],
            'tel'=>['required','string'],
            'workplace'=>['nullable','string'],
            'relationship'=>['required','string'],
        ]);

        $guardian = Guardian::create([
            'guardian_name' => $request->guardian_name,
            'tel' => $request->tel,
            'workplace'=> $request->workplace,
            'relationship'=> $request->relationship,
            'user_id'=> $user->id,
        ]);

        return view('complete');
    }

    public function create_child(Request $request)
    {
        $user = Auth::user();
        //保護者情報更新
        $child = Child::where('user_id',$user->id);
        $children = $child->get();

        $grade_category = new GradeCategory;
        $grade_categories = $grade_category->getLists();

        return view('edit_child',['children' => $children,'grade_categories' => $grade_categories]);
    }

    public function edit_child(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'child_name'=>['required','string'],
            'birthday'=>['required','string'],
            'grade_id'=>['required','string'],
        ]);

        $child = Child::create([
            'child_name' => $request->child_name,
            'birthday' => $request->birthday,
            'grade_id'=> $request->grade_id,
            'user_id'=> $user->id,
        ]);

        return view('complete');
    }

    public function search_registrant(Request $request)
    {
        $select = $request->child_sort;
        
        if($select == 'grade_asc'){
            $children = Child::get()->sortBy('grade_id');
            return view('registrant',['children'=>$children]);
        }elseif($select == 'grade_desc') {
            $children = Child::get()->sortByDesc('grade_id');
            return view('registrant',['children'=>$children]);
        }else {
            $children = Child::get()->sortBy('user_id');
            return view('registrant',['children'=>$children]);
        }
    }
    public function search_guardian($user_id){
        $guardian = Guardian::where('user_id',$user_id);
        $guardians = $guardian->get();
        return view('guardian_information',['guardians'=>$guardians]);
    }
}