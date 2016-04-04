<?php

/*
 * This file is part of Back App.
 *
 * (c) PageLab Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace App\Events\Transaction;

use App\Transaction;

class TransactionWasAddedEvent
{
    /**
     * The transaction that was added.
     *
     * @var Transaction
     */
    public $transaction;

    /**
     * Create a new component was added event instance.
     *
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

}