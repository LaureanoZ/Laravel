<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



/**
 * App\Models\Service
 *
 * @property int $service_id
 * @property string $title
 * @property int $price
 * @property string $description
 * @property string $blocks
 * @property string|null $image
 * @property string|null $image_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @property int $field_id
 * @property-read \App\Models\Field $field
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereFieldId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property int $adult_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereAdultId($value)
 * @property-read \App\Models\Adults $adult
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @mixin \Eloquent
 */
class Service extends Model
{
    // use HasFactory;
    protected $primaryKey = "service_id";

    protected $fillable = ['title', 'field_id', 'adult_id', 'description', 'blocks', 'price', 'image', 'image_description'];
    public static function validationRules(): array
    {
        return [
            'title' => 'required|min:4',
            'price' => 'required|numeric',
            'description' => 'required|min:10',
            'blocks' => 'required|min:20',
            'field_id' => 'required|exists:fields',
            'adult_id' => 'required|exists:adults'
            ];
    }

    public static function validationMessages(): array
    {
        return 
            [
            'title.required' => 'Tienes que escribir el título del Servicio',
            'title.min' => 'El título del servicio tiene que tener mas de :min caracteres',
            'price.required' => 'Tienes que escribir el precio del servicio',
            'price.numeric' => 'El precio debe ser un numero',
            'description.required' => 'Tienes que escribir la descripcion del Servicio',
            'description.min' => 'La descripcion tiene que tener mas de :min caracteres',
            'blocks.required' => 'Tienes que escribir los bloques del Servicio',
            'blocks.min' => 'Los bloques tienen que tener mas de :min caracteres',
            'image_description.required' => 'Tienes que escribir la descripcion de la imagen',
            'field_id.required' => 'Tienes que escojer un nivel de dificultad',
            'field_id.exists' => 'Elije una dificultad dentro de las opciones',
            'adult_id.required' => 'Tienes elejir si es Mayor de edad',
            'adult_id.exists' => 'Elije dentro de las opciones',
            ];
    }
    public function getDesignIds(): array
    {
        return $this->designs->pluck('design_id')->all();
    }
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (int $value): float => $value / 100,
            set: fn (float $value) => $value * 100,
        );
    }
    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class, 'field_id', 'field_id');
    }
    public function adult(): BelongsTo
    {
        return $this->belongsTo(Adults::class, 'adult_id', 'adult_id');
    }
    public function designs(): BelongsToMany
    {
        return $this->belongsToMany(
            Design::class,
            'services_has_designs',
            'service_id',
            'design_id',
            'service_id',
            'design_id',
        );
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_has_services',
            'user_id',
            'service_id',
            'user_id',
            'service_id',
        );
    }
}
