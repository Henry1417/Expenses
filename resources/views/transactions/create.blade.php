@extends('layouts.app')

@section('content')
    <div class="pagelab listview">
        <div class="container">
            <div class="listview-heading">
                <div class="listview-heading__title title">Create new Transaction</div>
                <a class="btn btn-danger" href="{{route('transactions.index')}}">
                    <i class="fa fa-backward"></i> Back</a>
            </div>

            <div class="listview-body">

                <div class="container">
                    <form class="form-create form-horizontal" accept-charset="UTF-8"
                          action="{{route('transactions.store')}}" method="post" role="form">

                        {{csrf_field()}}

                        <div class="form-group{{ $errors->has('account_id') ? ' has-error' : ''}}">

                            <label class="col-sm-3 control-label" for="ddlAccount">Account</label>

                            <div class="col-sm-9">
                                <select id="ddlAccount" name="account_id" class="form-control">
                                    <option value="select">Select</option>
                                    @foreach($accounts as $account)
                                        <option $selected value="{{$account->id}}">
                                            Account: {{$account->name}}
                                        </option>
                                    @endforeach
                                </select>

                                @if($errors->has('account_id'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('account_id')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : ''}}">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                                <div class="radio-type-control">
                                    <input id="rdoInput" type="radio" name="type" value="0">
                                    <label for="rdoInput">Input</label>
                                </div>
                                <div class="radio-type-control">
                                    <input id="rdoOutput" type="radio" name="type" value="1">
                                    <label for="rdoOutput">Output</label>
                                </div>

                                @if($errors->has('type'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('type')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="txtAmount">Amount</label>
                            <div class="col-sm-9">
                                <input id="txtAmount" type="text" class="form-control" name="amount"
                                       value="{{old('amount')}}"
                                       placeholder="0.00">
                                @if($errors->has('amount'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('amount')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="txtDescription">Description</label>
                            <div class="col-sm-9">
                                <input id="txtDescription" type="text" class="form-control" name="description"
                                       value="{{old('description')}}" placeholder="Write a description here">
                                @if($errors->has('description'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <button class="btn btn-success pull-right" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection