@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-app">
            <header class="header">
                <div class="title-app">Show Transaction - {{$transaction->uuid}}</div>
                <a class="btn btn-danger" href="{{route('transactions.index')}}">Back</a>
            </header>

            <div class="main">
                <form class="form" action="{{route('transactions.store')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group{{ $errors->has('type') ? ' has-error' : ''}}">
                        <label for="txtType">Type</label>
                        <input id="txtType" type="text" class="form-control" name="type" value="{{$transaction->type}}">

                        @if($errors->has('account_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('account_id')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('account') ? ' has-error' : ''}}">
                        <label for="txtAccount">Account</label>
                        <input id="txtAccount" type="text" class="form-control" name="account" value="{{$transaction->account->name}}">

                        @if($errors->has('account_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('account_id')}}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : ''}}">
                        <label for="txtAmount">Amount</label>
                        <input id="txtAmount" type="number" class="form-control" name="amount" value="{{$transaction->amount}}" placeholder="0.00">
                        @if($errors->has('amount'))
                            <span class="help-block">
                                <strong>{{$errors->first('amount')}}</strong>
                            </span>
                        @endif
                    </div>

                    <button class="hidden btn btn-success pull-right" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection