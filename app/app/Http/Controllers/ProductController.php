<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ProductService::getAllProducts());
    }

    public function store(ProductStoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $product = ProductService::createProduct($validatedData);
        return response()->json($product, 201);
    }
}
