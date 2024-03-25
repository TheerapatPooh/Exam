<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolCRUDController extends Controller
{
    //Create Index
    public function index(){
        $data['schools'] = School::orderBy('id','asc')->paginate(5);
        return view('home',$data);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $school = new School;
        $school->name = $request->name;
        $school->address = $request->address;
        $school->save();
        return redirect()->route('schools.index');
    }

    public function edit(School $school){
        return view('edit',compact('school'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $school = School::find($id);
        $school->name = $request->name;
        $school->address = $request->address;
        $school->save();
        return redirect()->route('schools.index');
    }

    public function destroy(School $school) {
        $school->delete();
        return redirect()->route('schools.index');
    }
}
