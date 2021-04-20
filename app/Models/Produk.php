<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['produk_name','category_id','produk_description', 'image1', 'image2', 'size', 'color', 'harga_s', 'harga_m', 'harga_l'];


    public function setSizeAttribute($value)
    {
        $this->attributes['size'] = json_encode($value);
    }

    // public function getSizeAttribute($value)
    // {
    //     return $this->attributes['size'] = json_decode($value);
    // }


    public function setColorAttribute($value)
    {
        $this->attributes['color'] = json_encode($value);
    }

    // public function getColorAttribute($value)
    // {
    //     return $this->attributes['color'] = json_decode($value);
    // }

    public function scopeSearch($query)
    {
        $filter = request()->query();

        return $query
            ->when(@$filter['search'], function ($query, $keyword) {
                return $query->where(function ($query) use ($keyword) {
                    return $query
                        ->where('product_name', 'like', "%{$keyword}%");
                });
            })->when(@$filter['category'], function ($query, $keyword) {
                return $query->where(function ($query) use ($keyword) {
                    return $query
                        ->where('category_id', "{$keyword}");
                });
            })
            ;
    }

    public function category()
    {
        return $this->belongsTo(Kategoribaju::class, 'category_id');
    }
}
