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
        // 'overallRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        // 'locationRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        // 'securityRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        // 'internetRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        // 'bathroomRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
    ];

    protected $columnMap = [
        'locationId' => 'location_id', 
    ];
}