<?php

namespace BrianFaust\Invoice;

use Illuminate\Support\Collection;

class ProductCollection
{
    /** @var \Illuminate\Support\Collection */
    private $data;

    /**
     * Create a new product collection instance.
     */
    public function __construct(array $data)
    {
        $this->data = new Collection();

        foreach ($data as $product) {
            if (!$product instanceof Product) {
                $product = new Product($product);
            }

            $this->data->push($product);
        }
    }

    /**
     * Get products from the product collection.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function items()
    {
        return $this->data;
    }
}