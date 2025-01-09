<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductSuccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product_success(): void
    {
        $data = [
            'name' => 'Тестовый продукт',
            'description' => 'Описание тестового продукта',
            'price' => 99.99,
        ];

        $response = $this->postJson('/api/products/create', $data);

        $response->assertStatus(201);

        $response->assertJsonFragment([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);

        $this->assertDatabaseHas('products', [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);
    }
}
