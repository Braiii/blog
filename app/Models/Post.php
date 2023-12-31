<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query->where(fn($query) => 
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('excerpt', 'LIKE', '%' . $search . '%')
            )
        );
 
        $query->when($filters['category'] ?? false, fn($query, $category) => 
            $query->whereHas('category', fn($query) => 
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('author', fn($query) => 
                $query->where('username', $author)
            )
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
       return $this->hasMany(Comment::class);
    }

    public function thumbnail($request): string
    {
        $thumbnail = $this->thumbnail;
        if (isset($request->safe()['thumbnail'])) {
            $this->deleteThumbnailFile();

            $thumbnail = $request->file('thumbnail')->store('thumbnails');
        } 
        
        return $thumbnail;
    }

    public function deleteThumbnailFile(): void
    {
        if (isset($this->thumbnail)) {
            Storage::delete($this->thumbnail);
        }
    }
}
