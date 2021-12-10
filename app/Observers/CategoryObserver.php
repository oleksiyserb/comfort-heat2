<?php

namespace App\Observers;

use App\Models\Categories;

class CategoryObserver
{

    public function creating(Categories $categories)
    {
        $this->setSlug($categories);
    }

    public function updating(Categories $categories)
    {
        $this->setSlug($categories);
    }

    protected function setSlug($categories)
    {
        if(empty($categories->slug)) {
            $categories->slug = \Str::slug($categories->name);
        }
    }
}
