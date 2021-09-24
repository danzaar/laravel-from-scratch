<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    // You name the function scopeFilter but call it as filter->
    // If no input is given into the search field, the query will not operate

    public function scopeFilter($query, array $filters)

    {
//        if ($filters['search'] ?? false ) {
//            $query
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }

        // Alternative method with Builder (QueryBuilder
            $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                )
            );
        // Category filter
            $query->when($filters['category'] ?? false, fn($query, $category) =>
                $query->whereHas('category', fn ($query) =>
                    $query->where('slug', $category)
                 )
            );
        // Author filter
            $query->when($filters['author'] ?? false, fn($query, $author) =>
                $query->whereHas('author', fn ($query) =>
                    $query->where('username', $author)
                )
            );

//            $query->when($filters['category'] ?? false, function($query, $category){
//                $query->whereHas('category', function($query){
//                    $query->where('slug', $category);
//                });
//            });
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Way of remembering relationships -> "a Post BELONGS TO a Category"
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


