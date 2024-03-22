<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    use HasFactory;

    public function book(): HasMany
    {
        return $this->hasMany(Books::class);
    }

    protected $fillable = [
        'name',
        'adress',
        'description',
        'email',
    ];
}
