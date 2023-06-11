<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function userList(){
        return view('panel.user.index');
    }

    public function create(){
        return view('panel.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('users.list')->with('success', 'User Created !!');
    }

    public function getData(Request $request){
        $users = User::all();
        $draw = $request->get('draw');

        $totalRecords = count($users);
        $totalRecordwithFilter = count($users);
        return response()->json([
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $users
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('panel.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->save();

        return redirect()->route('users.list')->with('success', 'User Updated !!');
    }

    public function delete($id){
        User::destroy($id);

        return redirect()->route('users.list')->with('success', 'User Delete!!');
    }

}
