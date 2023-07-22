<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
  public function add()
  {
    return view('layouts.add');
  }
  
  public function addAuth(Request $req)
  {
    $validator = Validator::make($req->all(), [
      'name' => ['required', 'regex:/^[a-zA-Z\s]+$/u', 'min:3'],
      'email' => ['required', 'email'],
      'password' => ['required', 'min:6', 'confirmed'],
      'role' => ['required'],
      ]);
      
    if($validator->fails())
    {
      return redirect('/add')
      ->withErrors($validator)
      ->withInput();
    }
    
    $user = new User;
    $user->name = $req->name;
    $user->email = $req->email;
    $user->password = bcrypt($req->password);
    $user->role = $req->role;
    $user->save();
    
    $req->session()->flash('success', 'User saved successfully.');
    
    return redirect()->back();
  }
}
