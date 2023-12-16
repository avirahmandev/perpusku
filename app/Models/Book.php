<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // public function scopeFilter($query, array $filters)
    // {
        // if (isset($filters['sortby']) ? $filters['sortby', 'category'] : false) {
        //     return $query->where('populer', 1);
        // }

        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // });
    // }
    public function scopeCategory($query, $category)
    {
        $query->when($category ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
