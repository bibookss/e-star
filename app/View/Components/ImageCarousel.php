<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImageCarousel extends Component
{
    public function __construct($dorm)
    {
        $this->dorm = $dorm;
    }

    public function render()
    {
        return view('components.image-carousel', [
            'dorm' => $this->dorm,
        ]);
    }
}
