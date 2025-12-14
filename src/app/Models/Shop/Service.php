<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    private int $id;
    private string $name;
    private int $product_id;

    /**
     * @param int $id
     * @param string $name
     * @param int $product_id
     */
    public function __construct(int $id, string $name, int $product_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->product_id = $product_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

}
