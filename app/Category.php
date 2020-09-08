<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    const COUNT_LIMIT = 20;
    protected $perPage = 9;

    protected $fillable = [
      'name',
      'description',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
