<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Teh database table used by the model
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Gets the accounts the belong to the customer
     */
    public function accounts(){
        return $this->belongsToMany(Account::class);
    }
}
