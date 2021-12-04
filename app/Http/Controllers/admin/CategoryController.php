<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=categories::all();
        return view('admin.categories.index',compact('categories'));
 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');

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
            'slug' =>'required|unique:categories',

        ]);


        $category=categories::create($request->all());

        return redirect()->route('admin.categories.index')->with('info','la categoria se creo con exito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {
        return view('admin.categories.edit',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $category)
    {
        return view('admin.categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,categories $category)
    {
        $request->validate([
            'name' =>'required',
            'slug' =>"required|unique:categories,slug,$category->id",

        ]);

        $category->update($request->all());


        return redirect()->route('admin.categories.edit',$category)->with('info','la categoria se actualizo con exito');

    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info','la categoria se elimino con exito');;


    }
}
