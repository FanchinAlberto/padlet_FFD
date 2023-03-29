<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Padlet;
use App\Models\Post;
use Faker\Extension\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class PadletController extends Controller
{

    public function padletView(): View 
    {
        $id=strstr(URL::current(),'padlet/');
        $id=substr($id,7);
        $padlet=Padlet::where('id','=',$id)->first();
        Session::put('padlet',$padlet);
        return view('padlet',[
            'padlet'=>json_decode($padlet),
            'posts'=>Post::all(),
        ]);
    }
    public function casualColor(){
        $arrayfin=array();
        
        array_push($arrayfin,'r'.rand(0,255));
        array_push($arrayfin,'g'.rand(0,255));
        array_push($arrayfin,'b'.rand(0,255));
       
        return $arrayfin;
    }
    public function padletCreate(Request $request)
    {
       
        if(!$request->session()->get('logged')) {
            return false;
        }

        $user = $request->session()->get('user');
        $array=PadletController::casualColor();
        //$padlet = $request->input("padlet");
        $input=$request->only(['type']);
        $padlet = Padlet::create([
            'user_id' => $user->id,
            'type' =>$input['type'],
            'name'=>"il mio padlet",
            'archived'=>false,
            'color'=>$array[0].$array[1].$array[2]
            
        ]);
        $request->session()->put('padlet',$padlet);
        /*$options = [
          'cluster' => env('PUSHER_APP_CLUSTER'),
          'useTLS' => false
        ];*/

        /*$app_key = env("PUSHER_APP_KEY");
        $app_secret = env("PUSHER_APP_SECRET");
        $app_id = env("PUSHER_APP_ID");

        $pusher = new \Pusher\Pusher($app_key, $app_secret, $app_id, $options);

        $comment['user_name'] = $user->name;

        $pusher->trigger('post-' . $id, 'new-comment', $comment);*/
        return $padlet;
        
    }
}
