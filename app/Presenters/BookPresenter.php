<?php

namespace App\Presenters;

class BookPresenter extends Presenter
{
    /**
     * 書本標籤.
     */
    public function presentBookTags(): string
    {
        return $this->object->bookTags->implode('name', '、');
    }
}
