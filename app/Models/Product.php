<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'price',
        'price_sale',
        'description',
        'is_active',
        'is_best_sale',
    ];

    public $cats = [
        'is_active'=>'boolean',
        'is_best_sale'=>'boolean',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }

    public function scopeWithPromotions($query)
    {
        return $query->whereHas('promotions', function($q) {
            $q->where('start_date', '<=', now())
              ->where('end_date', '>=', now());
        });
    }
}
