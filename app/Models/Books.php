<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Books extends Model
{
    use HasFactory;

    protected $casts = [
        "published_at" => "datetime",
    ];

    public function editor(): BelongsTo
    {
        return $this->belongsTo(Editor::class); 
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class); 
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    protected $fillable = [
        "editor_id",
        "author_id",
        'name',
        'cover',
        'description',
        'published_at',
        'stock',
    ];
}
