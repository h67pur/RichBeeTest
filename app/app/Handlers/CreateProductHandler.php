<?php

declare(strict_types=1);

namespace App\Handlers;

use App\DTO\CreateProductDTO;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CreateProductHandler
{
    public function handle(CreateProductDTO $dto): Product
    {
        return DB::transaction(function () use ($dto) {
            $product = new Product();
            $product->name = $dto->product->name;
            $product->description = $dto->product->description;
            $product->price = $dto->product->price;
            $product->save();

            return $product;
        });
    }
}
