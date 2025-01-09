<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_products()
    {
        Product::factory()->count(1000)->create();

        $response = $this->getJson('/products');
        $response->assertStatus(200);
        $response->assertJsonCount(1000);

    }
}
