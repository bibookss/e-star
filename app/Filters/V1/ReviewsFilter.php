<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ReviewsFilter extends ApiFilter
{
    protected $safeParms = [
        'dormId' => ['eq'],
        'userId' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
        'userId' => 'user_id', 
        'dormId' => 'dorm_id',
    ];
}