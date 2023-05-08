<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class PostsFilter extends ApiFilter
{
    protected $safeParms = [
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
        'dormId' => 'dorm_id',
        'userId' => 'user_id',
        'locationRating' => 'location_rating',
        'securityRating' => 'security_rating',
        'internetRating' => 'internet_rating',
        'bathroomRating' => 'bathroom_rating',
    ];
}