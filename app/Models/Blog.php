<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog
 *
 * @property int $blog_id
 * @property string $author
 * @property string $title
 * @property string $review
 * @property string $release_date
 * @property string|null $profile_image
 * @property string|null $profile_image_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereProfileImageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Blog extends Model
{
    // use HasFactory;
    protected $primaryKey = "blog_id";

    protected $fillable = ['author', 'title',  'review', 'release_date', 'profile_image', 'profile_image_description'];
    public static function validationRules(): array
    {
        return [
            'author' => 'required|min:4',
            'title' => 'required|min:4',
            'review' => 'required|min:10',
            'release_date' => 'required',
            ];
    }
    public static function validationMessages(): array
    {
        return 
            [
            'author.required' => 'Tienes que escribir tu nombre',
            'author.min' => 'Tu nombre tiene que tener mas de :min caracteres',
            'title.required' => 'Tienes que escribir el título del Blog',
            'title.min' => 'El título del Blog tiene que tener mas de :min caracteres',
            'review.required' => 'Tienes que escribir tu comentario',
            'review.min' => 'El comentario tiene que tener mas de :min caracteres',
            'release_date.required' => 'Tienes que poner la fecha de publicacion',
            ];
    }
}
