<?php

namespace App\Models;

use App\Presenters\BookPresenter;
use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use Presentable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_category_id',
        'name',
        'price',
        'description',
    ];

    /**
     * The attribute that point the presenter.
     *
     * @var string
     */
    protected $presenter = BookPresenter::class;

    /**
     * 書本分類.
     */
    public function bookCategory(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }

    /**
     * 書本標籤.
     */
    public function bookTags(): BelongsToMany
    {
        return $this->belongsToMany(BookTag::class, 'book_has_tags');
    }
}
