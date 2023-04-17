<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GenreHasBook extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['genre_id', 'book_id'];
    /**
     * 
     *
     * @return HasMany
     */
    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
    /**
     * 
     *
     * @return HasMany
     */
    public function genre(): HasMany
    {
        return $this->hasMany(Genre::class);
    }
}
