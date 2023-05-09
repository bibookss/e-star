<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditPost extends Component
{
    public function __construct($post)
    {
        $this->post = $post;
        \Log::debug('EditPost');
        \Log::debug($post['review']);
    }

    public function render()
    {
        return view('components.edit-post', [
            'post' => $this->post,
            'dormId' => $this->post['dormId'],      
        ]);    
    }
}
