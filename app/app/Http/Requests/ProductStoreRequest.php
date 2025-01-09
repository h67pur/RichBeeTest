<?php

namespace App\Http\Requests;

use App\DTO\CreateProductDTO;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3',
            ],
            'description' => [
                'required',
                'string',
                'max:255',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'category_id' => [
                'sometimes',
                'integer',
                'exists:product_categories,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя продукта обязательно для заполнения.',
            'name.string' => 'Имя продукта должно быть строкой.',
            'name.max' => 'Имя продукта не должно превышать 100 символов.',
            'name.min' => 'Имя продукта должно иметь хотя бы 3 символа.',

            'description.required' => 'Описание продукта обязательно для заполнения.',
            'description.string' => 'Описание продукта должно быть строкой.',
            'description.max' => 'Описание продукта не должно превышать 255 символов.',

            'price.required' => 'Цена продукта обязательно для заполнения.',
            'price.numeric' => 'Цена продукта должна быть числом.',
            'price.min' => 'Минимальная цена продукта должна быть не менее 0.',

            'category_id.integer' => 'Категория продукта должна быть целым числом.',
            'category_id.exists' => 'Такой продукт не существует в выбранной категории.',
        ];
    }

    public function getDto(): CreateProductDTO
    {
        return CreateProductDTO::fromArray($this->validated());
    }
}
