@extends('layouts.app')

@section('content')
    <main class="pagelab listview">
        <div class="container">
            <div class="listview-heading">
                <div class="listview-heading__title title">Transactions</div>
                <a class="listview-heading__button button btn" href="{{route('transactions.create')}}">
                    <i class="fa fa-plus-square"></i> Create new
                </a>
            </div>
            <div class="listview-filters">
                <form class="filters" method="get" action="{{route('transactions.index')}}">
                    <div class="filter-elements">
                        <div class="filter-item">
                            <div class="filter-item-title">Account:</div>
                            <div class="filter-item-control">
                                <select class="form-control" name="account_id" id="ddlAccount">
                                    <option value="select">Select</option>
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}" {{Request::get('account_id') == $account->id ? 'selected' :'' }}>
                                            {{$account->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="filter-item-title"></div>
                            <div class="filter-item-control">
                                <input class="form-control" name="created_at" type="date" id="txtDate"
                                       placeholder="Date" value="{{Request::get('created_at')}}"/>
                            </div>
                        </div>
                        <div class="filter-item">
                            <button class="button btn">Filter</button>
                        </div>
                    </div>
                    <div class="filter-elements-side">
                        <div class="filter-item">
                            <div class="filter-item-title"></div>
                            <div class="filter-item-control">
                                <input class="form-control search-query" type="search" name="search" id="txtSearch"
                                       placeholder="Search"
                                       value="{{Request::get('search')}}"/>

                                <button class="button btn">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="filters account-info">
                    <div class="filter-elements">
                        <div class="record-count">Records: 12</div>
                    </div>
                    <div class="filter-elements-side">
                        <div class="account">Account: <strong>{{$account->name}}</strong></div>
                        <div class="balance">Balance: <strong>$ {{$balance}}</strong> </div>
                    </div>
                </div>
            </div>
            <div class="listview-body">
                <div class="pagelab gridview">
                    <div class="gridview-heading"></div>
                    <div class="gridview-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th width="40px">ID</th>
                                    <th width="300px">UUID</th>
                                    <th>Account</th>
                                    <th>Description</th>
                                    <th width="120px">Amount</th>
                                    <th width="120px">Balance</th>
                                    <th width="150px">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0 ?>
                            @if (count($transactions) > 0)
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->id}}</td>
                                        <td>
                                            <a href="{{url('transactions/show',$transaction->uuid)}}">{{ $transaction->uuid}}</a>
                                        </td>
                                        <td>{{$transaction->account->name}}</td>
                                        <td>{{ ucfirst($transaction->description)}}</td>
                                        <td class="text-right">$ {{$transaction->amount}}</td>
                                        <td class="text-right">$ {{$transaction->balance}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                    </tr>
                                    <?php  $total += $transaction->amount ?>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div>Nothing to show</div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Sum Movements: </strong></td>
                                    <td class="text-right">$ {{ abs($total) }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="listview-footer"></div>
        </div>
    </main>
@endsection