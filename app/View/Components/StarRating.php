<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dorm)
    {
        if (!array_key_exists('averageLocationRating', $dorm)) {
            $dorm['averageLocationRating'] = $dorm['locationRating'];
            $dorm['averageBathroomRating'] = $dorm['bathroomRating'];
            $dorm['averageSecurityRating'] = $dorm['securityRating'];
            $dorm['averageInternetRating'] = $dorm['internetRating'];
        }
        $this->dorm = $dorm;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.star-rating', [
            'dorm' => $this->dorm,
        ]);
    }
}
