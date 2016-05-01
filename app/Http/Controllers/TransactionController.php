<?php

namespace App\Http\Controllers;

use App\Account;
use App\Repositories\AccountRepository;
use App\Repositories\TransactionRepository;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Response as ResponseTo;

class TransactionController extends Controller
{

    /**
     * The transaction repository instance.
     *
     * @var TransactionRepository
     */
    protected $transactions;

    /**
     * @var AccountRepository
     */
    protected $accounts;

    /**
     * Create a new controller instance of.
     * TransactionController constructor.
     *
     * @param TransactionRepository $transactions
     * @param AccountRepository $accounts
     */
    public function __construct(TransactionRepository $transactions, AccountRepository $accounts)
    {
        $this->middleware('auth');
        
        $this->transactions = $transactions;
        $this->accounts = $accounts;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $account = null;
        $balance = 0;
        
        // listing of accounts availables
        $accounts = $this->accounts->getAllAccounts();

        // listing of transactions availables
        $transactions = $this->transactions->search($request->all());

        if ($request->get('account_id') && $id = $request->get('account_id')) {
            $account = $this->accounts->find($id);
            $balance = $this->transactions->computeBalance($account);
        }

        return view('transactions.index')
            ->withTransactions($transactions)
            ->withAccounts($accounts)
            ->withAccount($account)
            ->withBalance($balance);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = $this->accounts->getAllAccounts();

        return view('transactions.create')->withAccounts($accounts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, Transaction::getRules());
        
        $user = $request->user();
        $account = Account::find($request->get('account_id'));

        $transaction = $this->transactions->create($user, $account, [
            'type' => $request->get('type'),
            'amount' => $request->get('amount'),
            'description' => $request->get('description')
        ]);

        $transaction->balance = $this->transactions->computeBalance($account);
        $transaction->save();

        //return Redirect::route('transactions.index');
        return ResponseTo::redirectToRoute('transactions.index', [
            'account_id' => $request->get('account_id'),
            'created_at' => $request->get('created_at')
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @return $this
     */
    public function show($uuid)
    {
        $transaction = $this->transactions->findBy('uuid', $uuid);
        return view('transactions.show')->with(['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $transaction = $this->transactions->findBy('uuid', $uuid);
        
        return view('transactions.edit')->with(['transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
