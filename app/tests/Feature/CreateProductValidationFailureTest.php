<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductValidationFailureTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product_validation_failure()
    {
        $data = [
            'description' => 'Описание тестового продукта',
            'price' => 99.99,
        ];
        $response = $this->postJson('/products/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
        $this->assertEquals(
            'Имя продукта обязательно для заполнения.',
            $response->json('errors.name.0')
        );

        $data = [
            'name' => 'Тестовый продукт',
            'price' => 99.99,
        ];
        $response = $this->postJson('/products/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['description']);
        $this->assertEquals(
            'Описание продукта обязательно для заполнения.',
            $response->json('errors.description.0')
        );

        $data = [
            'name' => 'Тестовый продукт',
            'description' => 'Описание тестового продукта',
        ];
        $response = $this->postJson('/products/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['price']);
        $this->assertEquals(
            'Цена продукта обязательно для заполнения.',
            $response->json('errors.price.0')
        );

        $data = [
            'name' => 'Тестовый продукт',
            'description' => 'Описание тестового продукта',
            'price' => 'девяносто девять',
        ];
        $response = $this->postJson('/products/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['price']);
        $this->assertEquals(
            'Цена продукта должна быть числом.',
            $response->json('errors.price.0')
        );

        $data = [
            'name' => 'Тестовый продукт',
            'description' => 'Описание тестового продукта',
            'price' => -1,
        ];
        $response = $this->postJson('/products/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['price']);
        $this->assertEquals(
            'Минимальная цена продукта должна быть не менее 0.',
            $response->json('errors.price.0')
        );

        $data = [
            'name' => 'Тестовый продукт',
            'description' => 'Описание тестового продукта',
            'price' => 99.99,
            'category_id' => 'нечисло',
        ];
        $response = $this->postJson('/products/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['category_id']);
        $this->assertEquals(
            'Категория продукта должна быть целым числом.',
            $response->json('errors.category_id.0')
        );
    }
}
