<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Borrowed extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(BorrowedItem::class);
    }
}
