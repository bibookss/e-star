<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ImagesFilter extends ApiFilter
{
    protected $safeParms = [
        'dormId' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
        'dormId' => 'dorm_id',
    ];
}