<?php

namespace App;

use App\Filters\TransactionFilters;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'amount', 'author_id',
    ];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['author'];


    /**
     * Get the author of the transaction
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeFilter($query, TransactionFilters $filters)
    {
    	return $filters->apply($query);
    }
}
