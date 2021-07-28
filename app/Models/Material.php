<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $check)
 * @method exists()
 * @property mixed sum
 */
class Material extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'inventory_number',
        'date_start',
        'type',
        'amount',
        'price',
        'sum',
        'employee_id',
        'score_id'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'sum',
    ];

    protected $appends = [
        'total_sum_hr',
    ];

    public function getTotalSumHrAttribute()
    {
        return $this->sum / 100;
    }

    public function setTotalSumHrAttribute(float $val)
    {
        $this->sum = $val * 100;
    }

    /**
     * Material belongs to Employee
     *
     * @return BelongsTo
     */
    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Material belongs to Score
     *
     * @return BelongsTo
     */
    public function Score(): BelongsTo
    {
        return $this->belongsTo(Score::class);
    }
}
