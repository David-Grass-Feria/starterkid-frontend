<?php

namespace GrassFeria\StarterkidFrontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
       'user_id',
    ];

    //protected $casts = [
    //    'date' => 'date',
    //    'date_time' => 'datetime',
    //    'time' => 'datetime',
    //    'active' => 'boolean',
    //    
    //];

    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //public function getDate()
    //{
    //    return $this->date->format(config('starterkid.time_format.date_format'));
    //}

    //public function getDateTime()
    //{
    //    return $this->date_time->format(config('starterkid.time_format.date_time_format'));
    //}

    //public function getTime()
    //{
    //    return $this->time->format(config('starterkid.time_format.time_format'));
    //}

    //protected function name(): Attribute
    //{
    //    return Attribute::make(
    //        get: fn (string $value) => ucfirst($value),
    //        set: fn (string $value) => ucfirst($value),
    //    );
    //}
}