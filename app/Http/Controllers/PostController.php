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

class PostController extends Controller
{

    public function padletView(): View 
    {
        $id=strstr(URL::current(),'padlet/');
        $id=substr($id,7);
        $padlet=Padlet::where('id','=',$id)->first();
        
        return view('padlet',[
            'padlet'=>json_decode($padlet),
        ]);
    }
  
    public function postCreate(Request $request)
    {
       //die($request);
        if(!$request->session()->get('logged')) {
            return false;
        }
       
        $user = $request->session()->get('user');
        $padlet = $request->session()->get('padlet');
        //$array=PostController::casualColor();
        //$padlet = $request->input("padlet");
        $input=$request->only(['content','content-file']);
        if(isset($input['content-file'])){
            $post = Post::create([
                'user_id' => $user->id,
                'content' =>$input['content-file'],
                'padlet_id'=>$padlet->id,
            ]);
        }else{
        $post = Post::create([
            'user_id' => $user->id,
            'content' =>$input['content'],
            'padlet_id'=>$padlet->id,
        ]);
    }
        //$request->session()->put('padlet',$padlet);
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
        return $post;
        
    }
}
