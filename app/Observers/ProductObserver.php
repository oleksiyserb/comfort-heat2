<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
        $this->setSlug($product);
        $this->setUser($product);
    }

    public function updating(Product $product)
    {
        $this->setSlug($product);
    }

    protected function setSlug(Product $product)
    {
        if (empty($product->slug)) {
            $product->slug = \Str::slug($product->name);
        }
    }

    protected function setUser(Product $product)
    {
        $product->author_id = auth()->user()->id ?? rand(1, 10);
    }
}
