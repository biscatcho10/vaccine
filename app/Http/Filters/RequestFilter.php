<?php

namespace App\Http\Filters;

class RequestFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'service',
    ];

    /**
     * Filter the query by a given service.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function service($value)
    {
        if ($value) {
            return $this->builder->where('vaccine_id', "$value");
        }

        return $this->builder;
    }


}
