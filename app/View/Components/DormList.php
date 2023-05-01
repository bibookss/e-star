<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DormList extends Component
{
    public function __construct($dorm)
    {
        $this->dorm = $dorm;
    }

    public function render()
    {
        return view('components.dorm-list', [
            'dorm' => $this->dorm,
        ]);
    }
}
