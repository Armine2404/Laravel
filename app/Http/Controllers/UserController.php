<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
          User::uploadAvatar($request->image);
        return redirect()->back()->with('message', 'User Updates');
        }
     return redirect()->back()->with('error', 'User not Updated');
        
    }

  public function index()
  {
 $data = [
     'name'=>'tasmik',
     'email'=>'hasmdficxxcxcnbb@hghgttt.es',
     'password'=>'passwordd'
 ];
 User::create($data);
 $user = User::all();
 return $user;

  return view('index');

  }

}
