<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function loginView(): View 
    {
        return view('login');
    }
    public function doLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $input = $request->only(['email', 'password']);

        $user = User::where([
            'email' => $input['email']
        ])->first();
        if(isset($user)){
            $request->session()->put('logged', true);
            $request->session()->put('user', $user);
            //return redirect('userpage');
        }
        if(Hash::check($input['password'], $user->password))
        {
            $request->session()->put('logged', true);
            $request->session()->put('user', $user);

            return redirect('userpage');
        }
        

        return back();
    }
    public function registerView(): View 
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
       
   
      
  
        $input = $request->only([ 'email', 'password']);

        $input['password'] = bcrypt($input['password']);

        $user = User::where('email', $input['email'])->get();

        // if user already exists
        /*if(!$user->isEmpty())
        {
            return redirect()->route('auth.register-error');
        }*/

        $input['remember_token'] = Str::random(40);
        
        $createdUser = User::create($input);
        return view('login');
    }
}
