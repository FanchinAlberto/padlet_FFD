<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Padlet extends Model
{
    use HasFactory;

    protected $table = 'padlet';
	protected $fillable = [
        'user_id','name', 'type','color','archived'
    ];
    public function post(){
        return $this->hasMany(Post::class)->orderBy('updated_at','desc');
    }

}
