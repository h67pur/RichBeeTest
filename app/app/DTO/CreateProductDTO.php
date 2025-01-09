<?php

declare(strict_types=1);

namespace App\DTO;

use App\VO\ProductVO;
use Illuminate\Support\Arr;

final class CreateProductDTO
{
    public function __construct(public ProductVO $product) {}

    public static function fromArray(array $data): self
    {
        return new self(ProductVO::fromArray($data));
    }
}
