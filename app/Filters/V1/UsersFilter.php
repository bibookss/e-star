<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UsersFilter extends ApiFilter
{
    protected $safeParms = [
        'isVerifiedStudent' => ['eq'],
    ];

    protected $operatorMap = [
        'eq' => '=',
    ];

    protected $columnMap = [
    ];
}