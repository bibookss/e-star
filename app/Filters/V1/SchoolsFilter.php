<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class SchoolsFilter extends ApiFilter
{
    protected $safeParms = [
        'locationId' => ['eq'],
        'name' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
        'locationId' => 'location_id', 
    ];
}