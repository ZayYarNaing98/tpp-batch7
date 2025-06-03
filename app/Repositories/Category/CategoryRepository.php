<?php

namespace App\Repositories\Category;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return $category;
    }
}