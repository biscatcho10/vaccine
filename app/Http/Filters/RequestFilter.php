<?php

namespace App\Http\Filters;

use Carbon\Carbon;

class RequestFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'service',
        'date',
        // 'start',
        // 'end',
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

    /**
     * Filter the query by a given service.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function date($value)
    {
        if ($value) {
            $date = Carbon::parse($value)->format('Y-m-d');
            return $this->builder->whereDate('day_date', $date);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given service.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function start($value)
    {
        if ($value) {
            $date = Carbon::parse($value)->format('Y-m-d');
            return $this->builder->whereDate('day_date', '>=', $date);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given service.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function end($value)
    {
        if ($value) {
            $date = Carbon::parse($value)->format('Y-m-d');
            return $this->builder->whereDate('day_date', '<=', $date);
        }

        return $this->builder;
    }


}
