<?php

namespace App\View\Components;

use App\Models\Blog\Post;
use Illuminate\View\Component;

class CardPostComponent extends Component
{
    public $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-post-component', ['post' => $this->post]);
    }
}
