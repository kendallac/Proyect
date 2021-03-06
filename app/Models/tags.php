<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;

    public function getRouteKeyName(){
        return 'slug';
    }
    protected $fillable=['name','slug','color'];
    public  function posts()
    {
        return $this->belongsToMany(post::class);
    }
}
