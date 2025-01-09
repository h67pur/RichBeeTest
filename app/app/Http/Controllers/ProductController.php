<?php

namespace App\Http\Controllers;

use App\Handlers\CreateProductHandler;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ProductService::getAllProducts());
    }

    public function store(ProductStoreRequest $request, CreateProductHandler $handler): JsonResponse
    {
        $product = $handler->handle($request->getDto());

        return response()->json([
            'message' => 'Продукт создан.',
            'data' => $product
        ], 201);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json($product);
    }
}
