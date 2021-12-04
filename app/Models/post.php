<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];

    public  function users()
    {
        return $this->belongsTo(User::class);
    }
    public  function category()
    {
        return $this->belongsTo(categories::class); 
    }
    public  function tags()
    {
        return $this->belongsToMany(tags::class); 
    }

    public  function image()
    {
        return $this->morphOne(image::class,'images');
    }
}
