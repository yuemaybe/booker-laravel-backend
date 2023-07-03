<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BookTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * 書本.
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_has_tags');
    }
}
