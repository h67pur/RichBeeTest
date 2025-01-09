<?php

declare(strict_types=1);

namespace App\VO;

use Illuminate\Support\Arr;

final class ProductVO
{
    public function __construct(public string $name, public string $description, public float $price) {}
    public static function fromArray(array $data): self
    {
        return new self(
            Arr::get($data, 'name'),
            Arr::get($data, 'description'),
            null !== Arr::get($data, 'price') ? (float) Arr::get($data, 'price') : 0
        );
    }
}
