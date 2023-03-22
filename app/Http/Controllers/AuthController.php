<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
            'email' => $input['email'],
            'password'=>$input['password']
        ])->first();
        if(isset($user)){
            $request->session()->put('logged', true);
            $request->session()->put('user', $user);
            return redirect('userpage');
        }
        /*if(Hash::check($input['password'], $user->password))
        {
            $request->session()->put('logged', true);
            $request->session()->put('user', $user);

            return redirect()->route('news');
        }*/
        

        return back();
    }
}
