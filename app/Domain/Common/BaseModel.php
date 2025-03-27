<?php

namespace App\Domain\Common;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
abstract class BaseModel extends Model
{
    protected $perPage = PaginationData::DEFAULT_LIMIT;

    protected string $defaultSortableField = 'id';
    protected string $defaultSortableDirection = DirectionEnum::ASC->value;

    public function scopeDefaultSort($builder, ?string $field = null, ?string $direction = null)
    {
        return $builder->orderBy(
            $field ?? $this->defaultSortableField,
            $direction ?? $this->defaultSortableDirection,
        );
    }
}
