<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditPost extends Component
{
    public function __construct($post)
    {
        \Log::debug("editt post construct");
        \Log::debug($post);
        $this->post = $post;
    }

    public function render()
    {
        return view('components.edit-post', [
            'post' => $this->post,
        ]);    
    }
}
