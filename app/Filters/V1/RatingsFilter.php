<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class RatingsFilter extends ApiFilter
{
    protected $safeParms = [
        'ratingId' => ['eq'],
        'dormId' => ['eq'],
        'userId' => ['eq'],
        'locationRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'securityRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'internetRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'bathroomRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

    protected $columnMap = [
        'ratingId' => 'id', 
        'dormId' => 'dorm_id',
        'userId' => 'user_id',
        'locationRating' => 'location',
        'securityRating' => 'security',
        'internetRating' => 'internet',
        'bathroomRating' => 'bathroom',
    ];
}