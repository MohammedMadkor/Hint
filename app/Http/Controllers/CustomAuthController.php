<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Http\Request;
// use Hash;
use Session;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(LoginAdminRequest $request)
    {
        $email = $request->email;
        $password =$request->password ;
        $user = User::where('email',$email)->first();





        if($user && Hash::check($password, $user->password)){
            Auth::login($user);
            return redirect('category');
        } else{
            return redirect()->back()->with('error','user not found');

        }

    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(StoreAdminRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'premission' => $request->premission,
        ]);
        return redirect('admin');
    }



    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
