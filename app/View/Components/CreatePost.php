<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreatePost extends Component
{
    public function __construct($dormId)
    {
        $this->dormId = $dormId;
    }

    public function render()
    {
        return view('components.create-post', [
            'dormId' => $this->dormId       
        ]);    
    }
}
