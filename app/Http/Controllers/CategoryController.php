<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Information Technology',
            ],
            [
                'id' => 2,
                'name' => 'Travel',
            ],
            [
                'id' => 3,
                'name' => 'Food',
            ],
            [
                'id' => 4,
                'name' => 'Health & Fitness',
            ],
            [
                'id' => 5,
                'name' => 'Education',
            ],
        ];

        return view('categories.index', compact('categories'));
    }
}
