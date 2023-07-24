<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Field
 *
 * @property int $field_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Field newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field query()
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Field extends Model
{
    // use HasFactory;
    protected $primaryKey = "field_id";

}
