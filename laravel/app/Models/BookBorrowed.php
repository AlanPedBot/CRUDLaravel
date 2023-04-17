<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookBorrowed extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['name', 'people_id', 'employee_id'];
    /**
     * 
     *
     * @return HasMany
     */
    public function peoples(): HasMany
    {
        return $this->hasMany(People::class);
    }
    /**
     * 
     *
     * @return HasMany
     */
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
