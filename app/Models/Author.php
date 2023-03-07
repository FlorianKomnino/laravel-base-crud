<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'nationality', 'date_of_birth', 'date_of_deth'];

    public function books(){
        return $this->hasMany(Book::class);
    }
}
