<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetAllProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_products()
    {
        $products = Product::factory()->count(1000)->create();

        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
        $response->assertJsonCount(1000);
        $responseData = $response->json();
        foreach ($products as $product) {
            $this->assertTrue(collect($responseData)->contains('id', $product->id),);
            $returnedProduct = collect($responseData)->firstWhere('id', $product->id);
            $this->assertEquals($product->name, $returnedProduct['name']);
            $this->assertEquals($product->price, $returnedProduct['price']);
            $this->assertEquals($product->description, $returnedProduct['description']);
        }
    }
}
