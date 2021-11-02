<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Images
 *
 * @property int $id
 * @property int $product_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ImagesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Images newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Images newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Images query()
 * @method static \Illuminate\Database\Eloquent\Builder|Images whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Images whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Images whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Images whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Images whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Images extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
