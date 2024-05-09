<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class StudentController extends Controller
{
    public function get()
    {
        $search = "%".request('search')."%";
        $class = request('class');
        $students = Student::when($search,function($query,$search){
            $query->whereAny(['name','class','roll_no','father_name'],'like',$search)->latest()->simplePaginate(10)->withQueryString();
        })
        ->when($class,function($query,$class){
            $query->where('class',$class)->latest()->simplePaginate(10)->withQueryString();
        })
        ->latest()->simplePaginate(10)->withQueryString();
        return view('jobs.index', ["students" => $students]);
    }

    public function createPage()
    {
        return view('jobs.create');
    }

    public function createStudent(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:20',
            'roll_no' => 'required|numeric',
            'class' => 'required|string|max:20',
            'dob' => 'required',
            'nrc' => 'required|string',
            'father_name' => 'required|string',
            'address' => 'required|string|max:100',
            'ph' => 'required|string|max:100',
            'ph2' => 'nullable|string|max:100',
            'ph3' => 'nullable|string|max:100',
        ]);
        Student::create($data);
        return redirect('/user/students');
    }

    public function show($id)
    {
        $student = Student::query()->find($id);
        return view('jobs.show', ['student' => $student]);
    }

    public function editPage($id)
    {
        $student = Student::findOrFail($id);
        return view('jobs.edit', ['student' => $student]);
    }

    public function delete($id)
    {
        $job = Student::findOrFail($id)->delete();
        return redirect('/user/students');
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:20',
            'roll_no' => 'required|numeric',
            'class' => 'required|string|max:20',
            'dob' => 'required',
            'nrc' => 'required|string',
            'father_name' => 'required|string',
            'address' => 'required|string|max:100',
            'ph' => 'required|string|max:100',
            'ph2' => 'nullable|string|max:100',
            'ph3' => 'nullable|string|max:100',
        ]);
        Student::findOrFail($id)->update($data);
        return redirect('user/students/' . $id);
    }

    public function password(Request $request)
    {
        return view('auth.pass-change');
    }

    public function updatePass(Request $request)
    {
        $data = $request->validate([
            'old_password' => ['required','string','min:8','max:16'],
            'new_password' => ['required','string','min:8','max:16',"regex:/[A-Z]/",
            "regex:/[a-z]/","regex:/[0-9]/","regex:/[!@#$%&*()<>]/",],
        ]);

        $db_password = auth()->guard('web')->user()->password;
        $bool = Hash::check($request->old_password,$db_password);
        if(!$bool)
        {
            return back()->withErrors(['wrong_pass' => 'Your old password is invalid.']);
        }
        User::find(auth()->guard('web')->id())->update([
            'password' => Hash::make($request->new_password)
        ]);
        auth()->guard('web')->logout();
        return redirect('/');
        
    }

    public function members()
    {
        $limit = request('limit');
        $search ="%".request('search')."%";
        $members = User::
        when($search,function($query,$search){
            $query->where('name','like',$search)->get()->toArray();
        })
        ->where('is_admin',true)->take($limit)->get()->toArray();
        return response()->json(['members' => $members]);
    }
    public function member($id)
    {
        $user = User::where('is_admin',true)->find($id);
        return $user  !== null ? response()->json(['member' => $user])
        :response()->json(['message' => 'No user found.'],400);
    }
}
