<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryUpateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);
        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryUpateRequest $request)
    {
        $category = Category::find($request->id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
