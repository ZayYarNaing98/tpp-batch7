<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        // dd('here');
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index');
    }

    // public function show($id)
    // {
    //     // dd('here');
    //     // dd($id);
    //     $category = Category::find($id);

    //     // dd($category);
    //     return view('categories.show', compact('category'));
    // }

    public function edit($id)
    {
        // dd('here');
        // dd($id);
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        // dd('here');
        $category = Category::find($request->id);
        // dd($category);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        // dd('hree');
        // dd($id);
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category.index');
    }
}
