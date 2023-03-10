<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'isbn_13',// nella validation mettiamo una limitazione sui numero dei caratteri : esattamente 13
        /**
         * attenzione che il title e series non sono unique e lo slug dovrà avere un contatore (es. zanna-bianca-2')
         * si può creare lo slug
         * fare una query (where 'slug' = $slugAppenaCreato)
         * se la query ci restituisce qualcosa
         * $slugAppenaCreato .= count($slugTrovatiNellaQuery)
         */
        // 'slug', 
        'title',
        'series',
        'author',
        'publisher',
        'publication_date',
        'plot',
        'genre',
        'cover_image',
    ];

    //per poter mostrare il dato con un formato specifico, vedi in guest.books.index il '->format(Y)'
    protected $dates = [
        'publication_date',
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
