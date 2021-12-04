<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tags;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=tags::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'color' =>'required',
            'slug' =>'required|unique:categories',

        ]);


        $category=tags::create($request->all());

        return redirect()->route('admin.tags.index')->with('info','la etiqueta se creo con exito');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tags $tag)
    {
        return view('admin.tags.show',compact('tag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tags $tag)
    {
        return view('admin.tags.edit',compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tags $tag)
    {
        $request->validate([
            'name' =>'required',
            'color' =>'required',
            'slug' =>"required|unique:categories,slug,$tag->id",

        ]);

        $tag->update($request->all());


        return redirect()->route('admin.tags.index')->with('info','la etiqueta se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tags $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info','la etiqueta se elimino con exito');;

    }
}
