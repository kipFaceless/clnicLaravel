<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//
use Maatwebsite\Excel\Excel;

class UserController extends Controller
{
  
      
    public function index(Request $request)
    {
    //Query Scope - Global Vars in user Model
     $name       =  $request->get('name');
     $email      =  $request->get('email');  
     $address     =  $request->get('address'); 

    $users = user::orderBy('id','DESC')
                            ->name($name)
                            ->email($email)
                            ->address($address)
                            ->paginate(7);
    
       return view('users.index', compact('users'));
    }

   //=====================================================================================
    public function create()
    {
        return view('users.create-edit');
    }

   //======================================================================================
    public function store(Request $request, User $user)

    {
        
         $this->validate($request, [
             'name'=>'required|min:2|max:30', 
                            'email'=>'required|unique:users,email',
                            'type'=>'required',
                            'password' => 'required|min:6|max:30',
                            'tel', 
                            'address',
                            'avatar',
        ]);
        
        $user = $request->all();

        if ($user['password'] =!null) 
            $user['password'] = bcrypt($user['password']);
       
        //dd($user['password']);
       
        $user['password'] = ($user['password']);
         //dd($user);
        $user = User::create($user);
        if ($user) 
            return redirect()->route('users.index')
                            ->with('success', 'Usuário Criado com Sucesso!');
        
        return redirect()->back()->with('error', 'Falha ao criar novo Usuário!');
    }

    //======================================================================================
    public function show(User $user)
    {
       $show = User::find($user);
      // dd($show);

            return view('users.show', compact('show'));
    }

   //========================================================================================
    public function edit(User $user)

    {   
        $user = User::find($user->id);
       
        //return $user;
       return view('users.create-edit', compact('user'));
    }

   //=========================================================================================
    public function update(Request $request, User $user)
    {
     $user = User::findOrFail($user);
        $user = auth()->user();
       $this->validate($request, [
             'name'=>'required|string|min:2|max:30|unique:products,name', 
                            'type'=>'required',
                            'password'=>'required',
                            'tel', 
                            'address',
                            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
        ]);

        $update=$user->update($request->all());
        if ($update) {
            return redirect()
                            ->route('users.index')
                            ->with('success','Usuário alterado com Sucesso!');
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao alterar o usuário!');
        }
    }

    //=========================================================================================
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        
        $user->delete();
        return redirect()->back();
    }

     public function excel( $id)
    {
      
       Excel::create('From Laravel', function($excel) use($id){
             
        $excel->sheet('Excel sheet', function($sheet) use($id) {
            $user =User::find($id);
            $sheet->fromArray('$user');

        });

       })->export('xls');
    }
}
