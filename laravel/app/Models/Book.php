<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'session_id'];
    public function rules()
    {
        return [
            'name' => 'required:books,name,' . $this->id . '',
            'session_id' => 'required'
        ];
    }
    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'name.unique' => 'O nome do livro já existe'
        ];
    }
    public function bookBorrowed(): HasMany
    {
        return $this->hasMany(BookBorrowed::class);
    }
    public function session(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
