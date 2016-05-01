@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container-app">
            <header class="header">
                <h1 class="title-app">{{$transaction->account->name}}
                    <span>UUID: {{$transaction->uuid}}</span>
                </h1>
                <a class="btn btn-danger" href="{{route('transactions.index')}}">Back</a>
                <hr>
            </header>

            <div class="main">
                <form class="form" action="{{route('transactions.store')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="txtType">Type</label>
                        <input id="txtType" readonly type="text" class="form-control" name="type" value="{{$transaction->type}}">
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                        <label for="txtAmount">Description</label>
                        <input id="txtAmount" type="text" class="form-control" name="amount" value="{{$transaction->description}}">
                        @if($errors->has('description'))
                            <span class="help-block">
                                <strong>{{$errors->first('description')}}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : ''}}">
                        <label for="txtAmount">Amount</label>
                        <input id="txtAmount" readonly type="number" class="form-control" name="amount" value="{{$transaction->amount}}" placeholder="0.00">
                    </div>

                    <button class="hidden btn btn-success pull-right" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection