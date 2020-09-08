<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $perPage = 9;

    protected $fillable = [
      'title',
      'price',
      'description',
    ];

    protected $with = [
      'media',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
          ->singleFile();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
