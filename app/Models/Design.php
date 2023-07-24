<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Design
 *
 * @property int $design_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Design newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Design newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Design query()
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Design extends Model
{
    // use HasFactory;
    protected $primaryKey = 'design_id';

}
