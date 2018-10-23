<?php

namespace App\Filters;
use App\User;

class TransactionFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['incomes', 'expenses', 'amount', 'createdOn'];

    /**
     * Filter the query by incomes only
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function onlyIncomes()
    {
        return $this->builder->where('amount', '>', 0);
    }

    /**
     * Filter the query by expenses only
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function expenses()
    {
        return $this->builder->where('amount', '<', 0);
    }

    /**
     * Filter the query by a given amount.
     *
     * @param  string $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function amount($amount)
    {
        return $this->builder->where('amount', $amount);
    }

    /**
     * Filter the query by a given date
     *
     * @param  string $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function createdOn($date)
    {
        return $this->builder->whereDate('created_at', $date);
    }
}