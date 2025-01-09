<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    public static function getAllProducts() : Collection
    {
        return Product::all();
    }

    public static function createProduct(array $data) : Builder|Model
    {
        return Product::query()->create($data);
    }
}
