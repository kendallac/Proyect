<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\post;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\tags;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.posts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=categories::pluck('name','id');
        $tags=tags::all();

        return view('admin.posts.create',compact('categories','tags'))->with('info','el post se creo con exito');;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        
            $post=post::create($request->all());

            if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file')) ;

            $post->image()->create([

                'url'=>$url,
            ]);

            }
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.create',$post);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $this->authorize('author');
        $categories=categories::pluck('name','id');
        $tags=tags::all();

        return view('admin.posts.edit', compact('post',  'categories', 'tags'))->with('info','el post se actualizo con exito');;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,post $post)
    {
        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file')) ;

            if ($post->image) {
                Storage::delete([$post->image->url]);
                $post->image->update([
                    'url'=>$url,
                ]);
            }else {
                $post->image->create([
                    'url'=>$url,
                ]);
            }
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }


        return redirect()->route('admin.posts.edit',$post)->with('info','el post se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info','el post se elimino con exito');

    }
}
