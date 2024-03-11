<?php

namespace GrassFeria\StarterkidFrontend\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
       'user_id',
       'name',
       'title',
       'preview',
       'content',
       'published',
       'status',
       'slug'
    ];

 
    protected $casts = [
   
          'published' => 'datetime',
          'status' => 'boolean',
        
    ];

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

    public function getPublished()
    {
        return $this->published->format(config('starterkid.time_format.date_time_format'));
    }

    //public function getTime()
    //{
    //    return $this->time->format(config('starterkid.time_format.time_format'));
    //}

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
          
        );
    }
}