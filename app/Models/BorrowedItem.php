<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "book_id",
        "status",
        "book_return"
    ];

    public function borrowed(): BelongsTo
    {
        return $this->belongsTo(Borrowed::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Books::class);
    }
}
