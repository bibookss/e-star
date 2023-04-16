<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class DormsFilter extends ApiFilter
{
    protected $safeParms = [
        'locationId' => ['eq'],
        'name' => ['eq'],
        'barangay' => ['eq'],
        'city' => ['eq'],
        'street' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
        'locationId' => 'location_id', 
    ];
}