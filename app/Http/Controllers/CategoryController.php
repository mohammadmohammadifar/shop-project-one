<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.pages.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Category::where('parent_id',0)->get();
        return view('admin.pages.categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        Category::create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'description'=>$request->description,
            'icon'=>$request->icon,
            'is_active'=>$request->is_active
        ]);

        alert()->success('Thank you', 'category is created');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parents=Category::where('parent_id',0)->get();
        return view('admin.pages.categories.edit', compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required'
        ]);

        $category->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'description'=>$request->description,
            'icon'=>$request->icon,
            'is_active'=>$request->is_active

        ]);

        alert()->success('Thank you', 'category is update');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
