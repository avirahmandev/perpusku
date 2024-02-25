<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $guarded = ['id'];

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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function prunable()
    {
        // delete trashed book after 1 month
        return static::where('deleted_at', '<=', now()->subMonth());
    }

    // delete all data/files, related with the book object
    // e.g cover, pdf file
    public function pruning()
    {
        // delete cover
        if($this->cover && ($this->cover != 'books-cover/cover_default.png')) {
            Storage::delete($this->cover);
        }

        // delete pdf
        if($this->file_pdf) {
            Storage::delete($this->file_pdf);
        }
    }
}
