<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Adults
 *
 * @property int $adult_id
 * @property string $name
 * @property string $abbreviation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Adults newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adults newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adults query()
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereAdultId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Adults extends Model
{
    // use HasFactory;
    protected $primaryKey = 'adult_id';

}
