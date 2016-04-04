<?php

namespace App\Repositories;

use App\Account;
use App\User;

use App\Transaction;
use DateTime;
use Illuminate\Support\Collection;


class TransactionRepository
{
    /**
     * Get a transaction by specified uuid
     *
     * @param string $uuid
     * @return Transaction
     */
    public function forUUID($uuid){
        return Transaction::where('uuid', $uuid)->first();
    }

    /**
     * Get all transactions for the given account
     *
     * @param Account $account
     * @return Collection
     */
    public function forAccount(Account $account) {
        $transactions = $account->transactions()->with('account')->get();
        return $transactions;
    }

    /**
     * Search all records
     *
     * @param array $options
     * @param int $page
     * @param int $pageSize
     * @return Collection
     */
    public function search($options = [], $page = 1, $pageSize = 50){

        $query = Transaction::with('account');

        if (isset($options['created_at']) && $now = $options['created_at']) {
            $query->where('created_at', 'like', "%$now%");
        } 

        if (isset($options['account_id'])) {
            $query->where('account_id', $options['account_id']);
        }

        if (isset($options['search'])) {
            $query->where('description', 'like', "%$options[search]%");
        }

        return $query->get();
    }

    /**
     * Create a new transaction for given account and data
     *
     * @param User $user
     * @param Account $account
     * @param array $data
     * @return Transaction
     */
    public function create(User $user, Account $account, array $data){

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->account_id = $account->id;
        $transaction->uuid = $this->getUUID();
        $transaction->type = $data['type'] == 0 ? 'input' : 'output';
        $transaction->amount = $data['type']  == 0 ? $data['amount'] : $data['amount'] * -1;
        $transaction->description = $data['description'];
        $transaction->save();

        return $transaction;
    }


    /**
     * Compute the balance for given account
     *
     * @param Account $account
     * @return int
     */
    public function computeBalance(Account $account){
        $balance = 0;
        $transactions = $this->forAccount($account);

        foreach ($transactions as $transaction) {
            $balance += $transaction->amount;
        }

        return $balance;
    }

    /**
     *   static uuid(){
     *      // generate a random GUID http://stackoverflow.com/a/2117523
     *      return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c){
     *          var r = Math.random() * 16 | 0,
     *              v = c == 'x' ? r : (r&0x3|0x8);
     *          return v.toString(16);
     *      });
     *   }
     *
     * @return mixed
     */
    public function getUUID(){

        $pattern = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx";

        $uuid = preg_replace_callback('/[xy]/', function($matches){
            $r = random_int(0,16) | 0;
            // $v = $matches[0] == 'x' ? $r : ($r&0x3|0x8);
            return dechex($r);
        }, $pattern, 32);

        return $uuid;
    }

}