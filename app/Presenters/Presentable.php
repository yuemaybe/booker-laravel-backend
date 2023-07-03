<?php

namespace App\Presenters;

trait Presentable
{
    /**
     * present.
     *
     * @var Presenter
     */
    protected $present;

    public function present()
    {
        return true === is_null($this->present) ? $this->present = new $this->presenter($this) : $this->present;
    }
}
