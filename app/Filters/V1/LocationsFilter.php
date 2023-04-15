<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class LocationsFilter extends ApiFilter
{
    protected $safeParms = [
        'barangay' => ['eq'],
        'city' => ['eq'],
        'street' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
    ];
}