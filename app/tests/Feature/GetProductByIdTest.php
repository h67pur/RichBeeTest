<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetProductByIdTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_product_by_id()
    {
        $product = Product::factory()->create();
        $response = $this->getJson("/api/products/{$product->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category_id' => $product->category_id,
        ]);
    }
}
