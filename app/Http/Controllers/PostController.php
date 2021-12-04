<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\tags;

class PostController extends Controller
{
    public function index(){ 
    $Posts=post::where('status',2)->latest('id')->paginate(8);

        return view('posts.index',compact('Posts'));
}
    public function show(post $post){ 

        // $this->published('published');
        $similares=post::where('category_id',$post->category_id)
                            ->where('status',2)
                            ->where('id','!=', $post->id)
                            ->latest('id')
                            ->take(4)
                            ->get();

        return view('posts.show',compact('post','similares'));
}


 public function category(categories $category){
    $posts=post::where('category_id',$category->id)
                            ->where('status',2)
                            ->latest('id')
                            ->paginate(6);
    return view('posts.category',compact('posts','category'));         
    }
 public function tag(tags $tag){
    $posts= $tag->posts()->where('status',2)->latest('id')->paginate(4);



    return view('posts.tag',compact('posts','tag'));

 } 
 /*    public function show(post $posts){ 
        return view('posts.show',compact('posts'));
} */
}
