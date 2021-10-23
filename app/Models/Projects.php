<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Projects
 *
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property string $body
 * @property string $slug
 * @property string $image
 * @property int $is_published
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProjectsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects query()
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projects whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Projects extends Model
{
    use HasFactory;
}
