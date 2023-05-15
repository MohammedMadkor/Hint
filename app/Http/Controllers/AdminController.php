<?php

namespace App\Http\Controllers;

use App\Http\Requests\editAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()
    {
        # code...
        $admins = User::get();

        return view('Admin.index',compact('admins'));
    }
    public function update($id)
    {
        # code...
        $admin = User::where('id',$id)->first();
        return view('Admin.update',compact('admin'));
    }
    public function edit(editAdminRequest $request, $id)
    {
        # code...
        $admin = User::where('id',$id)->first();

        $password = $request->password;

        if($password){
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'premission' => $request->premission,
                'password' => Hash::make($password),
            ]);
        }else{
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'premission' => $request->premission,
            ]);



        }
        return redirect('admin');
    }


}
