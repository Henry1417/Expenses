<?php

namespace App\Repositories;

use App\Account;
use Illuminate\Database\Eloquent\Collection;

class AccountRepository
{

    /**
     * Get Account by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id){
        // find record
        $account = Account::find($id);

        return $account;
    }

    /**
     * Gets all account in the system
     *
     * @return Collection
     */
    public function getAllAccounts(){
        // TODO make for the user
        return Account::all();
    }
}