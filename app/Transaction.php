<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [];

    /**
     * The attributes that should be casted to native types
     *
     * @var string[]
     */
    protected $casts = [
        'id'          => 'int',
        'account_id'  => 'int',
        'amount'      => 'string',
        'description' => 'string'
    ];

    /**
     * The validation rules
     *
     * @var string[]
     */
    public static $rules = [
        'account_id'    => 'required|integer',
        'type'          => 'required|integer',
        'amount'        => 'required|integer',
        'description'   => 'required|max:128'
    ];

    /**
     * @return string[]
     */
    public static function getRules()
    {
        return self::$rules;
    }

    /**
     * Gets the account that owns the transaction.
     */
    public function account(){
        return $this->belongsTo(Account::class);
    }

}
