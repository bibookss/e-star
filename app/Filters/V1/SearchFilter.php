<?php

namespace App\Filters\V1;

use App\Models\Dorm;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class SearchFilter extends ApiFilter
{
    protected $safeParms = [
        'barangay' => ['eq'],
        'city' => ['eq'],
        'street' => ['eq'],
        'locationRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'securityRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'bathroomRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'internetRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'overallRating' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];

    protected $columnMap = [
        'locationRating' => 'location', 
        'securityRating' => 'security', 
        'bathroomRating' => 'bathroom', 
        'internetRating' => 'internet',
        'overallRating' => 'overall'
    ];

    public function apply($filterItems) {
        $query = Dorm::with(['location', 'ratings']);
    
        foreach ($filterItems as $item) {
            $column = $item[0];
            $operator = $item[1]; 
            $value = $item[2];
    
            if (in_array($column, ['barangay', 'city', 'street'])) {
                $query->whereHas('location', function ($query) use ($column, $operator, $value) {
                    $query->where($column, $operator, $value);
                });
            } elseif (in_array($column, ['location', 'security', 'bathroom', 'internet', 'overall'])) {
                if ($column === 'overall') {
                    $query->whereHas('ratings', function ($query) use ($operator, $value) {
                        $query->whereRaw('(SELECT ROUND(AVG((location + security + bathroom + internet) / 4), 1) FROM `ratings` WHERE `dorm_id` = `dorms`.`id`) ' . $operator . ' ?', [$value]);
                    });
                } else {
                    $query->whereHas('ratings', function ($query) use ($column, $operator, $value) {
                        $query->where($column, $operator, $value);
                    });
                    $query->whereHas('ratings', function ($query) use ($column, $operator, $value) {
                        $query->whereRaw('(SELECT ROUND(AVG(`'.$column.'`), 1) FROM `ratings` WHERE `dorm_id` = `dorms`.`id`) ' . $operator . ' ?', [$value]);
                    });
                }
            } else {
                $query->where($column, $operator, $value);
            }
        }
    
        return $query;
    }
    
}