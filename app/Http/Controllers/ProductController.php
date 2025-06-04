<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->index();

        return view('products.index', compact('products'));
    }

    public function create()
    {

        $categories = $this->categoryRepository->index();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_id' => 'required',
            'status' => 'nullable',
        ]);

        $data['status'] = $request->has('status') ? true : false;

        $this->productRepository->store($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = $this->categoryRepository->index();

        $product = $this->productRepository->edit($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $product = $this->productRepository->edit($request->id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'status' => $request->status  == 'on' ? 1 : 0,
        ]);

        return redirect()->route('products.index');

    }

    public function delete($id)
    {
        $product = $this->productRepository->edit($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}