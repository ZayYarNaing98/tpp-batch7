<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $products = Product::with('category')->get();

        return $products;
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return $product;
    }
}