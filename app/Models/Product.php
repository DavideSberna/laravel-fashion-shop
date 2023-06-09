<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    //cambiare con fillable

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function texture(): BelongsTo
    {
        return $this->belongsTo(texture::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
