<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirstTierAfilliate extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'first_tier_afilliates';

    protected $dates = [
        'date_became_first_tier',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email_id',
        'date_became_first_tier',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function email()
    {
        return $this->belongsTo(User::class, 'email_id');
    }

    public function getDateBecameFirstTierAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateBecameFirstTierAttribute($value)
    {
        $this->attributes['date_became_first_tier'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
