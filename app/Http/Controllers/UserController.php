<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Padlet;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function createView(): View 
    {
        //return view('create_padlet')->with(compact('userpage'));
        return view('create-padlet',[
            'user_id'=>Session::get('user')->id,
        ]);
    }
    public function userPageView(): View 
    {
        //return view('create_padlet')->with(compact('userpage'));
        $padlet=Padlet::all();
        return view('userpage',[
            'padlet'=>$padlet,
        ]);
    }
    public function nameEmail(){
        return strpbrk(Session::get('user')->email,'@');
    }
    
}
