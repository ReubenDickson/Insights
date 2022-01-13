<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoolEarning extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'pool_earnings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'period_id',
        'user_id',
        'direct_referal_earnings',
        'first_tier_earnings',
        'second_tier_earnings',
        'third_tier_earnings',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
