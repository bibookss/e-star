<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchFilter extends ApiFilter
{
    protected $safeParms = [
        'barangay' => ['eq'],
        'city' => ['eq'],
        'street' => ['eq'],
        'location' => ['gte', 'lte'],
        'security' => ['gte', 'lte'],
        'bathroom' => ['gte', 'lte'],
        'internet' => ['gte', 'lte'],
        'overall' => ['gte', 'lte'],
    ];

    protected $columnMap = [
        'location' => 'averageLocationRating',
        'security' => 'averageSecurityRating',
        'bathroom' => 'averageBathroomRating',
        'internet' => 'averageInternetRating',
        'overall' => 'overallRating',
    ];

}
