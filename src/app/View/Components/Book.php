<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Book extends Component
{
    /**
     * The Book Object.
     *
     * @var object
     */
    public $book;

    /**
     * Create a new component instance.
     *
     * @param object $book
     * @return void
     */
    public function __construct($book)
    {
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.book');
    }
}
