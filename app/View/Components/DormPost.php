<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DormPost extends Component
{
    public function __construct($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('components.dorm-post', [
            'post' => $this->post,
        ]);
    }
}
