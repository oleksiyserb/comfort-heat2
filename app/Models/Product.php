<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int $author_id
 * @property string $name
 * @property int $price
 * @property string $slug
 * @property string $excerpt
 * @property string $body
 * @property string $manufacturer
 * @property int $status
 * @property string $technical
 * @property string $model
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTechnical($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    const NO_IMAGE = 'no-image.jpg';
    const AVAILABLE = 1;

    protected $fillable = [
        'name', 'price', 'slug', 'excerpt', 'body', 'manufacturer', 'status', 'technical', 'model', 'category_id'
    ];

    public function scopeFilter($query, array $filters)
    {
        if(request()->has('body')) {
            $query->when($filters['body'] ?? false, fn($query) =>
                $query->where('body', 'like', '%' . request('name') . '%')
            );
        } else {
            $query->when($filters['name'] ?? false, fn($query, $name) =>
                $query->where('name', 'like', '%' . $name . '%')
            );
        }

        if (request('category') != 0) {
            $query->when($filters['category'] ?? false, fn($query, $category) =>
                $query->whereHas('categories', fn($query) =>
                    $query->where('slug', $category)
                )
            );
        }
    }

    /**
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(Images::class, 'product_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    /**
     * @return HigherOrderBuilderProxy|mixed|string
     */
    public function getImage()
    {
        return $this->images->first();
    }

    public function getStatus()
    {
        if ($this->status == self::AVAILABLE) {
            return 'В наявності';
        } else {
            return 'Немає на складі';
        }
    }

    /**
     * @param $value
     * @param string $unit
     * @return array|string|string[]
     */
    public function formatPrice($value, string $unit = 'грн.')
    {
        if ($value > 0) {
            $value = number_format($value, 2, ',', ' ');
            $value = str_replace(',00', '', $value);

            if (!empty($unit)) {
                $value .= ' ' . $unit;
            }
        } else {
            $value = 'Немає в наявності';
        }

        return $value;
    }
}
