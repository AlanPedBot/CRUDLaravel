<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AuthorHasBook extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['author_id', 'book_id'];
    /**
     * 
     *
     * @return HasMany
     */
    public function author(): HasMany
    {
        return $this->hasMany(Author::class);
    }
    /**
     * 
     *
     * @return HasMany
     */
    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
