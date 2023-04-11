<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookBorrowed extends Model
{
    use HasFactory;
    public function peoples(): HasMany
    {
        return $this->hasMany(People::class);
    }
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
