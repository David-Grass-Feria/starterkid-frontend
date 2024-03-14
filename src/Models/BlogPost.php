<?php

namespace GrassFeria\StarterkidFrontend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model implements HasMedia
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
        'slug',
        'author'
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

    public function getPublished()
    {
        return $this->published->format(config('starterkid.time_format.date_time_format'));
    }
    
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),

        );
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
           \Spatie\ResponseCache\Facades\ResponseCache::forget(url('/').'/'.config('starterkid-frontend.blog_post_slug').'/'.$model->slug);
        });
        static::deleted(function ($model) {
            \Spatie\ResponseCache\Facades\ResponseCache::forget(url('/').'/'.config('starterkid-frontend.blog_post_slug').'/'.$model->slug);
         });
    }

    public function scopeFrontGetBlogPostWhereStatusIsOnline(\Illuminate\Database\Eloquent\Builder $query, $search = '', $orderBy = 'id', $sort = 'asc'): \Illuminate\Database\Eloquent\Builder
    {
        $query = $query->select('id', 'name', 'title', 'published', 'status', 'slug', 'preview','author')
            ->where('status', true);

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy($orderBy, $sort);

        return $query;
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion(config('starterkid.spatie_conversions.small.name'))
              ->width(config('starterkid.spatie_conversions.small.size'));
        $this->addMediaConversion(config('starterkid.spatie_conversions.large.name'))
              ->width(config('starterkid.spatie_conversions.large.size'));
        $this->addMediaConversion(config('starterkid.spatie_conversions.medium.name'))
              ->width(config('starterkid.spatie_conversions.medium.size'));
              
    }
}