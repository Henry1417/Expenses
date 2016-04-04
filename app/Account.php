<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'balance', 'status', 'opened'];

    /**
     * Gets the customer the belong to the account
     */
    public function customers(){
        return $this->belongsToMany(Customer::class);
    }

    /**
     * Gets the transactions record associated with the account
     */
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

}
