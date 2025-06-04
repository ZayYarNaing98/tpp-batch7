<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function index();

    public function store($data);

    public function edit($id);

    // public function update($id, $data);

    // public function destroy($id);
}