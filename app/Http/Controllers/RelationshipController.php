<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    
    public function index(Request $request, Relationship $relationship)
    {
    
    $relationships = Relationship::orderBy('id')->paginate(10);

       return view('relationships.index', compact('relationships'));
    }

   //=====================================================================================
    public function create()
    {
        return view('relationships.create-edit');
    }

   //======================================================================================
    public function store(Request $request, Relationship $relationship)
    {
        $relationship = Relationship::create($request->all());
        return redirect()->back();
    }

    //========================================================================================
    public function edit(Relationship $relationship)

    {   
        $relationship = Relationship::find($relationship->id);
       
      
       return view('specialities.create-edit', compact('relationship'));
    }

   //=========================================================================================
    public function update(Request $request, relationship $relationship)
    {
        //
    }

    //=========================================================================================
    public function destroy(Relationship $relationship)
    {
        $relationship = Relationship::find($relationship);
        $relationship->delete();
        return redirect()->back();
    }
}
